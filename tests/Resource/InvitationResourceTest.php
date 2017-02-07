<?php
/**
 * This file is part of the WrikePhpLibrary package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Tests\Resource;

use Zibios\WrikePhpLibrary\Resource\InvitationResource;
use Zibios\WrikePhpLibrary\Enum\Api\RequestPathFormatEnum;
use Zibios\WrikePhpLibrary\Enum\Api\ResourceMethodEnum;

/**
 * Invitation Resource Test
 */
class InvitationResourceTest extends ResourceTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = InvitationResource::class;

    /**
     * @return array
     */
    public function methodsProvider()
    {
        $baseData = [
            'body' => sprintf('{"data":[{"id":"%s"}]}', self::VALID_ID),
            'resourceGetter' => 'getInvitationResource',
            'propertyValue' => self::VALID_ID,
        ];

        return [
            [
                $baseData + [
                    'methodName' => ResourceMethodEnum::GET_ALL_IN_ACCOUNT,
                    'endpointPath' => sprintf(RequestPathFormatEnum::INVITATIONS_IN_ACCOUNT, self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ],
            ],
            [
                $baseData + [
                    'methodName' => ResourceMethodEnum::CREATE_IN_ACCOUNT,
                    'endpointPath' => sprintf(RequestPathFormatEnum::INVITATIONS_IN_ACCOUNT, self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ],
            ],
            [
                $baseData + [
                    'methodName' => ResourceMethodEnum::UPDATE,
                    'endpointPath' => sprintf(RequestPathFormatEnum::INVITATIONS_BY_ID, self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ],
            ],
            [
                $baseData + [
                    'methodName' => ResourceMethodEnum::DELETE,
                    'endpointPath' => sprintf(RequestPathFormatEnum::INVITATIONS_BY_ID, self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ],
            ],
        ];
    }
}
