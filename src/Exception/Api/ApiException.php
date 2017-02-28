<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Exception\Api;

use Exception;

/**
 * General Wrike Api Exception.
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
}
