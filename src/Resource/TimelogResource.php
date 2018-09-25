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
use Zibios\WrikePhpLibrary\Resource\Traits\GetAllForTimelogCategoryTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetAllTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetAllForContactTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetAllForFolderTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetAllForTaskTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetByIdTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\UpdateTrait;

/**
 * Timelog Resource.
 */
class TimelogResource extends AbstractResource
{
    use GetAllTrait;
    use GetAllForContactTrait;
    use GetAllForFolderTrait;
    use GetAllForTaskTrait;
    use GetAllForTimelogCategoryTrait;
    use GetByIdTrait;
    use CreateForTaskTrait;
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
            ResourceMethodEnum::GET_ALL => RequestPathFormatEnum::TIMELOGS,
            ResourceMethodEnum::GET_ALL_FOR_CONTACT => RequestPathFormatEnum::TIMELOGS_FOR_CONTACT,
            ResourceMethodEnum::GET_ALL_FOR_FOLDER => RequestPathFormatEnum::TIMELOGS_FOR_FOLDER,
            ResourceMethodEnum::GET_ALL_FOR_TASK => RequestPathFormatEnum::TIMELOGS_FOR_TASK,
            ResourceMethodEnum::GET_ALL_FOR_TIMELOG_CATEGORY => RequestPathFormatEnum::TIMELOGS_FOR_TIMELOG_CATEGORY,
            ResourceMethodEnum::GET_BY_ID => RequestPathFormatEnum::TIMELOGS_BY_ID,
            ResourceMethodEnum::CREATE_FOR_TASK => RequestPathFormatEnum::TIMELOGS_FOR_TASK,
            ResourceMethodEnum::UPDATE => RequestPathFormatEnum::TIMELOGS_BY_ID,
            ResourceMethodEnum::DELETE => RequestPathFormatEnum::TIMELOGS_BY_ID,
        ];
    }
}
