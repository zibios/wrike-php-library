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
use Zibios\WrikePhpLibrary\Resource\IdResource;

/**
 * Id Resource Test.
 */
class IdResourceTest extends ResourceTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = IdResource::class;

    /**
     * @return array
     */
    public function methodsProvider()
    {
        $baseData = [
            'requestMethod' => RequestMethodEnum::GET,
            'endpointPath' => 'ids',
            'body' => sprintf('{"data":[{"id":"%s"}]}', self::VALID_ID),
            'resourceClass' => IdResource::class,
            'propertyValue' => self::VALID_ID,
            'additionalParams' => [],
            'methodName' => ResourceMethodEnum::GET_ALL,
        ];

        return [
            [
                $baseData,
            ],
        ];
    }
}
