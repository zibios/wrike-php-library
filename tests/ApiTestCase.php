<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Tests;

use Zibios\WrikePhpLibrary\ApiInterface;
use Zibios\WrikePhpLibrary\Client\ClientInterface;
use Zibios\WrikePhpLibrary\Resource\AccountResource;
use Zibios\WrikePhpLibrary\Resource\AttachmentResource;
use Zibios\WrikePhpLibrary\Resource\ColorResource;
use Zibios\WrikePhpLibrary\Resource\CommentResource;
use Zibios\WrikePhpLibrary\Resource\ContactResource;
use Zibios\WrikePhpLibrary\Resource\CustomFieldResource;
use Zibios\WrikePhpLibrary\Resource\DependencyResource;
use Zibios\WrikePhpLibrary\Resource\FolderResource;
use Zibios\WrikePhpLibrary\Resource\GroupResource;
use Zibios\WrikePhpLibrary\Resource\IdResource;
use Zibios\WrikePhpLibrary\Resource\InvitationResource;
use Zibios\WrikePhpLibrary\Resource\TaskResource;
use Zibios\WrikePhpLibrary\Resource\TimelogResource;
use Zibios\WrikePhpLibrary\Resource\UserResource;
use Zibios\WrikePhpLibrary\Resource\VersionResource;
use Zibios\WrikePhpLibrary\Resource\WorkflowResource;
use Zibios\WrikePhpLibrary\Transformer\ApiExceptionTransformerInterface;
use Zibios\WrikePhpLibrary\Transformer\ResponseTransformerInterface;

/**
 * Api Test Case.
 */
abstract class ApiTestCase extends TestCase
{
    /**
     * @var ApiInterface
     */
    protected $object;

    public function setUp()
    {
        $accessTokenMock = 'token';
        $responseFormatMock = 'responseFormat';
        $clientMock = $this->getMockBuilder(ClientInterface::class)->getMock();
        $clientMock->expects(self::any())
            ->method('getResponseFormat')
            ->willReturn($responseFormatMock);
        $responseTransformerMock = $this->getMockBuilder(ResponseTransformerInterface::class)->getMock();
        $responseTransformerMock->expects(self::any())
            ->method('isSupportedResponseFormat')
            ->willReturn(true);
        $apiExceptionTransformerMock = $this->getMockBuilder(ApiExceptionTransformerInterface::class)->getMock();

        $this->object = new $this->sourceClass(
            $clientMock,
            $responseTransformerMock,
            $apiExceptionTransformerMock,
            $accessTokenMock
        );
    }

    /**
     * @return array
     */
    public function constructorParamsProvider()
    {
        $accessTokenMock = 'token';
        $responseFormatMock = 'responseFormat';
        $clientMock = $this->getMockBuilder(ClientInterface::class)->getMock();
        $clientMock->expects(self::any())
            ->method('getResponseFormat')
            ->willReturn($responseFormatMock);
        $responseTransformerMock = $this->getMockBuilder(ResponseTransformerInterface::class)->getMock();
        $responseTransformerMock->expects(self::any())
            ->method('isSupportedResponseFormat')
            ->willReturn(true);
        $apiExceptionTransformerMock = $this->getMockBuilder(ApiExceptionTransformerInterface::class)->getMock();
        $stdClass = new \stdClass();

        $anotherResponseTransformerMock = $this->getMockBuilder(ResponseTransformerInterface::class)->getMock();
        $anotherResponseTransformerMock->expects(self::any())
            ->method('isSupportedResponseFormat')
            ->willReturn(false);

        return [
            // [client, responseTransformer, apiExceptionTransformer, accessToken, isValid]
            [$clientMock, $responseTransformerMock, $apiExceptionTransformerMock, $accessTokenMock, true],
            [$clientMock, $responseTransformerMock, $apiExceptionTransformerMock, '', true],

            // test client params
            [$stdClass, $responseTransformerMock, $apiExceptionTransformerMock, $accessTokenMock, false],
            [null, $responseTransformerMock, $apiExceptionTransformerMock, $accessTokenMock, false],

            // test responseTransformer params
            [$clientMock, $stdClass, $apiExceptionTransformerMock, $accessTokenMock, false],
            [$clientMock, null, $apiExceptionTransformerMock, $accessTokenMock, false],
            [$clientMock, $anotherResponseTransformerMock, $apiExceptionTransformerMock, $accessTokenMock, false],

            // test apiExceptionTransformer params
            [$clientMock, $responseTransformerMock, $stdClass, $accessTokenMock, false],
            [$clientMock, $responseTransformerMock, null, $accessTokenMock, false],

            // test accessToken params
            [$clientMock, $responseTransformerMock, $apiExceptionTransformerMock, $stdClass, false],
            [$clientMock, $responseTransformerMock, $apiExceptionTransformerMock, null, false],
            [$clientMock, $responseTransformerMock, $apiExceptionTransformerMock, 123, false],
        ];
    }

