<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Transformer;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

/**
 * Abstract Response Transformer.
 */
abstract class AbstractResponseTransformer implements ResponseTransformerInterface
{
    /**
     * @param ResponseInterface $response
     *
     * @return ResponseInterface
     */
    protected function transformToRawResponse(ResponseInterface $response)
    {
        return $response;
    }

    /**
     * @param ResponseInterface $response
     *
     * @return StreamInterface
     */
    protected function transformToRawBody(ResponseInterface $response)
    {
        return $this->transformToRawResponse($response)->getBody();
    }

    /**
     * @param ResponseInterface $response
     *
     * @throws \RuntimeException
     *
     * @return string
     */
    protected function transformToStringBody(ResponseInterface $response)
    {
        return $this->transformToRawBody($response)->getContents();
    }

    /**
     * @param ResponseInterface $response
     *
     * @throws \RuntimeException
     *
     * @return array
     */
    protected function transformToArrayBody(ResponseInterface $response)
    {
        return json_decode($this->transformToStringBody($response), true);
    }
}
