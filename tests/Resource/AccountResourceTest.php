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

use Zibios\WrikePhpLibrary\Enum\Api\RequestMethodEnum;
use Zibios\WrikePhpLibrary\Enum\Api\ResourceMethodEnum;
use Zibios\WrikePhpLibrary\Resource\AccountResource;

/**
 * Account Resource Test.
 */
class AccountResourceTest extends ResourceTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = AccountResource::class;

    /**
     * @return array
     */
    public function methodsProvider()
    {
        $baseData = [
            'body' => sprintf('{"data":[{"id":"%s"}]}', self::VALID_ID),
            'resourceGetter' => 'getAccountResource',
            'propertyValue' => self::VALID_ID,
        ];

        return [
            [
                [
                    'requestMethod' => RequestMethodEnum::GET,
                    'methodName' => ResourceMethodEnum::GET_ALL,
                    'endpointPath' => 'accounts',
                    'additionalParams' => [],
                ] + $baseData,
            ],
            [
                [
                    'requestMethod' => RequestMethodEnum::GET,
                    'methodName' => ResourceMethodEnum::GET_BY_ID,
                    'endpointPath' => sprintf('accounts/%s', self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ] + $baseData,
            ],
            [
                [
                    'requestMethod' => RequestMethodEnum::PUT,
                    'methodName' => ResourceMethodEnum::UPDATE,
                    'endpointPath' => sprintf('accounts/%s', self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ] + $baseData,
            ],
        ];
    }
}
