<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Enum;

/**
 * Abstract Enum.
 *
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
abstract class AbstractEnum
{
    /**
     * @var array
     */
    protected static $cache = [];

    /**
     * Return all constants as Key => Value array.
     *
     * @return array
     */
    public static function toArray()
    {
        $class = static::class;
        if (!array_key_exists($class, static::$cache)) {
            $reflection = new \ReflectionClass($class);
            static::$cache[$class] = $reflection->getConstants();
        }

        return static::$cache[$class];
    }

    /**
     * Return all constants Keys as array.
     *
     * @return array|string[]
     */
    public static function getKeys()
    {
        return array_keys(static::toArray());
    }

    /**
     * Return Enum Key for requested Value.
     *
     * @param mixed $value
     *
     * @throws \InvalidArgumentException
     *
     * @return string
     */
    public static function getKey($value)
    {
        self::assertIsValidValue($value);

        return (string) array_search($value, static::toArray(), true);
    }

    /**
     * Validate if Key is valid.
     *
     * @param string $key
     *
     * @return bool
     */
    public static function isValidKey($key)
    {
        return array_key_exists($key, self::toArray());
    }

    /**
     * Throw exception if Key is not valid.
     *
     * @param string $key
     *
     * @throws \InvalidArgumentException
     */
    public static function assertIsValidKey($key)
    {
        if (false === self::isValidKey($key)) {
            throw new \InvalidArgumentException('Wrong key.');
        }
    }

    /**
     * Return Enum Value for requested Key.
     *
     * @param string $key
     *
     * @throws \InvalidArgumentException
     *
     * @return mixed
     */
    public static function getValue($key)
    {
        self::assertIsValidKey($key);

        return static::toArray()[$key];
    }

    /**
     * Return all constants Values as array.
     *
     * @return array
     */
    public static function getValues()
    {
        return array_values(self::toArray());
    }

    /**
     * Validate if Value is valid.
     *
     * @param mixed $value
     *
     * @return bool
     */
    public static function isValidValue($value)
    {
        return in_array($value, static::toArray(), true);
    }

    /**
     * Throw exception if Value is not valid.
     *
     * @param mixed $value
     *
     * @throws \InvalidArgumentException
     */
    public static function assertIsValidValue($value)
    {
        if (false === self::isValidValue($value)) {
            throw new \InvalidArgumentException('Wrong value.');
        }
    }
}
