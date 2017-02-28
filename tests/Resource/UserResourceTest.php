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
use Zibios\WrikePhpLibrary\Resource\UserResource;

/**
 * User Resource Test.
 */
class UserResourceTest extends ResourceTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = UserResource::class;

    /**
     * @return array
     */
    public function methodsProvider()
    {
        $baseData = [
            'endpointPath' => sprintf('users/%s', self::UNIQUE_ID),
            'body' => sprintf('{"data":[{"id":"%s"}]}', self::VALID_ID),
            'resourceClass' => UserResource::class,
            'propertyValue' => self::VALID_ID,
            'additionalParams' => [self::UNIQUE_ID],
        ];

        return [
            [
                [
                    'requestMethod' => RequestMethodEnum::GET,
                    'methodName' => ResourceMethodEnum::GET_BY_ID,
                ] + $baseData,
            ],
            [
                [
                    'requestMethod' => RequestMethodEnum::PUT,
                    'methodName' => ResourceMethodEnum::UPDATE,
                ] + $baseData,
            ],
        ];
    }
}
