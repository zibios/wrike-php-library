<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Validator;

/**
 * Access Token Validator.
 */
class AccessTokenValidator
{
    /**
     * @param mixed $value
     *
     * @return bool
     */
    public static function isValid($value)
    {
        return is_string($value) && trim($value) !== '';
    }

    /**
     * @param mixed $value
     *
     * @throws \InvalidArgumentException
     */
    public static function assertIsValid($value)
    {
        if (self::isValid($value) === false) {
            throw new \InvalidArgumentException(sprintf('Invalid Access Token, should be not empty string!'));
        }
    }

    /**
     * @param mixed $value
     *
     * @return bool
     */
    public static function isValidOrEmpty($value)
    {
        return self::isValid($value) || $value === '';
    }

    /**
     * @param mixed $value
     *
     * @throws \InvalidArgumentException
     */
    public static function assertIsValidOrEmpty($value)
    {
        if (self::isValidOrEmpty($value) === false) {
            throw new \InvalidArgumentException(sprintf('Invalid Access Token, should be not empty string!'));
        }
    }
}
