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
 * Attachment Type Enum.
 */
class AttachmentTypeEnum extends AbstractEnum
{
    /**
     * Attachment file content stored in Wrike.
     * When deleted, actual file is removed.
     */
    const WRIKE = 'Wrike';

    /**
     * Google attachment.
     * Attachment can be accessed only via URL, downloads are not supported by Wrike.
     * When deleted, only stored link is removed.
     */
    const GOOGLE = 'Google';

    /**
     * DropBox attachment.
     * When deleted, only stored link is removed.
     */
    const DROP_BOX = 'DropBox';

    /**
     * Box attachment.
     * Attachment can be accessed only via URL, downloads are not supported by Wrike.
     * When deleted, only stored link is removed.
     */
    const BOX = 'Box';

    /**
     * OneDrive attachment.
     * When deleted, only stored link is removed.
     */
    const ONE_DRIVE = 'OneDrive';
}
