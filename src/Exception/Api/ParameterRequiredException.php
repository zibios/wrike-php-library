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
 * Parameter Required Exception.
 *
 * Thrown when the Wrike API returns a 400 error code and "parameter_required" error value.
 * Required parameter is absent.
 */
class ParameterRequiredException extends ApiException
{
    const STATUS_CODE = 400;
    const STATUS_NAME = 'parameter_required';
}
