<?php

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
     * Response Format Identifier.
     *
     * Custom name which identify response format: PsrResponse, JsonBody, ...
     *
     * @see \Zibios\WrikePhpLibrary\Enum\Api\ResponseFormatEnum
     *
     * @return string
     */
    public function getResponseFormat();

    /**
     * Request method.
     *
     * Generic format for HTTP client request method.
     *
     * @param string $requestMethod GT/POST/PUT/DELETE
     * @param string $path          full path to REST resource without domain, ex. 'accounts/XXXXXXXX/contacts'
     * @param array  $params        optional params for GET/POST request
     * @param string $accessToken   Access Token for Wrike access
     *
     * @see \Zibios\WrikePhpLibrary\Enum\Api\RequestMethodEnum
     * @see \Zibios\WrikePhpLibrary\Enum\Api\RequestPathFormatEnum
     *
     * @throws \Exception
     * @throws ApiException
     *
     * @return string|ResponseInterface
     */
    public function executeRequestForParams($requestMethod, $path, array $params, $accessToken);
}
