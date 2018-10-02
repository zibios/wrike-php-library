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

namespace Zibios\WrikePhpLibrary\Tests\Exception\Api;

use Exception;
use Zibios\WrikePhpLibrary\Exception\Api\ApiException;
use Zibios\WrikePhpLibrary\Tests\TestCase;

/**
 * Api Exception Test Case.
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
    public function setUp(): void
    {
        $this->object = new $this->sourceClass(new \Exception());
    }

    /**
     * Test exception inheritance.
     */
    public function test_ExceptionExtendProperClasses(): void
    {
        self::assertInstanceOf(
            Exception::class,
            $this->object,
            sprintf('"%s" should extend "%s"', \get_class($this->object), Exception::class)
        );
        self::assertInstanceOf(
            ApiException::class,
            $this->object,
            sprintf('"%s" should extend "%s"', \get_class($this->object), ApiException::class)
        );
        self::assertInstanceOf(
            $this->sourceClass,
            $this->object,
            sprintf('"%s" should extend "%s"', \get_class($this->object), $this->sourceClass)
        );
    }
}
