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
 * Task Dates Type Enum.
 */
class TaskDatesTypeEnum extends AbstractEnum
{
    const BACKLOG = 'Backlog';
    const MILESTONE = 'Milestone';
    const PLANNED = 'Planned';
}
