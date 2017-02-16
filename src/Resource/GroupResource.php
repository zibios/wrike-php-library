<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Resource;

use Zibios\WrikePhpLibrary\Enum\Api\RequestPathFormatEnum;
use Zibios\WrikePhpLibrary\Enum\Api\ResourceMethodEnum;
use Zibios\WrikePhpLibrary\Resource\Traits\CreateInAccountTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\DeleteTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetAllInAccountTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetByIdTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\UpdateTrait;

/**
 * Group Resource.
 */
class GroupResource extends AbstractResource
{
    use GetAllInAccountTrait;
    use GetByIdTrait;
    use CreateInAccountTrait;
    use UpdateTrait;
    use DeleteTrait;

    /**
     * @return array
     */
    protected function getResourceMethodConfiguration()
    {
        return [
            ResourceMethodEnum::GET_ALL_IN_ACCOUNT => RequestPathFormatEnum::GROUPS_IN_ACCOUNT,
            ResourceMethodEnum::GET_BY_ID => RequestPathFormatEnum::GROUPS_BY_ID,
            ResourceMethodEnum::CREATE_IN_ACCOUNT => RequestPathFormatEnum::GROUPS_IN_ACCOUNT,
            ResourceMethodEnum::UPDATE => RequestPathFormatEnum::GROUPS_BY_ID,
            ResourceMethodEnum::DELETE => RequestPathFormatEnum::GROUPS_BY_ID,
        ];
    }
}
