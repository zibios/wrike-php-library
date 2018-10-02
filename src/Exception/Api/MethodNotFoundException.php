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

namespace Zibios\WrikePhpLibrary\Exception\Api;

/**
 * Method Not Found Exception.
 *
 * Thrown when the Wrike API returns a 404 error code and "method_not_found" error value.
 * Requested API method does not exist.
 */
class MethodNotFoundException extends ApiException
{
    public const STATUS_CODE = 404;
    public const STATUS_NAME = 'method_not_found';
}
