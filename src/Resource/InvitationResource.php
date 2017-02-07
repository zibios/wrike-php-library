<?php
/**
 * This file is part of the WrikePhpLibrary package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Resource;

use Zibios\WrikePhpLibrary\Resource\Traits\CreateInAccountTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\DeleteTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetAllInAccountTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\UpdateTrait;
use Zibios\WrikePhpLibrary\Enum\Api\RequestPathFormatEnum;
use Zibios\WrikePhpLibrary\Enum\Api\ResourceMethodEnum;

/**
 * Invitation Resource
 */
class InvitationResource extends AbstractResource
{
    use GetAllInAccountTrait;
    use CreateInAccountTrait;
    use UpdateTrait;
    use DeleteTrait;

    /**
     * @return array
     */
    protected function getResourceMethodConfiguration()
    {
        return [
            ResourceMethodEnum::GET_ALL_IN_ACCOUNT => RequestPathFormatEnum::INVITATIONS_IN_ACCOUNT,
            ResourceMethodEnum::CREATE_IN_ACCOUNT => RequestPathFormatEnum::INVITATIONS_IN_ACCOUNT,
            ResourceMethodEnum::UPDATE => RequestPathFormatEnum::INVITATIONS_BY_ID,
            ResourceMethodEnum::DELETE => RequestPathFormatEnum::INVITATIONS_BY_ID,
        ];
    }
}
