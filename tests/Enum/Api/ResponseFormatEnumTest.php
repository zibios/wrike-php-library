<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Tests\Enum\Api;

use Zibios\WrikePhpLibrary\Enum\Api\ResponseFormatEnum;
use Zibios\WrikePhpLibrary\Tests\Enum\EnumTestCase;

/**
 * Response Format Enum Test.
 */
class ResponseFormatEnumTest extends EnumTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = ResponseFormatEnum::class;

    /**
     * @var int
     */
    protected $enumCount = 2;
}