    /**
     * @param mixed $client
     * @param mixed $responseTransformer
     * @param mixed $apiExceptionTransformerMock
     * @param mixed $accessToken
     * @param bool  $isValid
     *
     * @internal param mixed $transformer
     * @dataProvider constructorParamsProvider
     */
    public function test_constructorParams(
        $client,
        $responseTransformer,
        $apiExceptionTransformerMock,
        $accessToken,
        $isValid
    ) {
        $exceptionOccurred = false;
        try {
            new $this->sourceClass($client, $responseTransformer, $apiExceptionTransformerMock, $accessToken);
        } catch (\Throwable $t) {
            $exceptionOccurred = true;
        } catch (\Exception $e) {
            $exceptionOccurred = true;
        }

        if ($isValid === false) {
            self::assertTrue($exceptionOccurred);
        }
        if ($isValid === true) {
            self::assertFalse($exceptionOccurred);
        }
    }

    /**
     * @return array
     */
    public function resourceProvider()
    {
        $this->setUp();

        return [
            // [api, getResourceMethod, expectedResourceClass]
            [$this->object, 'getContactResource', ContactResource::class],
            [$this->object, 'getUserResource', UserResource::class],
            [$this->object, 'getGroupResource', GroupResource::class],
            [$this->object, 'getInvitationResource', InvitationResource::class],
            [$this->object, 'getAccountResource', AccountResource::class],
            [$this->object, 'getWorkflowResource', WorkflowResource::class],
            [$this->object, 'getCustomFieldResource', CustomFieldResource::class],
            [$this->object, 'getFolderResource', FolderResource::class],
            [$this->object, 'getTaskResource', TaskResource::class],
            [$this->object, 'getCommentResource', CommentResource::class],
            [$this->object, 'getDependencyResource', DependencyResource::class],
            [$this->object, 'getTimelogResource', TimelogResource::class],
            [$this->object, 'getAttachmentResource', AttachmentResource::class],
            [$this->object, 'getVersionResource', VersionResource::class],
            [$this->object, 'getIdResource', IdResource::class],
            [$this->object, 'getColorResource', ColorResource::class],
        ];
    }

    /**
     * @param ApiInterface $api
     * @param string       $getResourceMethod
     * @param string       $expectedResourceClass
     *
     * @dataProvider resourceProvider
     */
    public function test_getResource($api, $getResourceMethod, $expectedResourceClass)
    {
        $resourceOriginal = $api->{$getResourceMethod}();
        self::assertInstanceOf($expectedResourceClass, $resourceOriginal);
        self::assertNotSame($resourceOriginal, $api->{$getResourceMethod}());
    }

    public function test_testGetResourceProviderCoverAllMethods()
    {
        $class = new \ReflectionClass($this->sourceClass);
        $expectedMethodNames = $class->getMethods(\ReflectionMethod::IS_PUBLIC);
        $resourceProviderArray = $this->resourceProvider();
        $coveredMethodNames = [];
        foreach ($resourceProviderArray as $resourceProviderRow) {
            $coveredMethodName = $resourceProviderRow[1];
            $coveredMethodNames[$coveredMethodName] = $coveredMethodName;
        }

        $excludedMethods = [
            '__construct',
            'recreateForNewAccessToken',
            'recreateForNewApiExceptionTransformer',
            'recreateForNewResponseTransformer',
            'normalizeParams',
        ];

        foreach ($expectedMethodNames as $expectedMethodName) {
            if (in_array($expectedMethodName->getName(), $excludedMethods, true)) {
                continue;
            }
            self::assertArrayHasKey(
                $expectedMethodName->getName(),
                $coveredMethodNames,
                sprintf('%s not covered by tests', $expectedMethodName->getName())
            );
        }
    }

    public function test_normalizeParams()
    {
        $resource = fopen(__FILE__, 'rb');
        $inputParams = [
            'one' => 'one',
            'two' => 2,
            'three' => true,
            'four' => null,
            'five' => ['one' => 'one', 'two' => 2],
            'six' => $resource,
        ];

        $outputParams = [
            'one' => 'one',
            'two' => '2',
            'three' => 'true',
            'four' => 'null',
            'five' => '{"one":"one","two":2}',
            'six' => $resource,
        ];

        self::assertSame($outputParams, $this->object->normalizeParams($inputParams));
    }
}
