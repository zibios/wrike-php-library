<?php

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
    const GET_ALL = 'getAll';
    const GET_ALL_FOR_ACCOUNT = 'getAllForAccount';
    const GET_ALL_FOR_FOLDER = 'getAllForFolder';
    const GET_ALL_FOR_TASK = 'getAllForTask';
    const GET_ALL_FOR_CONTACT = 'getAllForContact';
    const GET_ALL_FOR_TIMELOG_CATEGORY = 'getAllForTimelogCategory';
    const GET_BY_ID = 'getById';
    const GET_BY_IDS = 'getByIds';
    const CREATE_FOR_ACCOUNT = 'createForAccount';
    const CREATE_FOR_FOLDER = 'createForFolder';
    const CREATE_FOR_TASK = 'createForTask';
    const COPY = 'copy';
    const UPDATE = 'update';
    const DELETE = 'delete';
    const DOWNLOAD = 'download';
    const DOWNLOAD_PREVIEW = 'downloadPreview';
    const GET_PUBLIC_URL = 'getPublicUrl';
    const UPLOAD_FOR_FOLDER = 'uploadForFolder';
    const UPLOAD_FOR_TASK = 'uploadForTask';
}
