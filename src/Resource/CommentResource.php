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
use Zibios\WrikePhpLibrary\Resource\Traits\CreateForFolderTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\CreateForTaskTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\DeleteTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetAllForAccountTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetAllForFolderTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetAllForTaskTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetAllTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetByIdsTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetByIdTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\UpdateTrait;

/**
 * Comment Resource.
 */
class CommentResource extends AbstractResource
{
    use GetAllTrait;
    use GetAllForAccountTrait;
    use GetAllForFolderTrait;
    use GetAllForTaskTrait;
    use GetByIdTrait;
    use GetByIdsTrait;
    use CreateForFolderTrait;
    use CreateForTaskTrait;
    use UpdateTrait;
    use DeleteTrait;

    /**
     * @return array
     */
    protected function getResourceMethodConfiguration()
    {
        return [
            ResourceMethodEnum::GET_ALL => RequestPathFormatEnum::COMMENTS,
            ResourceMethodEnum::GET_ALL_FOR_ACCOUNT => RequestPathFormatEnum::COMMENTS_FOR_ACCOUNT,
            ResourceMethodEnum::GET_ALL_FOR_FOLDER => RequestPathFormatEnum::COMMENTS_FOR_FOLDER,
            ResourceMethodEnum::GET_ALL_FOR_TASK => RequestPathFormatEnum::COMMENTS_FOR_TASK,
            ResourceMethodEnum::GET_BY_ID => RequestPathFormatEnum::COMMENTS_BY_ID,
            ResourceMethodEnum::GET_BY_IDS => RequestPathFormatEnum::COMMENTS_BY_IDS,
            ResourceMethodEnum::CREATE_FOR_FOLDER => RequestPathFormatEnum::COMMENTS_FOR_FOLDER,
            ResourceMethodEnum::CREATE_FOR_TASK => RequestPathFormatEnum::COMMENTS_FOR_TASK,
            ResourceMethodEnum::UPDATE => RequestPathFormatEnum::COMMENTS_BY_ID,
            ResourceMethodEnum::DELETE => RequestPathFormatEnum::COMMENTS_BY_ID,
        ];
    }
}
