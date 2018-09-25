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

namespace Zibios\WrikePhpLibrary\Tests\Enum;

use Zibios\WrikePhpLibrary\Enum\CustomStatusColorEnum;

/**
 * CustomS tatus Color Enum Test.
 */
class CustomStatusColorEnumTest extends EnumTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = CustomStatusColorEnum::class;

    /**
     * @var int
     */
    protected $enumCount = 13;
}
