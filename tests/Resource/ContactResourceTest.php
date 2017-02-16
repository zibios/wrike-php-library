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

use Zibios\WrikePhpLibrary\Enum\Api\RequestPathFormatEnum;
use Zibios\WrikePhpLibrary\Enum\Api\ResourceMethodEnum;
use Zibios\WrikePhpLibrary\Resource\ContactResource;

/**
 * Contact Resource Test.
 */
class ContactResourceTest extends ResourceTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = ContactResource::class;

    /**
     * @return array
     */
    public function methodsProvider()
    {
        $baseData = [
            'body' => sprintf('{"data":[{"id":"%s"}]}', self::VALID_ID),
            'resourceGetter' => 'getContactResource',
            'propertyValue' => self::VALID_ID,
        ];

        return [
            [
                $baseData + [
                    'methodName' => ResourceMethodEnum::GET_ALL,
                    'endpointPath' => RequestPathFormatEnum::CONTACTS,
                    'additionalParams' => [],
                ],
            ],
            [
                $baseData + [
                    'methodName' => ResourceMethodEnum::GET_ALL_IN_ACCOUNT,
                    'endpointPath' => sprintf(RequestPathFormatEnum::CONTACTS_IN_ACCOUNT, self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ],
            ],
            [
                $baseData + [
                    'methodName' => ResourceMethodEnum::GET_BY_ID,
                    'endpointPath' => sprintf(RequestPathFormatEnum::CONTACTS_BY_ID, self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ],
            ],
            [
                $baseData + [
                    'methodName' => ResourceMethodEnum::GET_BY_IDS,
                    'endpointPath' => sprintf(RequestPathFormatEnum::CONTACTS_BY_ID, implode(',', [self::UNIQUE_ID])),
                    'additionalParams' => [[self::UNIQUE_ID]],
                ],
            ],
            [
                $baseData + [
                    'methodName' => ResourceMethodEnum::UPDATE,
                    'endpointPath' => sprintf(RequestPathFormatEnum::CONTACTS_BY_ID, self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ],
            ],
        ];
    }
}
