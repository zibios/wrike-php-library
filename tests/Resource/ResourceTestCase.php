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
use Zibios\WrikePhpLibrary\Api;
use Zibios\WrikePhpLibrary\Client\ClientInterface;
use Zibios\WrikePhpLibrary\Resource\AbstractResource;
use Zibios\WrikePhpLibrary\Resource\ResourceInterface;
use Zibios\WrikePhpLibrary\Tests\TestCase;
use Zibios\WrikePhpLibrary\Transformer\Response\ArrayBodyTransformer;
use Zibios\WrikePhpLibrary\Transformer\Response\RawBodyTransformer;
use Zibios\WrikePhpLibrary\Transformer\Response\RawResponseTransformer;
use Zibios\WrikePhpLibrary\Transformer\Response\StringBodyTransformer;
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
        $clientMock = $this->getMockForAbstractClass(ClientInterface::class);
        $responseTransformerMock = $this->getMockForAbstractClass(ResponseTransformerInterface::class);
        $resource = new $this->sourceClass($clientMock, $responseTransformerMock);

        self::assertInstanceOf(AbstractResource::class, $resource, sprintf('"%s" should extend "%s"', get_class($resource), AbstractResource::class));
        self::assertInstanceOf(ResourceInterface::class, $resource, sprintf('"%s" should extend "%s"', get_class($resource), ResourceInterface::class));
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
            RawResponseTransformer::class,
            RawBodyTransformer::class,
            StringBodyTransformer::class,
            ArrayBodyTransformer::class,
        ];

        foreach ($transformerClasses as $transformerClass) {
            $api = $this->prepareApiWithClientMock($methodData, $transformerClass);
            $response = $this->prepareResponseForMethod($methodData, $api);
            $this->executeAssertsForMethod($methodData, $transformerClass, $response);
        }
    }

    /**
     * @param array $methodData
     *
     * @dataProvider methodsProvider
     */
    public function test_clientException($methodData)
    {
        $clientException = new \Exception();

        $clientMock = $this->getMock(ClientInterface::class);
        $clientMock->expects(self::any())
            ->method('transformApiException')
            ->with(self::equalTo($clientException))
            ->willReturn($clientException);
        $clientMock->expects($this->any())
            ->method('executeRequestForParams')
            ->willThrowException($clientException);
        $transformer = new RawResponseTransformer();
        $api = new Api($clientMock, $transformer);

        $e = null;
        try {
            $this->prepareResponseForMethod($methodData, $api);
        } catch (\Exception $e) {
        }
        self::assertSame($clientException, $e);
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

    /**
     * @param array  $methodData
     * @param string $transformerClass
     *
     * @return \Zibios\WrikePhpLibrary\Api
     */
    private function prepareApiWithClientMock($methodData, $transformerClass)
    {
        $bodyMock = $this->getMockForAbstractClass(StreamInterface::class);
        $bodyMock->expects($this->any())
            ->method('getContents')
            ->willReturn($methodData['body']);

        $responseMock = $this->getMockForAbstractClass(ResponseInterface::class);
        $responseMock->expects($this->any())
            ->method('getBody')
            ->willReturn($bodyMock);

        $clientMock = $this->getMock(ClientInterface::class);
        $clientMock->expects($this->any())
            ->method('executeRequestForParams')
            ->willReturn($responseMock);

        $transformer = new $transformerClass();

        return new Api($clientMock, $transformer);
    }

    /**
     * @param array                       $methodData
     * @param \Zibios\WrikePhpLibrary\Api $api
     *
     * @return mixed
     */
    private function prepareResponseForMethod(array $methodData, $api)
    {
        $response = null;
        switch (count($methodData['additionalParams'])) {
            case 0:
                $response = $api->{$methodData['resourceGetter']}()->{$methodData['methodName']}();
                break;
            case 1:
                $response = $api->{$methodData['resourceGetter']}()->{$methodData['methodName']}(
                    $methodData['additionalParams'][0]
                );
                break;
            case 2:
                $response = $api->{$methodData['resourceGetter']}()->{$methodData['methodName']}(
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
            case RawResponseTransformer::class:
                /* @var ResponseInterface $response */
                self::assertInstanceOf(ResponseInterface::class, $response);
                $bodyArray = json_decode($response->getBody()->getContents(), true);
                break;
            case RawBodyTransformer::class:
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
            default:
                self::assertTrue(false);
                break;
        }

        self::assertEquals(json_decode($methodData['body'], true), $bodyArray);
    }
}
