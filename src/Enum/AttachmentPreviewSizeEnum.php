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

namespace Zibios\WrikePhpLibrary\Enum;

/**
 * Attachment PreviewSize Enum.
 */
class AttachmentPreviewSizeEnum extends AbstractEnum
{
    /**
     * Width = 44, height = auto.
     */
    const W44 = 'w44';

    /**
     * Width = 100, height = auto.
     */
    const W100 = 'w100';

    /**
     * Width = 200, height = auto.
     */
    const W200 = 'w200';

    /**
     * Width = 300, height = auto.
     */
    const W300 = 'w300';

    /**
     * Width = 400, height = auto.
     */
    const W400 = 'w400';

    /**
     * Width = auto, height = 400.
     */
    const H400 = 'h400';
}
