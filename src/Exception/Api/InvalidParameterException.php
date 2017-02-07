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
 * Invalid Parameter Exception
 *
 * Thrown when the Wrike API returns a 400 error code and "invalid_parameter" error value.
 * Request parameter name or value is invalid.
 */
class InvalidParameterException extends ApiException
{
    const STATUS_CODE = 400;
    const STATUS_NAME = 'invalid_parameter';
}
