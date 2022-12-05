<?php

declare(strict_types=1);

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
use Zibios\WrikePhpLibrary\Resource\WebhookResource;

/**
 * Folder Resource Test.
 */
class WebhookResourceTest extends ResourceTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = WebhookResource::class;

    /**
     * @return array
     */
    public function methodsProvider(): array
    {
        $baseData = [
            'body' => sprintf('{"data":[{"id":"%s"}]}', self::VALID_ID),
            'resourceClass' => WebhookResource::class,
            'propertyValue' => self::VALID_ID,
        ];

        return [
            [
                [
                    'requestMethod' => RequestMethodEnum::GET,
                    'methodName' => ResourceMethodEnum::GET_ALL,
                    'endpointPath' => 'webhooks',
                    'additionalParams' => [],
                ] + $baseData,
            ],
            [
                [
                    'requestMethod' => RequestMethodEnum::GET,
                    'methodName' => ResourceMethodEnum::GET_BY_ID,
                    'endpointPath' => sprintf('webhooks/%s', self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ] + $baseData,
            ],
            [
                [
                    'requestMethod' => RequestMethodEnum::GET,
                    'methodName' => ResourceMethodEnum::GET_BY_IDS,
                    'endpointPath' => sprintf('webhooks/%s', implode(',', [self::UNIQUE_ID])),
                    'additionalParams' => [[self::UNIQUE_ID]],
                ] + $baseData,
            ],
            [
                [
                    'requestMethod' => RequestMethodEnum::POST,
                    'methodName' => ResourceMethodEnum::CREATE_WEBHOOK_FOR_FOLDER,
                    'endpointPath' => sprintf('folders/%s/webhooks', self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ] + $baseData,
            ],
            [
                [
                    'requestMethod' => RequestMethodEnum::POST,
                    'methodName' => ResourceMethodEnum::CREATE_FOR_SPACE,
                    'endpointPath' => sprintf('spaces/%s/webhooks', self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ] + $baseData,
            ],
            [
                [
                    'requestMethod' => RequestMethodEnum::PUT,
                    'methodName' => ResourceMethodEnum::UPDATE,
                    'endpointPath' => sprintf('webhooks/%s', self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ] + $baseData,
            ],
            [
                [
                    'requestMethod' => RequestMethodEnum::DELETE,
                    'methodName' => ResourceMethodEnum::DELETE,
                    'endpointPath' => sprintf('webhooks/%s', self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ] + $baseData,
            ],
        ];
    }
}
