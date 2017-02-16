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
 * Not Authorized Exception.
 *
 * Thrown when the Wrike API returns a 401 error code and "not_authorized" error value.
 * User is not authorized (authorization is invalid, malformed or expired).
 */
class NotAuthorizedException extends ApiException
{
    const STATUS_CODE = 401;
    const STATUS_NAME = 'not_authorized';
}
