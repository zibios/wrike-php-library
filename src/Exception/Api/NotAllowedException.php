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
 * Not Allowed Exception.
 *
 * Thrown when the Wrike API returns a 403 error code and "not_allowed" error value.
 * Requested action is not allowed due to license/quota limitations, e.t.c. .
 */
class NotAllowedException extends ApiException
{
    const STATUS_CODE = 403;
    const STATUS_NAME = 'not_allowed';
}
