<?php

declare(strict_types=1);

/*
 * This file is part of the zibios/wrike-php-library package.
 * Webhook Resource added - zack-carlson
 *
 * (c) Zbigniew Ślązak0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Resource;

use Zibios\WrikePhpLibrary\Enum\Api\RequestPathFormatEnum;
use Zibios\WrikePhpLibrary\Enum\Api\ResourceMethodEnum;
use Zibios\WrikePhpLibrary\Resource\Traits\DeleteTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetAllTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetByIdTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\UpdateTrait;

/**
 * SpaceResource Resource.
 */
class SpaceResource extends AbstractResource
{
    use DeleteTrait;
    use GetAllTrait;
    use GetByIdTrait;
    use UpdateTrait;

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
            ResourceMethodEnum::GET_ALL => RequestPathFormatEnum::SPACES,
            ResourceMethodEnum::GET_BY_ID => RequestPathFormatEnum::SPACES_BY_ID,
            ResourceMethodEnum::UPDATE => RequestPathFormatEnum::SPACES_BY_ID,
            ResourceMethodEnum::DELETE => RequestPathFormatEnum::SPACES_BY_ID,
        ];
    }
}
