<?php
/**
 * This file is part of the WrikePhpLibrary package.
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
 * Client Interface
 */
interface ClientInterface
{
    /**
     * @return string
     */
    public function getBearerToken();

    /**
     * @param string $bearerToken
     *
     * @return $this
     */
    public function setBearerToken($bearerToken);

    /**
     * @param string $requestMethod
     * @param string $path
     * @param array $params
     *
     * @return ResponseInterface
     * @throws \Exception
     * @throws ApiException
     */
    public function executeRequestForParams($requestMethod, $path, array $params);

    /**
     * @param \Exception $exception
     *
     * @return \Exception|ApiException
     */
    public function transformApiException(\Exception $exception);
}
