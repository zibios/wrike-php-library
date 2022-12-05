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

use Zibios\WrikePhpLibrary\Enum\AbstractEnum;
use Zibios\WrikePhpLibrary\Tests\TestCase;

/**
 * Enum Test Case.
 */
abstract class EnumTestCase extends TestCase
{
    /**
     * @var string
     */
    protected $sourceClass;

    /**
     * @var AbstractEnum
     */
    protected $object;

    /**
     * @var int
     */
    protected $enumCount;

    /**
     * Sets up the exception.
     */
    public function setUp(): void
    {
        $this->object = new $this->sourceClass();
    }

    /**
     * Test enum inheritance.
     */
    public function test_EnumExtendProperClasses(): void
    {
        self::assertInstanceOf(
            AbstractEnum::class,
            $this->object,
            sprintf('"%s" should extend "%s"', \get_class($this->object), AbstractEnum::class)
        );
        self::assertInstanceOf(
            $this->sourceClass,
            $this->object,
            sprintf('"%s" should extend "%s"', \get_class($this->object), $this->sourceClass)
        );
    }

    public function test_toArray(): void
    {
        // Static access
        $enums = \call_user_func([$this->sourceClass, 'toArray']);
        self::assertIsArray($enums);
        self::assertCount($this->enumCount, $enums, $this->sourceClass);

        // Instantiated access
        $enums = $this->object::toArray();
        self::assertIsArray($enums);
        self::assertCount($this->enumCount, $enums, $this->sourceClass);
    }

    public function test_getKeys(): void
    {
        // Static access
        $enums = \call_user_func([$this->sourceClass, 'toArray']);
        $keys = \call_user_func([$this->sourceClass, 'getKeys']);
        self::assertIsArray($keys);
        self::assertSame(array_keys($enums), $keys);

        // Instantiated access
        $enums = $this->object::toArray();
        $keys = $this->object::getKeys();
        self::assertIsArray($keys);
        self::assertSame(array_keys($enums), $keys);
    }

    public function test_getKey(): void
    {
        // Static access
        /** @var array $enums */
        $enums = \call_user_func([$this->sourceClass, 'toArray']);
        /** @var array $values */
        $values = \call_user_func([$this->sourceClass, 'getValues']);
        self::assertIsArray($values);
        foreach ($values as $value) {
            self::assertIsString($value);
            $key = \call_user_func([$this->sourceClass, 'getKey'], $value);
            self::assertSame($value, $enums[$key]);
        }

        // Instantiated access
        /** @var array $enums */
        $enums = $this->object::toArray();
        /** @var array $values */
        $values = $this->object::getValues();
        self::assertIsArray($values);
        foreach ($values as $value) {
            self::assertIsString($value);
            $key = $this->object::getKey($value);
            self::assertSame($value, $enums[$key]);
        }
    }

    public function test_getValues(): void
    {
        // Static access
        $enums = \call_user_func([$this->sourceClass, 'toArray']);
        $values = \call_user_func([$this->sourceClass, 'getValues']);
        self::assertIsArray($values);
        self::assertSame(array_values($enums), $values);

        // Instantiated access
        $enums = $this->object::toArray();
        $values = $this->object::getValues();
        self::assertIsArray($values);
        self::assertSame(array_values($enums), $values);
    }

    public function test_getValue(): void
    {
        // Static access
        /** @var array $enums */
        $enums = \call_user_func([$this->sourceClass, 'toArray']);
        /** @var array $keys */
        $keys = \call_user_func([$this->sourceClass, 'getKeys']);
        self::assertIsArray($keys);
        foreach ($keys as $key) {
            self::assertIsString($key);
            $value = \call_user_func([$this->sourceClass, 'getValue'], $key);
            self::assertSame($value, $enums[$key]);
        }

        // Instantiated access
        /** @var array $enums */
        $enums = $this->object::toArray();
        /** @var array $keys */
        $keys = $this->object::getKeys();
        self::assertIsArray($keys);
        foreach ($keys as $key) {
            self::assertIsString($key);
            $value = $this->object::getValue($key);
            self::assertSame($value, $enums[$key]);
        }
    }

    /**
     * @return array
     */
    public function enumKeysProvider(): array
    {
        $keys = \call_user_func([$this->sourceClass, 'getKeys']);

        return [
            // [key, isValid]
            [$keys[0], true],
            ['NotExistedEnumKey', false],
            ['', false],
        ];
    }

    /**
     * @param mixed $key
     * @param bool  $isValid
     *
     * @dataProvider enumKeysProvider
     */
    public function test_assertIsValidKey($key, $isValid): void
    {
        self::assertSame(
            $isValid,
            \call_user_func([$this->sourceClass, 'isValidKey'], $key),
            sprintf('"%s"', $key)
            // sprintf('"%s"', print_r($key, true))
        );
        $e = null;
        $exceptionOccurred = false;
        $exceptionClass = '';

        try {
            \call_user_func([$this->sourceClass, 'assertIsValidKey'], $key);
        } catch (\Throwable $e) {
            $exceptionOccurred = true;
            $exceptionClass = \get_class($e);
        }

        if (true === $isValid) {
            self::assertFalse(
                $exceptionOccurred,
                sprintf('assertIsValidKey should not throw exception but "%s" exception occurred!', $exceptionClass)
            );
        }
        if (false === $isValid) {
            self::assertTrue(
                $exceptionOccurred,
                sprintf('assertIsValidKey should throw exception but exception not occurred!')
            );
            self::assertInstanceOf(
                \InvalidArgumentException::class,
                $e,
                sprintf(
                    'assertIsValidKey should throw %s exception but %s exception occurred!',
                    \InvalidArgumentException::class,
                    $exceptionClass
                )
            );
        }
    }

    /**
     * @return array
     */
    public function enumValuesProvider(): array
    {
        $values = \call_user_func([$this->sourceClass, 'getValues']);

        return [
            // [value, isValid]
            [$values[0], true],
            ['NotExistedEnumValue', false],
            ['', false],
        ];
    }

    /**
     * @param mixed $value
     * @param bool  $isValid
     *
     * @dataProvider enumValuesProvider
     */
    public function test_assertIsValidValue($value, $isValid): void
    {
        self::assertSame($isValid, \call_user_func([$this->sourceClass, 'isValidValue'], $value));
        $e = null;
        $exceptionOccurred = false;
        $exceptionClass = '';

        try {
            \call_user_func([$this->sourceClass, 'assertIsValidValue'], $value);
        } catch (\Throwable $e) {
            $exceptionOccurred = true;
            $exceptionClass = \get_class($e);
        }

        if (true === $isValid) {
            self::assertFalse(
                $exceptionOccurred,
                sprintf('assertIsValidValue should not throw exception but "%s" exception occurred!', $exceptionClass)
            );
        }
        if (false === $isValid) {
            self::assertTrue(
                $exceptionOccurred,
                sprintf('assertIsValidValue should throw exception but exception not occurred!')
            );
            self::assertInstanceOf(
                \InvalidArgumentException::class,
                $e,
                sprintf(
                    'assertIsValidValue should throw %s exception but %s exception occurred!',
                    \InvalidArgumentException::class,
                    $exceptionClass
                )
            );
        }
    }

    public function test_testIsValidEnumCount(): void
    {
        $class = new \ReflectionClass($this->sourceClass);
        $expectedConstants = $class->getConstants();
        self::assertCount($this->enumCount, $expectedConstants);
    }
}
