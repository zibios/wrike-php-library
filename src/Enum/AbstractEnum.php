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
 */
abstract class AbstractEnum
{
    /**
     * @var array
     */
    protected static $cache = [];

    /**
     * @return array
     */
    public static function toArray()
    {
        $class = get_called_class();
        if (!array_key_exists($class, static::$cache)) {
            $reflection = new \ReflectionClass($class);
            static::$cache[$class] = $reflection->getConstants();
        }

        return static::$cache[$class];
    }

    /**
     * @return array|string[]
     */
    public static function getKeys()
    {
        return array_keys(static::toArray());
    }

    /**
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
     * @param string $key
     *
     * @return bool
     */
    public static function isValidKey($key)
    {
        return array_key_exists($key, self::toArray());
    }

    /**
     * @param string $key
     *
     * @throws \InvalidArgumentException
     */
    public static function assertIsValidKey($key)
    {
        if (self::isValidKey($key) === false) {
            throw new \InvalidArgumentException('Wrong key.');
        }
    }

    /**
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
     * @return array
     */
    public static function getValues()
    {
        return array_values(self::toArray());
    }

    /**
     * @param mixed $value
     *
     * @return bool
     */
    public static function isValidValue($value)
    {
        return in_array($value, static::toArray(), true);
    }

    /**
     * @param mixed $value
     *
     * @throws \InvalidArgumentException
     */
    public static function assertIsValidValue($value)
    {
        if (self::isValidValue($value) === false) {
            throw new \InvalidArgumentException('Wrong value.');
        }
    }
}
