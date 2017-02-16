<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Tests\Model;

use Zibios\WrikePhpLibrary\Model\ResourceModelInterface;
use Zibios\WrikePhpLibrary\Tests\TestCase;

/**
 * Resource Model Test Case.
 */
abstract class ResourceModelTestCase extends TestCase
{
    /**
     * @var string
     */
    protected $sourceClass;

    /**
     * @var ResourceModelInterface
     */
    protected $object;

    /**
     * @var array
     */
    protected $properties;

    /**
     * Sets up the exception.
     */
    public function setUp()
    {
        $this->object = new $this->sourceClass();
    }

    /**
     * Test exception inheritance.
     */
    public function test_ExtendProperClasses()
    {
        self::assertInstanceOf(ResourceModelInterface::class, $this->object, sprintf('"%s" should extend "%s"', get_class($this->object), ResourceModelInterface::class));
        self::assertInstanceOf($this->sourceClass, $this->object, sprintf('"%s" should extend "%s"', get_class($this->object), $this->sourceClass));
    }
}
