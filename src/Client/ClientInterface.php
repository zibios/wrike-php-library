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

namespace Zibios\WrikePhpLibrary\Client;

use Psr\Http\Message\ResponseInterface;
use Zibios\WrikePhpLibrary\Exception\Api\ApiException;

/**
 * Client Interface.
 *
 * Concrete Client should return response as JSON string or \Psr\Http\Message\ResponseInterface for unification.
 */
interface ClientInterface
{
    /**
     * Request method.
     *
     * Generic format for HTTP client request method.
     *
     * @param string $requestMethod GET/POST/PUT/DELETE
     * @param string $path          full path to REST resource without domain, ex. 'accounts/XXXXXXXX/contacts'
     * @param array  $params        optional params for GET/POST request
     * @param string $accessToken   Access Token for Wrike access
     *
     * @see \Zibios\WrikePhpLibrary\Enum\Api\RequestMethodEnum
     * @see \Zibios\WrikePhpLibrary\Enum\Api\RequestPathFormatEnum
     *
     * @throws \Throwable
     * @throws ApiException
     *
     * @return ResponseInterface
     */
    public function executeRequestForParams(string $requestMethod, string $path, array $params, string $accessToken): ResponseInterface;
}
