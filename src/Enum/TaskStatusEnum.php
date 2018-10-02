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
 * Task Status Enum.
 */
class TaskStatusEnum extends AbstractEnum
{
    public const ACTIVE = 'Active';
    public const COMPLETED = 'Completed';
    public const DEFERRED = 'Deferred';
    public const CANCELLED = 'Cancelled';
}
