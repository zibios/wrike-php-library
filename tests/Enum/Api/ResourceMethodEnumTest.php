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

use Zibios\WrikePhpLibrary\Enum\Api\ResourceMethodEnum;
use Zibios\WrikePhpLibrary\Tests\Enum\EnumTestCase;

/**
 * Resource Method Enum Test.
 */
class ResourceMethodEnumTest extends EnumTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = ResourceMethodEnum::class;

    /**
     * @var int
     */
    protected $enumCount = 18;
}
