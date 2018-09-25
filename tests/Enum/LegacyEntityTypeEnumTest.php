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

use Zibios\WrikePhpLibrary\Enum\LegacyEntityTypeEnum;

/**
 * Legacy Entity Type Enum Test.
 */
class LegacyEntityTypeEnumTest extends EnumTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = LegacyEntityTypeEnum::class;

    /**
     * @var int
     */
    protected $enumCount = 7;
}
