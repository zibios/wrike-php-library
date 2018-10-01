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

use Zibios\WrikePhpLibrary\Enum\DependencyRelationTypeEnum;

/**
 * Dependency Relation Type Enum Test.
 */
class DependencyRelationTypeEnumTest extends EnumTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = DependencyRelationTypeEnum::class;

    /**
     * @var int
     */
    protected $enumCount = 4;
}
