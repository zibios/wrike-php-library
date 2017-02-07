<?php
/**
 * This file is part of the WrikePhpLibrary package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Tests;

use Zibios\WrikePhpLibrary\Api;
use Zibios\WrikePhpLibrary\Client\ClientInterface;
use Zibios\WrikePhpLibrary\Resource\ContactResource;
use Zibios\WrikePhpLibrary\Resource\GroupResource;
use Zibios\WrikePhpLibrary\Resource\InvitationResource;
use Zibios\WrikePhpLibrary\Resource\UserResource;
use Zibios\WrikePhpLibrary\Transformer\ResponseTransformerInterface;

/**
 * Api Test
 */
class ApiTest extends TestCase
{
    /**
     * @return array
     */
    public function constructorParamsProvider()
    {
        $clientMock = $this->getMock(ClientInterface::class);
        $transformerMock = $this->getMock(ResponseTransformerInterface::class);
        $stdClass = new \stdClass();
        return [
            // [client, transformer, isValid]
            [$clientMock, $transformerMock, true],

            [$stdClass, $transformerMock, false],
            [$clientMock, $stdClass, false],

            [null, $transformerMock, false],
            [$clientMock, null, false],
        ];
    }

    /**
     * @param mixed $client
     * @param mixed $transformer
     * @param boolean $isValid
     *
     * @dataProvider constructorParamsProvider
     */
    public function test_constructorParams($client, $transformer, $isValid)
    {
        $exceptionOccurred = false;
        try {
            new Api($client, $transformer);
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
    public function getResourceProvider()
    {
        $clientMock = $this->getMock(ClientInterface::class);
        $transformerMock = $this->getMock(ResponseTransformerInterface::class);
        $api = new Api($clientMock, $transformerMock);

        return [
            // [api, getResourceMethod, expectedResourceClass]
            [$api, 'getContactResource', ContactResource::class],
            [$api, 'getUserResource', UserResource::class],
            [$api, 'getGroupResource', GroupResource::class],
            [$api, 'getInvitationResource', InvitationResource::class],
        ];
    }

    /**
     * @param Api $api
     * @param string $getContactResource
     * @param string $expectedResourceClass
     *
     * @dataProvider getResourceProvider
     */
    public function test_getResource($api, $getContactResource, $expectedResourceClass)
    {
        $resourceOriginal = $api->{$getContactResource}();
        self::assertInstanceOf($expectedResourceClass, $resourceOriginal);
        self::assertSame($resourceOriginal, $api->{$getContactResource}());
    }

    public function test_testGetResourceProviderCoverAllMethods()
    {
        $class = new \ReflectionClass(Api::class);
        $expectedMethodNames = $class->getMethods(\ReflectionMethod::IS_PUBLIC);

        $resourceProviderArray = $this->getResourceProvider();
        $coveredMethodNames = [];
        foreach ($resourceProviderArray as $resourceProviderRow) {
            $coveredMethodName = $resourceProviderRow[1];
            $coveredMethodNames[$coveredMethodName] = $coveredMethodName;
        }

        $excludedMethods = [
            '__construct',
            'getBearerToken',
            'setBearerToken',
        ];

        foreach ($expectedMethodNames as $expectedMethodName) {
            if (in_array($expectedMethodName->getName(), $excludedMethods)) {
                continue;
            }
            self::assertArrayHasKey($expectedMethodName->getName(), $coveredMethodNames);
        }
    }

    /**
     * Test properties methods
     */
    public function test_getSetBearerToken()
    {
        $testValue = 'testValue';

        $clientMock = $this->getMock(ClientInterface::class);
        $clientMock->expects($this->any())
            ->method('getBearerToken')
            ->willReturn($testValue);
        $transformerMock = $this->getMock(ResponseTransformerInterface::class);
        $api = new Api($clientMock, $transformerMock);

        self::assertEquals($testValue, $api->getBearerToken());
        self::assertSame($api, $api->setBearerToken($testValue));
    }
}
