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

namespace Zibios\WrikePhpLibrary\Resource;

use Zibios\WrikePhpLibrary\Enum\Api\RequestPathFormatEnum;
use Zibios\WrikePhpLibrary\Enum\Api\ResourceMethodEnum;
use Zibios\WrikePhpLibrary\Resource\Traits\GetAllTrait;

/**
 * Version Resource.
 */
class VersionResource extends AbstractResource
{
    use GetAllTrait;

    /**
     * Return connection array ResourceMethod => RequestPathFormat.
     *
     * @see \Zibios\WrikePhpLibrary\Enum\Api\ResourceMethodEnum
     * @see \Zibios\WrikePhpLibrary\Enum\Api\RequestPathFormatEnum
     *
     * @return array
     */
    protected function getResourceMethodConfiguration(): array
    {
        return [
            ResourceMethodEnum::GET_ALL => RequestPathFormatEnum::VERSIONS,
        ];
    }
}
