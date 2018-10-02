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
 * Project Status Enum.
 */
class ProjectStatusEnum extends AbstractEnum
{
    public const GREEN = 'Green';
    public const YELLOW = 'Yellow';
    public const RED = 'Red';
    public const COMPLETED = 'Completed';
    public const ON_HOLD = 'OnHold';
    public const CANCELLED = 'Cancelled';
}
