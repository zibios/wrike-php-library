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
use Zibios\WrikePhpLibrary\Resource\Traits\CopyTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\CreateForFolderTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\DeleteTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetAllForAccountTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetAllForFolderTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetAllTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetByIdsTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetByIdTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\UpdateTrait;

/**
 * Folder Resource.
 */
class FolderResource extends AbstractResource
{
    use GetAllTrait;
    use GetAllForAccountTrait;
    use GetAllForFolderTrait;
    use GetByIdTrait;
    use GetByIdsTrait;
    use CreateForFolderTrait;
    use CopyTrait;
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
            ResourceMethodEnum::GET_ALL => RequestPathFormatEnum::FOLDERS,
            ResourceMethodEnum::GET_ALL_FOR_ACCOUNT => RequestPathFormatEnum::FOLDERS_FOR_ACCOUNT,
            ResourceMethodEnum::GET_ALL_FOR_FOLDER => RequestPathFormatEnum::FOLDERS_FOR_FOLDER,
            ResourceMethodEnum::GET_BY_ID => RequestPathFormatEnum::FOLDERS_BY_ID,
            ResourceMethodEnum::GET_BY_IDS => RequestPathFormatEnum::FOLDERS_BY_IDS,
            ResourceMethodEnum::CREATE_FOR_FOLDER => RequestPathFormatEnum::FOLDERS_FOR_FOLDER,
            ResourceMethodEnum::COPY => RequestPathFormatEnum::FOLDERS_COPY,
            ResourceMethodEnum::UPDATE => RequestPathFormatEnum::FOLDERS_BY_ID,
            ResourceMethodEnum::DELETE => RequestPathFormatEnum::FOLDERS_BY_ID,
        ];
    }
}
