<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Tests\Enum;

use Zibios\WrikePhpLibrary\Enum\TaskDatesTypeEnum;

/**
 * Task Dates Type Enum Test.
 */
class TaskDatesTypeEnumTest extends EnumTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = TaskDatesTypeEnum::class;

    /**
     * @var int
     */
    protected $enumCount = 3;
}
