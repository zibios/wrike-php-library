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

use Zibios\WrikePhpLibrary\Enum\InvitationStatusEnum;

/**
 * Invitation Status Enum Test
 */
class InvitationStatusEnumTest extends EnumTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = InvitationStatusEnum::class;

    /**
     * @var int
     */
    protected $enumCount = 4;
}
