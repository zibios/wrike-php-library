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

namespace Zibios\WrikePhpLibrary\Tests;

/**
 * Abstract Test Case.
 */
abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @var string
     */
    protected $sourceClass;

    /**
     * @var mixed
     */
    protected $object;
}
