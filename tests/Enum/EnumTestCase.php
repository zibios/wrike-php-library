<?php
/**
 * This file is part of the WrikePhpLibrary package.
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
 * Enum Test Case
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
    public function setUp()
    {
        $this->object = new $this->sourceClass();
    }

    /**
     * Test enum inheritance
     */
    public function test_EnumExtendProperClasses()
    {
        self::assertInstanceOf(AbstractEnum::class, $this->object, sprintf('"%s" should extend "%s"', get_class($this->object), AbstractEnum::class));
        self::assertInstanceOf($this->sourceClass, $this->object, sprintf('"%s" should extend "%s"', get_class($this->object), $this->sourceClass));
    }

    public function test_toArray()
    {
        $enums = call_user_func([$this->sourceClass, 'toArray']);
        self::assertInternalType('array', $enums);
        self::assertCount($this->enumCount, $enums, $this->sourceClass);

        $enums = $this->object->toArray();
        self::assertInternalType('array', $enums);
        self::assertCount($this->enumCount, $enums, $this->sourceClass);
    }

    public function test_getKeys()
    {
        $enums = call_user_func([$this->sourceClass, 'toArray']);
        $keys = call_user_func([$this->sourceClass, 'getKeys']);
        self::assertInternalType('array', $keys);
        self::assertSame(array_keys($enums), $keys);

        $enums = $this->object->toArray();
        $keys = $this->object->getKeys();
        self::assertInternalType('array', $keys);
        self::assertSame(array_keys($enums), $keys);
    }

    public function test_getKey()
    {
        /** @var array $enums */
        $enums = call_user_func([$this->sourceClass, 'toArray']);
        /** @var array $values */
        $values = call_user_func([$this->sourceClass, 'getValues']);
        self::assertInternalType('array', $values);
        foreach ($values as $value) {
            self::assertInternalType('string', $value);
            $key = call_user_func([$this->sourceClass, 'getKey'], $value);
            self::assertSame($value, $enums[$key]);
        }
        /** @var array $enums */
        $enums = $this->object->toArray();
        /** @var array $values */
        $values = $this->object->getValues();
        self::assertInternalType('array', $values);
        foreach ($values as $value) {
            self::assertInternalType('string', $value);
            $key = $this->object->getKey($value);
            self::assertSame($value, $enums[$key]);
        }
    }

    public function test_getValues()
    {
        $enums = call_user_func([$this->sourceClass, 'toArray']);
        $values = call_user_func([$this->sourceClass, 'getValues']);
        self::assertInternalType('array', $values);
        self::assertSame(array_values($enums), $values);

        $enums = $this->object->toArray();
        $values = $this->object->getValues();
        self::assertInternalType('array', $values);
        self::assertSame(array_values($enums), $values);
    }

    public function test_getValue()
    {
        /** @var array $enums */
        $enums = call_user_func([$this->sourceClass, 'toArray']);
        /** @var array $keys */
        $keys = call_user_func([$this->sourceClass, 'getKeys']);
        self::assertInternalType('array', $keys);
        foreach ($keys as $key) {
            self::assertInternalType('string', $key);
            $value = call_user_func([$this->sourceClass, 'getValue'], $key);
            self::assertSame($value, $enums[$key]);
        }

        /** @var array $enums */
        $enums = $this->object->toArray();
        /** @var array $keys */
        $keys = $this->object->getKeys();
        self::assertInternalType('array', $keys);
        foreach ($keys as $key) {
            self::assertInternalType('string', $key);
            $value = $this->object->getValue($key);
            self::assertSame($value, $enums[$key]);
        }
    }

    /**
     * @return array
     */
    public function enumKeysProvider()
    {
        $keys = call_user_func([$this->sourceClass, 'getKeys']);

        return [
            // [key, isValid]
            [$keys[0], true],
            ['NotExistedEnumKey', false],
            ['', false],
            [null, false],
        ];
    }

    /**
     * @param mixed $key
     * @param boolean $isValid
     *
     * @dataProvider enumKeysProvider
     */
    public function test_assertIsValidKey($key, $isValid)
    {
        self::assertEquals($isValid, call_user_func([$this->sourceClass, 'isValidKey'], $key), sprintf('"%s"', print_r($key, true)));
        $e = null;
        $exceptionOccurred = false;
        $exceptionClass = '';
        try {
            call_user_func([$this->sourceClass, 'assertIsValidKey'], $key);
        } catch (\Exception $e) {
            $exceptionOccurred = true;
            $exceptionClass = get_class($e);
        }

        if ($isValid === true) {
            self::assertFalse($exceptionOccurred, sprintf('assertIsValidKey should not throw exception but "%s" exception occurred!', $exceptionClass));
        }
        if ($isValid === false) {
            self::assertTrue($exceptionOccurred, sprintf('assertIsValidKey should throw exception but exception not occurred!'));
            self::assertInstanceOf(\InvalidArgumentException::class, $e, sprintf('assertIsValidKey should throw %s exception but %s exception occurred!', \InvalidArgumentException::class, $exceptionClass));
        }
    }

    /**
     * @return array
     */
    public function enumValuesProvider()
    {
        $values = call_user_func([$this->sourceClass, 'getValues']);

        return [
            // [value, isValid]
            [$values[0], true],
            ['NotExistedEnumValue', false],
            ['', false],
            [null, false],
        ];
    }

    /**
     * @param mixed $value
     * @param boolean $isValid
     *
     * @dataProvider enumValuesProvider
     */
    public function test_assertIsValidValue($value, $isValid)
    {
        self::assertEquals($isValid, call_user_func([$this->sourceClass, 'isValidValue'], $value));
        $e = null;
        $exceptionOccurred = false;
        $exceptionClass = '';
        try {
            call_user_func([$this->sourceClass, 'assertIsValidValue'], $value);
        } catch (\Exception $e) {
            $exceptionOccurred = true;
            $exceptionClass = get_class($e);
        }

        if ($isValid === true) {
            self::assertFalse($exceptionOccurred, sprintf('assertIsValidValue should not throw exception but "%s" exception occurred!', $exceptionClass));
        }
        if ($isValid === false) {
            self::assertTrue($exceptionOccurred, sprintf('assertIsValidValue should throw exception but exception not occurred!'));
            self::assertInstanceOf(\InvalidArgumentException::class, $e, sprintf('assertIsValidValue should throw %s exception but %s exception occurred!', \InvalidArgumentException::class, $exceptionClass));
        }
    }

    public function test_testIsValidEnumCount()
    {
        $class = new \ReflectionClass($this->sourceClass);
        $expectedConstants = $class->getConstants();
        self::assertCount($this->enumCount, $expectedConstants);
    }
}
