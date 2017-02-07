<?php
/**
 * This file is part of the WrikePhpLibrary package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Tests\Enum;

use Zibios\WrikePhpLibrary\Enum\OptionalFieldEnum;

/**
 * Optional Field Enum Test
 */
class OptionalFieldEnumTest extends EnumTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = OptionalFieldEnum::class;

    /**
     * @var int
     */
    protected $enumCount = 1;
}
