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

namespace Zibios\WrikePhpLibrary\Enum\Api;

use Zibios\WrikePhpLibrary\Enum\AbstractEnum;

/**
 * Resource Method Enum.
 */
class ResourceMethodEnum extends AbstractEnum
{
    public const GET_ALL = 'getAll';
    public const GET_ALL_FOR_FOLDER = 'getAllForFolder';
    public const GET_ALL_FOR_TASK = 'getAllForTask';
    public const GET_ALL_FOR_CONTACT = 'getAllForContact';
    public const GET_ALL_FOR_TIMELOG_CATEGORY = 'getAllForTimelogCategory';
    public const GET_BY_ID = 'getById';
    public const GET_BY_IDS = 'getByIds';
    public const CREATE = 'create';
    public const CREATE_FOR_FOLDER = 'createForFolder';
    public const CREATE_WEBHOOK_FOR_FOLDER = 'createWebhookForFolder';
    public const CREATE_FOR_SPACE = 'createForSpace';
    public const CREATE_FOR_TASK = 'createForTask';
    public const COPY = 'copy';
    public const UPDATE = 'update';
    public const UPDATE_DEFAULT = 'updateDefault';
    public const DELETE = 'delete';
    public const DOWNLOAD = 'download';
    public const DOWNLOAD_PREVIEW = 'downloadPreview';
    public const GET_PUBLIC_URL = 'getPublicUrl';
    public const UPLOAD_FOR_FOLDER = 'uploadForFolder';
    public const UPLOAD_FOR_TASK = 'uploadForTask';
}
