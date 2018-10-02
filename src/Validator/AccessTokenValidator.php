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
    public static function isValid($value): bool
    {
        return \is_string($value) && '' !== trim($value);
    }

    /**
     * @param mixed $value
     *
     * @throws \InvalidArgumentException
     */
    public static function assertIsValid($value): void
    {
        if (false === self::isValid($value)) {
            throw new \InvalidArgumentException(sprintf('Invalid Access Token, should be not empty string!'));
        }
    }

    /**
     * @param mixed $value
     *
     * @return bool
     */
    public static function isValidOrEmpty($value): bool
    {
        return self::isValid($value) || '' === $value;
    }

    /**
     * @param mixed $value
     *
     * @throws \InvalidArgumentException
     */
    public static function assertIsValidOrEmpty($value): void
    {
        if (false === self::isValidOrEmpty($value)) {
            throw new \InvalidArgumentException(sprintf('Invalid Access Token, should be not empty string!'));
        }
    }
}
