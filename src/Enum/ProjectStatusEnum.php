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
 * Project Status Enum.
 */
class ProjectStatusEnum extends AbstractEnum
{
    const GREEN = 'Green';
    const YELLOW = 'Yellow';
    const RED = 'Red';
    const COMPLETED = 'Completed';
    const ON_HOLD = 'OnHold';
    const CANCELLED = 'Cancelled';
}
