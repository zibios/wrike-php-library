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
 * Reschedule Mode Enum.
 */
class RescheduleModeEnum extends AbstractEnum
{
    /**
     * Tasks in scope are rescheduled starting from reschedule date.
     */
    public const START = 'Start';

    /**
     * Tasks in scope are rescheduled ending with reschedule date.
     */
    public const END = 'End';
}
