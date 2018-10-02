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

namespace Zibios\WrikePhpLibrary\Enum\Api;

use Zibios\WrikePhpLibrary\Enum\AbstractEnum;

/**
 * Request Method Enum.
 */
class RequestMethodEnum extends AbstractEnum
{
    public const GET = 'GET';
    public const POST = 'POST';
    public const PUT = 'PUT';
    public const DELETE = 'DELETE';
    public const UPLOAD = 'UPLOAD';
}
