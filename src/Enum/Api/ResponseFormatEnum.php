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
 * Response Format Enum.
 */
class ResponseFormatEnum extends AbstractEnum
{
    /**
     *  Response is in ResponseInterface format.
     *
     * @see \Psr\Http\Message\ResponseInterface
     */
    const PSR_RESPONSE = 'PsrResponse';

    /**
     *  Response is in JSON (string) format.
     */
    const JSON_BODY = 'JsonBody';
}
