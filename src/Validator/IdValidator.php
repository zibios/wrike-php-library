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
 * Request Id Validator.
 */
class IdValidator
{
    /**
     * @param mixed $value
     *
     * @return bool
     */
    public static function isNull($value)
    {
        return null === $value;
    }

    /**
     * @param mixed $value
     *
     * @throws \InvalidArgumentException
     */
    public static function assertIsNull($value)
    {
        if (false === self::isNull($value)) {
            throw new \InvalidArgumentException('Null expected!');
        }
    }

    /**
     * @param mixed $value
     *
     * @return bool
     */
    public static function isValidIdString($value)
    {
        return \is_string($value) && '' !== trim($value);
    }

    /**
     * @param mixed $value
     *
     * @throws \InvalidArgumentException
     */
    public static function assertIsValidIdString($value)
    {
        if (false === self::isValidIdString($value)) {
            throw new \InvalidArgumentException(sprintf('Invalid Id, should be not empty string!'));
        }
    }

    /**
     * @param mixed $value
     *
     * @return bool
     */
    public static function isValidIdArray($value)
    {
        if (false === \is_array($value) || 0 === \count($value)) {
            return false;
        }

        /** @var array $value */
        foreach ($value as $id) {
            if (false === self::isValidIdString($id)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param mixed $value
     *
     * @throws \InvalidArgumentException
     */
    public static function assertIsValidIdArray($value)
    {
        if (false === self::isValidIdArray($value)) {
            throw new \InvalidArgumentException('Invalid Id, should be not empty array!');
        }
    }
}
