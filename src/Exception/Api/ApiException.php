<?php
/**
 * This file is part of the WrikePhpLibrary package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Exception\Api;

use Exception;

/**
 * General Wrike Api Exception
 *
 * Thrown when the Client returns an HTTP error that isn't handled by other dedicated exceptions.
 */
class ApiException extends Exception
{
    const STATUS_CODE = null;
    const STATUS_NAME = null;

    /**
     * ApiException constructor.
     *
     * @param Exception $e
     */
    public function __construct(\Exception $e)
    {
        parent::__construct($e->getMessage(), $e->getCode(), $e);
    }

    /**
     * @return string
     * @throws \UnderflowException
     */
    public static function getExceptionIdentifier()
    {
        return static::calculateExceptionIdentifier(static::STATUS_CODE, static::STATUS_NAME);
    }

    /**
     * @param int $errorStatusCode
     * @param string $errorStatusName
     *
     * @return string
     */
    public static function calculateExceptionIdentifier($errorStatusCode, $errorStatusName)
    {
        return sprintf('%s%s', $errorStatusCode, $errorStatusName);
    }
}
