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
use Zibios\WrikePhpLibrary\Resource\Traits\CreateForAccountTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\DeleteTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetAllForAccountTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetByIdTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\UpdateTrait;

/**
 * Group Resource.
 */
class GroupResource extends AbstractResource
{
    use GetAllForAccountTrait;
    use GetByIdTrait;
    use CreateForAccountTrait;
    use UpdateTrait;
    use DeleteTrait;

    /**
     * Return connection array ResourceMethod => RequestPathFormat.
     *
     * @see \Zibios\WrikePhpLibrary\Enum\Api\ResourceMethodEnum
     * @see \Zibios\WrikePhpLibrary\Enum\Api\RequestPathFormatEnum
     *
     * @return array
     */
    protected function getResourceMethodConfiguration()
    {
        return [
            ResourceMethodEnum::GET_ALL_FOR_ACCOUNT => RequestPathFormatEnum::GROUPS_FOR_ACCOUNT,
            ResourceMethodEnum::GET_BY_ID => RequestPathFormatEnum::GROUPS_BY_ID,
            ResourceMethodEnum::CREATE_FOR_ACCOUNT => RequestPathFormatEnum::GROUPS_FOR_ACCOUNT,
            ResourceMethodEnum::UPDATE => RequestPathFormatEnum::GROUPS_BY_ID,
            ResourceMethodEnum::DELETE => RequestPathFormatEnum::GROUPS_BY_ID,
        ];
    }
}
