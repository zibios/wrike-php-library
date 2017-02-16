<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Model\Common;

use Zibios\WrikePhpLibrary\Model\ResourceModelInterface;

/**
 * Avatar Model.
 */
class AvatarModel implements ResourceModelInterface
{
    /**
     * Group letters (2 symbols max), ex. ZS.
     *
     * @var string|null
     */
    protected $letters;

    /**
     * Hex color code, ex. #fe73a1.
     *
     * @var string|null
     */
    protected $color;
}
