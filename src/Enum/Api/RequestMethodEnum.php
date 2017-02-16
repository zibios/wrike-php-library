<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Enum\Api;

use Zibios\WrikePhpLibrary\Enum\AbstractEnum;

/**
 * Request Method Enum.
 */
class RequestMethodEnum extends AbstractEnum
{
    const GET = 'GET';
    const POST = 'POST';
    const PUT = 'PUT';
    const DELETE = 'DELETE';
}
