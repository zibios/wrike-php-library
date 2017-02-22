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
use Zibios\WrikePhpLibrary\Resource\Traits\GetAllTrait;

/**
 * Id Resource.
 */
class IdResource extends AbstractResource
{
    use GetAllTrait;

    /**
     * @return array
     */
    protected function getResourceMethodConfiguration()
    {
        return [
            ResourceMethodEnum::GET_ALL => RequestPathFormatEnum::IDS,
        ];
    }
}
