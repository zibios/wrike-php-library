<?php
/**
 * This file is part of the WrikePhpLibrary package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Tests\Exception\Api;

use Exception;
use Zibios\WrikePhpLibrary\Exception\Api\ApiException;
use Zibios\WrikePhpLibrary\Tests\TestCase;

/**
 * Api Exception Test Case
 */
abstract class ApiExceptionTestCase extends TestCase
{
    /**
     * @var string
     */
    protected $sourceClass;

    /**
     * @var ApiException
     */
    protected $object;

    /**
     * Sets up the exception.
     */
    public function setUp()
    {
        $this->object = new $this->sourceClass(new \Exception());
    }

    /**
     * Test exception inheritance
     */
    public function test_ExceptionExtendProperClasses()
    {
        self::assertInstanceOf(Exception::class, $this->object, sprintf('"%s" should extend "%s"', get_class($this->object), Exception::class));
        self::assertInstanceOf(ApiException::class, $this->object, sprintf('"%s" should extend "%s"', get_class($this->object), ApiException::class));
        self::assertInstanceOf($this->sourceClass, $this->object, sprintf('"%s" should extend "%s"', get_class($this->object), $this->sourceClass));
    }

    public function test_IdentifierMethods()
    {
        $statusCode = constant(sprintf('%s::STATUS_CODE', $this->sourceClass));
        $statusName = constant(sprintf('%s::STATUS_NAME', $this->sourceClass));
        $expectedIdentifier = sprintf('%s%s', $statusCode, $statusName);

        self::assertEquals($expectedIdentifier, $this->object->getExceptionIdentifier());
        self::assertEquals($expectedIdentifier, call_user_func([$this->sourceClass, 'getExceptionIdentifier']));
        self::assertEquals($expectedIdentifier, $this->object->calculateExceptionIdentifier($statusCode, $statusName));
        self::assertEquals($expectedIdentifier, call_user_func([$this->sourceClass, 'calculateExceptionIdentifier'], $statusCode, $statusName));
        self::assertEquals('1234', $this->object->calculateExceptionIdentifier(12, 34));
    }
}
