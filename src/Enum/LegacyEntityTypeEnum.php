<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Enum;

/**
 * Legacy Entity Type Enum.
 */
class LegacyEntityTypeEnum extends AbstractEnum
{
    /**
     * API v2 account.
     */
    const API_V2_ACCOUNT = 'ApiV2Account';

    /**
     * API v2 user.
     */
    const API_V2_USER = 'ApiV2User';

    /**
     * API v2 folder.
     */
    const API_V2_FOLDER = 'ApiV2Folder';

    /**
     * API v2 task.
     */
    const API_V2_TASK = 'ApiV2Task';

    /**
     * API v2 comment.
     */
    const API_V2_COMMENT = 'ApiV2Comment';

    /**
     * API v2 attachment.
     */
    const API_V2_ATTACHMENT = 'ApiV2Attachment';

    /**
     * API v2 timelog entry.
     */
    const API_V2_TIMELOG = 'ApiV2Timelog';
}
