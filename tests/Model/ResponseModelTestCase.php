<?php
/**
 * This file is part of the WrikePhpLibrary package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Tests\Model;

use Zibios\WrikePhpLibrary\Model\ResponseModelInterface;
use Zibios\WrikePhpLibrary\Tests\TestCase;

/**
 * Response Model Test Case
 */
abstract class ResponseModelTestCase extends TestCase
{
    /**
     * @var string
     */
    protected $sourceClass;

    /**
     * @var ResponseModelInterface
     */
    protected $object;

    /**
     * @var array
     */
    protected $properties = [
        'kind',
        'data',
    ];

    /**
     * Sets up the exception.
     */
    public function setUp()
    {
        $this->object = new $this->sourceClass();
    }

    /**
     * Test exception inheritance
     */
    public function test_ExtendProperClasses()
    {
        self::assertInstanceOf(ResponseModelInterface::class, $this->object, sprintf('"%s" should extend "%s"', get_class($this->object), ResponseModelInterface::class));
    }
}
