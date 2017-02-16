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
use Zibios\WrikePhpLibrary\Resource\Traits\GetAllInAccountTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetAllTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetByIdsTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetByIdTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\UpdateTrait;

/**
 * Contact Resource.
 */
class ContactResource extends AbstractResource
{
    use GetAllTrait;
    use GetAllInAccountTrait;
    use GetByIdTrait;
    use GetByIdsTrait;
    use UpdateTrait;

    /**
     * @return array
     */
    protected function getResourceMethodConfiguration()
    {
        return [
            ResourceMethodEnum::GET_ALL => RequestPathFormatEnum::CONTACTS,
            ResourceMethodEnum::GET_ALL_IN_ACCOUNT => RequestPathFormatEnum::CONTACTS_IN_ACCOUNT,
            ResourceMethodEnum::GET_BY_ID => RequestPathFormatEnum::CONTACTS_BY_ID,
            ResourceMethodEnum::GET_BY_IDS => RequestPathFormatEnum::CONTACTS_BY_ID,
            ResourceMethodEnum::UPDATE => RequestPathFormatEnum::CONTACTS_BY_ID,
        ];
    }
}
