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
use Zibios\WrikePhpLibrary\Resource\Traits\CreateForTaskTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\DeleteTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetAllForTaskTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetByIdsTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetByIdTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\UpdateTrait;

/**
 * Dependency Resource.
 */
class DependencyResource extends AbstractResource
{
    use GetAllForTaskTrait;
    use GetByIdTrait;
    use GetByIdsTrait;
    use CreateForTaskTrait;
    use UpdateTrait;
    use DeleteTrait;

    /**
     * @return array
     */
    protected function getResourceMethodConfiguration()
    {
        return [
            ResourceMethodEnum::GET_ALL_FOR_TASK => RequestPathFormatEnum::DEPENDENCIES_FOR_TASK,
            ResourceMethodEnum::GET_BY_ID => RequestPathFormatEnum::DEPENDENCIES_BY_ID,
            ResourceMethodEnum::GET_BY_IDS => RequestPathFormatEnum::DEPENDENCIES_BY_IDS,
            ResourceMethodEnum::CREATE_FOR_TASK => RequestPathFormatEnum::DEPENDENCIES_FOR_TASK,
            ResourceMethodEnum::UPDATE => RequestPathFormatEnum::DEPENDENCIES_BY_ID,
            ResourceMethodEnum::DELETE => RequestPathFormatEnum::DEPENDENCIES_BY_ID,
        ];
    }
}
