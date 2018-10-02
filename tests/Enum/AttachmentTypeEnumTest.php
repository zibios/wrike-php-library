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

use Zibios\WrikePhpLibrary\Enum\AttachmentTypeEnum;

/**
 * Attachment Type Enum Test.
 */
class AttachmentTypeEnumTest extends EnumTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = AttachmentTypeEnum::class;

    /**
     * @var int
     */
    protected $enumCount = 6;
}
