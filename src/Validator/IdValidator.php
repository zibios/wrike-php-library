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
        return $value === null;
    }

    /**
     * @param mixed $value
     *
     * @throws \InvalidArgumentException
     */
    public static function assertIsNull($value)
    {
        if (self::isNull($value) === false) {
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
        return is_string($value) && trim($value) !== '';
    }

    /**
     * @param mixed $value
     *
     * @throws \InvalidArgumentException
     */
    public static function assertIsValidIdString($value)
    {
        if (self::isValidIdString($value) === false) {
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
        if (is_array($value) === false || count($value) === 0) {
            return false;
        }

        /** @var array $value */
        foreach ($value as $id) {
            if (self::isValidIdString($id) === false) {
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
        if (self::isValidIdArray($value) === false) {
            throw new \InvalidArgumentException();
        }
    }
}
