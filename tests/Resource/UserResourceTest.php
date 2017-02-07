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

use Zibios\WrikePhpLibrary\Resource\UserResource;
use Zibios\WrikePhpLibrary\Enum\Api\RequestPathFormatEnum;
use Zibios\WrikePhpLibrary\Enum\Api\ResourceMethodEnum;

/**
 * User Resource Test
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
            'endpointPath' => sprintf(RequestPathFormatEnum::USERS_BY_ID, self::UNIQUE_ID),
            'body' => sprintf('{"data":[{"id":"%s"}]}', self::VALID_ID),
            'resourceGetter' => 'getUserResource',
            'propertyValue' => self::VALID_ID,
            'additionalParams' => [self::UNIQUE_ID],
        ];

        return [
            [
                $baseData + ['methodName' => ResourceMethodEnum::GET_BY_ID],
            ],
            [
                $baseData + ['methodName' => ResourceMethodEnum::UPDATE],
            ],
        ];
    }
}
