<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Transformer\Response\Psr;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Zibios\WrikePhpLibrary\Enum\Api\ResponseFormatEnum;
use Zibios\WrikePhpLibrary\Transformer\ResponseTransformerInterface;

/**
 * Abstract Response Transformer for PSR Response from HTTP Client.
 */
abstract class AbstractPsrResponseTransformer implements ResponseTransformerInterface
{
    /**
     * @param string $responseFormat
     *
     * @return bool
     */
    public function isSupportedResponseFormat($responseFormat)
    {
        return ResponseFormatEnum::PSR_RESPONSE === $responseFormat;
    }

    /**
     * @param ResponseInterface $response
     *
     * @return ResponseInterface
     */
    protected function transformToPsrResponse(ResponseInterface $response)
    {
        return $response;
    }

    /**
     * @param ResponseInterface $response
     *
     * @return StreamInterface
     */
    protected function transformToPsrBody(ResponseInterface $response)
    {
        return $this->transformToPsrResponse($response)->getBody();
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
        return $this->transformToPsrBody($response)->getContents();
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
