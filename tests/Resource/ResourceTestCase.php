<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Tests\Resource;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Zibios\WrikePhpLibrary\Client\ClientInterface;
use Zibios\WrikePhpLibrary\Resource\AbstractResource;
use Zibios\WrikePhpLibrary\Resource\ResourceInterface;
use Zibios\WrikePhpLibrary\Tests\TestCase;
use Zibios\WrikePhpLibrary\Transformer\ApiException\RawExceptionTransformer;
use Zibios\WrikePhpLibrary\Transformer\ApiExceptionTransformerInterface;
use Zibios\WrikePhpLibrary\Transformer\Response\Psr\ArrayBodyTransformer;
use Zibios\WrikePhpLibrary\Transformer\Response\Psr\PsrBodyTransformer;
use Zibios\WrikePhpLibrary\Transformer\Response\Psr\PsrResponseTransformer;
use Zibios\WrikePhpLibrary\Transformer\Response\Psr\StringBodyTransformer;
use Zibios\WrikePhpLibrary\Transformer\Response\RawResponseTransformer;
use Zibios\WrikePhpLibrary\Transformer\ResponseTransformerInterface;

/**
 * Resource Test Case.
 */
abstract class ResourceTestCase extends TestCase
{
    const UNIQUE_ID = 'uniqueId';
    const VALID_ID = 'validId';
    const INVALID_ID = 'wrongId';

    /**
     * @var string
     */
    protected $sourceClass;

    /**
     * Test exception inheritance.
     */
    public function test_ExtendProperClasses()
    {
        $accessTokenMock = 'token';
        $responseFormatMock = 'responseFormat';
        $clientMock = $this->getMock(ClientInterface::class);
        $clientMock->expects(self::any())
            ->method('getResponseFormat')
            ->willReturn($responseFormatMock);
        $responseTransformerMock = $this->getMock(ResponseTransformerInterface::class);
        $responseTransformerMock->expects(self::any())
            ->method('isSupportedResponseFormat')
            ->willReturn(true);
        $apiExceptionTransformerMock = $this->getMock(ApiExceptionTransformerInterface::class);
        $resource = new $this->sourceClass(
            $clientMock,
            $responseTransformerMock,
            $apiExceptionTransformerMock,
            $accessTokenMock
        );

        self::assertInstanceOf(
            AbstractResource::class,
            $resource,
            sprintf('"%s" should extend "%s"', get_class($resource), AbstractResource::class)
        );
        self::assertInstanceOf(
            ResourceInterface::class,
            $resource,
            sprintf('"%s" should extend "%s"', get_class($resource), ResourceInterface::class)
        );
    }

    /**
     * @return array
     */
    abstract public function methodsProvider();

    /**
     * @param array $methodData
     *
     * @dataProvider methodsProvider
     */
    public function test_methods($methodData)
    {
        $transformerClasses = [
            PsrResponseTransformer::class,
            PsrBodyTransformer::class,
            StringBodyTransformer::class,
            ArrayBodyTransformer::class,
            RawResponseTransformer::class,
        ];

        foreach ($transformerClasses as $transformerClass) {
            $resource = $this->prepareResourceWithClientMock($methodData, $transformerClass);
            $response = $this->prepareResponseForMethod($methodData, $resource);
            $this->executeAssertsForMethod($methodData, $transformerClass, $response);
        }
    }

    public function test_testMethodsProvider()
    {
        $class = new \ReflectionClass($this->sourceClass);
        $expectedMethodNames = $class->getMethods(\ReflectionMethod::IS_PUBLIC);

        $methodsProviderArray = $this->methodsProvider();
        $coveredMethodNames = [];
        foreach ($methodsProviderArray as $methodsProviderRow) {
            $coveredMethodName = $methodsProviderRow[0]['methodName'];
            $coveredMethodNames[$coveredMethodName] = $coveredMethodName;
        }

        /** @var \ReflectionMethod $expectedMethodName */
        foreach ($expectedMethodNames as $expectedMethodName) {
            if ($expectedMethodName->getName() === '__construct') {
                continue;
            }
            self::assertArrayHasKey($expectedMethodName->getName(), $coveredMethodNames);
        }
    }

    public function returnExceptionCallback()
    {
        $args = func_get_args();

        return $args[0];
    }

    /**
     * @param array  $methodData
     * @param string $transformerClass
     *
     * @return AbstractResource
     */
    private function prepareResourceWithClientMock($methodData, $transformerClass)
    {
        $accessTokenMock = 'test';
        $bodyMock = $this->getMockForAbstractClass(StreamInterface::class);
        $bodyMock->expects(self::any())
            ->method('getContents')
            ->willReturn($methodData['body']);

        $responseMock = $this->getMockForAbstractClass(ResponseInterface::class);
        $responseMock->expects(self::any())
            ->method('getBody')
            ->willReturn($bodyMock);

        $clientMock = $this->getMock(ClientInterface::class);
        $clientMock->expects(self::any())
            ->method('executeRequestForParams')
            ->with(
                self::equalTo($methodData['requestMethod']),
                self::equalTo($methodData['endpointPath']),
                self::equalTo([]),
                self::equalTo($accessTokenMock)
            )
            ->willReturn($responseMock);

        $responseTransformer = new $transformerClass();

        return new $methodData['resourceClass'](
            $clientMock,
            $responseTransformer,
            new RawExceptionTransformer(),
            $accessTokenMock
        );
    }

    /**
     * @param array            $methodData
     * @param AbstractResource $resource
     *
     * @return mixed
     */
    private function prepareResponseForMethod(array $methodData, AbstractResource $resource)
    {
        $response = null;
        switch (count($methodData['additionalParams'])) {
            case 0:
                $response = $resource->{$methodData['methodName']}();
                break;
            case 1:
                $response = $resource->{$methodData['methodName']}(
                    $methodData['additionalParams'][0]
                );
                break;
            case 2:
                $response = $resource->{$methodData['methodName']}(
                    $methodData['additionalParams'][0],
                    $methodData['additionalParams'][1]
                );
                break;
            default:
                self::assertLessThanOrEqual(2, count($methodData['additionalParams']));
        }

        return $response;
    }

    /**
     * @param array  $methodData
     * @param string $transformerClass
     * @param mixed  $response
     */
    private function executeAssertsForMethod(array $methodData, $transformerClass, $response)
    {
        $bodyArray = [];
        switch ($transformerClass) {
            case PsrResponseTransformer::class:
                /* @var ResponseInterface $response */
                self::assertInstanceOf(ResponseInterface::class, $response);
                $bodyArray = json_decode($response->getBody()->getContents(), true);
                break;
            case PsrBodyTransformer::class:
                /* @var StreamInterface $response */
                self::assertInstanceOf(StreamInterface::class, $response);
                $bodyArray = json_decode($response->getContents(), true);
                break;
            case StringBodyTransformer::class:
                /* @var array $response */
                self::assertInternalType('string', $response);
                $bodyArray = json_decode($response, true);
                break;
            case ArrayBodyTransformer::class:
                /* @var array $response */
                self::assertInternalType('array', $response);
                $bodyArray = $response;
                break;
            case RawResponseTransformer::class:
                /* @var ResponseInterface $response */
                self::assertInstanceOf(ResponseInterface::class, $response);
                $bodyArray = json_decode($response->getBody()->getContents(), true);
                break;
            default:
                self::assertTrue(false);
                break;
        }

        self::assertEquals(json_decode($methodData['body'], true), $bodyArray);
    }
}
