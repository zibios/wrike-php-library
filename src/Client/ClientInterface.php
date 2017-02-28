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
 */
interface ClientInterface
{
    /**
     * Response Format Identifier.
     *
     * Custom name which identify respose format: PsrResponse, JsonBody
     *
     * @see \Zibios\WrikePhpLibrary\Enum\Api\ResponseFormatEnum
     *
     * @return string
     */
    public function getResponseFormat();

    /**
     * Bearer Token setter.
     *
     * @param string $bearerToken
     *
     * @return $this
     */
    public function setBearerToken($bearerToken);

    /**
     * @param string $requestMethod
     * @param string $path
     * @param array  $params
     *
     * @throws \Exception
     * @throws ApiException
     *
     * @return ResponseInterface
     */
    public function executeRequestForParams($requestMethod, $path, array $params);
}
