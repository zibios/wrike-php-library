<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Tests\Resource\Helpers;

use Zibios\WrikePhpLibrary\Enum\Api\ResourceMethodEnum;
use Zibios\WrikePhpLibrary\Resource\Helpers\RequestPathProcessor;
use Zibios\WrikePhpLibrary\Tests\TestCase;

/**
 * Request Path Processor Test.
 */
class RequestPathProcessorTest extends TestCase
{
    /**
     * @return array
     */
    public function paramsProvider()
    {
        $baseData = [
            'id' => 'id1',
            'expectedPath' => 'test/id1',
        ];

        return [
            [
                [
                    'resourceMethod' => ResourceMethodEnum::GET_ALL,
                    'id' => null,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::GET_ALL => 'test'],
                    'expectedPath' => 'test',
                ],
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::GET_BY_IDS,
                    'id' => ['id1', 'id2'],
                    'resourceMethodConfiguration' => [ResourceMethodEnum::GET_BY_IDS => 'test/%s'],
                    'expectedPath' => 'test/id1,id2',
                ],
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::GET_ALL_FOR_ACCOUNT,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::GET_ALL_FOR_ACCOUNT => 'test/%s'],
                ] + $baseData,
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::GET_ALL_FOR_FOLDER,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::GET_ALL_FOR_FOLDER => 'test/%s'],
                ] + $baseData,
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::GET_ALL_FOR_TASK,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::GET_ALL_FOR_TASK => 'test/%s'],
                ] + $baseData,
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::GET_ALL_FOR_CONTACT,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::GET_ALL_FOR_CONTACT => 'test/%s'],
                ] + $baseData,
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::CREATE_FOR_ACCOUNT,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::CREATE_FOR_ACCOUNT => 'test/%s'],
                ] + $baseData,
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::CREATE_FOR_FOLDER,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::CREATE_FOR_FOLDER => 'test/%s'],
                ] + $baseData,
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::CREATE_FOR_TASK,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::CREATE_FOR_TASK => 'test/%s'],
                ] + $baseData,
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::GET_BY_ID,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::GET_BY_ID => 'test/%s'],
                ] + $baseData,
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::UPDATE,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::UPDATE => 'test/%s'],
                ] + $baseData,
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::DELETE,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::DELETE => 'test/%s'],
                ] + $baseData,
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::COPY,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::COPY => 'test/%s'],
                ] + $baseData,
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::DOWNLOAD,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::DOWNLOAD => 'test/%s'],
                ] + $baseData,
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::DOWNLOAD_PREVIEW,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::DOWNLOAD_PREVIEW => 'test/%s'],
                ] + $baseData,
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::GET_PUBLIC_URL,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::GET_PUBLIC_URL => 'test/%s'],
                ] + $baseData,
            ],
        ];
    }

    /**
     * @param array $params
     *
     * @dataProvider paramsProvider
     */
    public function test_prepareRequestPathForResourceMethod(array $params)
    {
        $processor = new RequestPathProcessor();

        self::assertSame(
            $params['expectedPath'],
            $processor->prepareRequestPathForResourceMethod(
                $params['resourceMethod'],
                $params['id'],
                $params['resourceMethodConfiguration']
            )
        );
    }

    /**
     * @return array
     */
    public function exceptionProvider()
    {
        return [
            [
                [
                    'resourceMethod' => 'WRONG_METHOD',
                    'id' => null,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::GET_ALL => 'test'],
                    'expectedException' => \InvalidArgumentException::class,
                ],
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::GET_ALL,
                    'id' => null,
                    'resourceMethodConfiguration' => ['WRONG_CONFIGURATION'],
                    'expectedException' => \InvalidArgumentException::class,
                ],
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::GET_ALL,
                    'id' => 'WRONG_VALUE',
                    'resourceMethodConfiguration' => [ResourceMethodEnum::GET_ALL => 'test'],
                    'expectedException' => \InvalidArgumentException::class,
                ],
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::GET_BY_IDS,
                    'id' => 'WRONG_VALUE',
                    'resourceMethodConfiguration' => [ResourceMethodEnum::GET_BY_IDS => 'test/%s'],
                    'expectedException' => \InvalidArgumentException::class,
                ],
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::GET_ALL_FOR_ACCOUNT,
                    'id' => 777,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::GET_ALL_FOR_ACCOUNT => 'test/%s'],
                    'expectedException' => \InvalidArgumentException::class,
                ],
            ],
        ];
    }

    /**
     * @param array $params
     *
     * @dataProvider exceptionProvider
     */
    public function test_exceptions(array $params)
    {
        self::setExpectedException($params['expectedException']);

        $processor = new RequestPathProcessor();
        $processor->prepareRequestPathForResourceMethod(
            $params['resourceMethod'],
            $params['id'],
            $params['resourceMethodConfiguration']
        );
    }
}
