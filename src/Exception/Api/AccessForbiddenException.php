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

/**
 * Access Forbidden Exception
 *
 * Thrown when the Wrike API returns a 403 error code and "access_forbidden" error value.
 * Access to requested entity is denied for user.
 */
class AccessForbiddenException extends ApiException
{
    const STATUS_CODE = 403;
    const STATUS_NAME = 'access_forbidden';
}
