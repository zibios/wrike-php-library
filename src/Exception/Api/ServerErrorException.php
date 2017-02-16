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

/**
 * Server Error Exception.
 *
 * Thrown when the Wrike API returns a 500 error code and "server_error" error value.
 * Server side error.
 */
class ServerErrorException extends ApiException
{
    const STATUS_CODE = 500;
    const STATUS_NAME = 'server_error';
}
