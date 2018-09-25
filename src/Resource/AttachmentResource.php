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
use Zibios\WrikePhpLibrary\Resource\Traits\DeleteTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\DownloadPreviewTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\DownloadTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetAllTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetAllForFolderTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetAllForTaskTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetByIdsTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetByIdTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetPublicUrlTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\UpdateTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\UploadForFolderTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\UploadForTaskTrait;

/**
 * Attachment Resource.
 */
class AttachmentResource extends AbstractResource
{
    use GetAllTrait;
    use GetAllForFolderTrait;
    use GetAllForTaskTrait;
    use GetByIdTrait;
    use GetByIdsTrait;
    use DownloadTrait;
    use DownloadPreviewTrait;
    use GetPublicUrlTrait;
    use UploadForFolderTrait;
    use UploadForTaskTrait;
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
            ResourceMethodEnum::GET_ALL => RequestPathFormatEnum::ATTACHMENTS,
            ResourceMethodEnum::GET_ALL_FOR_FOLDER => RequestPathFormatEnum::ATTACHMENTS_FOR_FOLDER,
            ResourceMethodEnum::GET_ALL_FOR_TASK => RequestPathFormatEnum::ATTACHMENTS_FOR_TASK,
            ResourceMethodEnum::GET_BY_ID => RequestPathFormatEnum::ATTACHMENTS_BY_ID,
            ResourceMethodEnum::GET_BY_IDS => RequestPathFormatEnum::ATTACHMENTS_BY_IDS,
            ResourceMethodEnum::DOWNLOAD => RequestPathFormatEnum::ATTACHMENTS_DOWNLOAD,
            ResourceMethodEnum::DOWNLOAD_PREVIEW => RequestPathFormatEnum::ATTACHMENTS_DOWNLOAD_PREVIEW,
            ResourceMethodEnum::GET_PUBLIC_URL => RequestPathFormatEnum::ATTACHMENTS_URL,
            ResourceMethodEnum::UPLOAD_FOR_FOLDER => RequestPathFormatEnum::ATTACHMENTS_FOR_FOLDER,
            ResourceMethodEnum::UPLOAD_FOR_TASK => RequestPathFormatEnum::ATTACHMENTS_FOR_TASK,
            ResourceMethodEnum::UPDATE => RequestPathFormatEnum::ATTACHMENTS_BY_ID,
            ResourceMethodEnum::DELETE => RequestPathFormatEnum::ATTACHMENTS_BY_ID,
        ];
    }
}
