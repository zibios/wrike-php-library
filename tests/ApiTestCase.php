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
    public function setUp()
    {
        $bearerTokenMock = 'token';
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

        $this->object = new $this->sourceClass(
            $clientMock,
            $responseTransformerMock,
            $apiExceptionTransformerMock,
            $bearerTokenMock
        );
    }

    /**
     * @return array
     */
    public function constructorParamsProvider()
    {
        $bearerTokenMock = 'token';
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
        $stdClass = new \stdClass();

        $anotherResponseTransformerMock = $this->getMock(ResponseTransformerInterface::class);
        $anotherResponseTransformerMock->expects(self::any())
            ->method('isSupportedResponseFormat')
            ->willReturn(false);

        return [
            // [client, responseTransformer, apiExceptionTransformer, bearerToken, isValid]
            [$clientMock, $responseTransformerMock, $apiExceptionTransformerMock, $bearerTokenMock, true],

            // test client params
            [$stdClass, $responseTransformerMock, $apiExceptionTransformerMock, $bearerTokenMock, false],
            [null, $responseTransformerMock, $apiExceptionTransformerMock, $bearerTokenMock, false],

            // test responseTransformer params
            [$clientMock, $stdClass, $apiExceptionTransformerMock, $bearerTokenMock, false],
            [$clientMock, null, $apiExceptionTransformerMock, $bearerTokenMock, false],
            [$clientMock, $anotherResponseTransformerMock, $apiExceptionTransformerMock, $bearerTokenMock, false],

            // test apiExceptionTransformer params
            [$clientMock, $responseTransformerMock, $stdClass, $bearerTokenMock, false],
            [$clientMock, $responseTransformerMock, null, $bearerTokenMock, false],

            // test bearerToken params
            [$clientMock, $responseTransformerMock, $apiExceptionTransformerMock, '', true],
            [$clientMock, $responseTransformerMock, $apiExceptionTransformerMock, $stdClass, false],
            [$clientMock, $responseTransformerMock, $apiExceptionTransformerMock, null, false],
        ];
    }

    /**
     * @param mixed $client
     * @param mixed $responseTransformer
     * @param mixed $apiExceptionTransformerMock
     * @param mixed $bearerToken
     * @param bool  $isValid
     *
     * @internal param mixed $transformer
     * @dataProvider constructorParamsProvider
     */
    public function test_constructorParams(
        $client,
        $responseTransformer,
        $apiExceptionTransformerMock,
        $bearerToken,
        $isValid
    ) {
        $exceptionOccurred = false;
        try {
            new $this->sourceClass($client, $responseTransformer, $apiExceptionTransformerMock, $bearerToken);
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
            'recreateForNewBearerToken',
            'recreateForNewApiExceptionTransformer',
            'recreateForNewResponseTransformer',
            'setBearerToken',
            'setApiExceptionTransformer',
            'setResponseTransformer',
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
}
