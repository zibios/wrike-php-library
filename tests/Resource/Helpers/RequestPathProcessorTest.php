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
        return [
            [
                [
                    'resourceMethod' => ResourceMethodEnum::GET_ALL,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::GET_ALL => 'test'],
                    'id' => null,
                    'expectedPath' => 'test',
                ],
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::GET_BY_ID,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::GET_BY_ID => 'test/%s'],
                    'id' => 'id1',
                    'expectedPath' => 'test/id1',
                ],
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::GET_BY_IDS,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::GET_BY_IDS => 'test/%s'],
                    'id' => ['id1', 'id2'],
                    'expectedPath' => 'test/id1,id2',
                ],
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::GET_ALL_FOR_FOLDER,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::GET_ALL_FOR_FOLDER => 'test/%s'],
                    'id' => 'id1',
                    'expectedPath' => 'test/id1',
                ],
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::GET_ALL_FOR_TASK,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::GET_ALL_FOR_TASK => 'test/%s'],
                    'id' => 'id1',
                    'expectedPath' => 'test/id1',
                ],
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::GET_ALL_FOR_CONTACT,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::GET_ALL_FOR_CONTACT => 'test/%s'],
                    'id' => 'id1',
                    'expectedPath' => 'test/id1',
                ],
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::GET_ALL_FOR_TIMELOG_CATEGORY,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::GET_ALL_FOR_TIMELOG_CATEGORY => 'test/%s'],
                    'id' => 'id1',
                    'expectedPath' => 'test/id1',
                ],
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::CREATE,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::CREATE => 'test'],
                    'id' => null,
                    'expectedPath' => 'test',
                ],
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::CREATE_FOR_FOLDER,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::CREATE_FOR_FOLDER => 'test/%s'],
                    'id' => 'id1',
                    'expectedPath' => 'test/id1',
                ],
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::CREATE_FOR_TASK,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::CREATE_FOR_TASK => 'test/%s'],
                    'id' => 'id1',
                    'expectedPath' => 'test/id1',
                ],
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::UPDATE,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::UPDATE => 'test/%s'],
                    'id' => 'id1',
                    'expectedPath' => 'test/id1',
                ],
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::UPDATE_DEFAULT,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::UPDATE_DEFAULT => 'test'],
                    'id' => null,
                    'expectedPath' => 'test',
                ],
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::DELETE,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::DELETE => 'test/%s'],
                    'id' => 'id1',
                    'expectedPath' => 'test/id1',
                ],
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::COPY,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::COPY => 'test/%s'],
                    'id' => 'id1',
                    'expectedPath' => 'test/id1',
                ],
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::DOWNLOAD,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::DOWNLOAD => 'test/%s'],
                    'id' => 'id1',
                    'expectedPath' => 'test/id1',
                ],
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::DOWNLOAD_PREVIEW,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::DOWNLOAD_PREVIEW => 'test/%s'],
                    'id' => 'id1',
                    'expectedPath' => 'test/id1',
                ],
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::GET_PUBLIC_URL,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::GET_PUBLIC_URL => 'test/%s'],
                    'id' => 'id1',
                    'expectedPath' => 'test/id1',
                ],
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::UPLOAD_FOR_FOLDER,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::UPLOAD_FOR_FOLDER => 'test/%s'],
                    'id' => 'id1',
                    'expectedPath' => 'test/id1',
                ],
            ],
            [
                [
                    'resourceMethod' => ResourceMethodEnum::UPLOAD_FOR_TASK,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::UPLOAD_FOR_TASK => 'test/%s'],
                    'id' => 'id1',
                    'expectedPath' => 'test/id1',
                ],
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
                    'resourceMethod' => ResourceMethodEnum::GET_ALL,
                    'id' => 777,
                    'resourceMethodConfiguration' => [ResourceMethodEnum::GET_ALL => 'test/%s'],
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
        $processor = new RequestPathProcessor();
        $exception = null;
        try {
            $processor->prepareRequestPathForResourceMethod(
                $params['resourceMethod'],
                $params['id'],
                $params['resourceMethodConfiguration']
            );
        } catch (\Throwable $e) {
            $exception = $e;
        }

        self::assertInstanceOf($params['expectedException'], $exception);
    }
}
