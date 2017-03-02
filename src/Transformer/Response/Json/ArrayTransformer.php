<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Transformer\Response\Json;

use Zibios\WrikePhpLibrary\Enum\Api\ResponseFormatEnum;
use Zibios\WrikePhpLibrary\Transformer\ResponseTransformerInterface;

/**
 * Array Transformer for JSON string response from HTTP Client.
 */
class ArrayTransformer implements ResponseTransformerInterface
{
    /**
     * @param string $responseFormat
     *
     * @return bool
     */
    public function isSupportedResponseFormat($responseFormat)
    {
        return $responseFormat === ResponseFormatEnum::JSON_BODY;
    }

    /**
     * @param mixed  $response
     * @param string $resourceClass
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     *
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     *
     * @return array
     */
    public function transform($response, $resourceClass)
    {
        return json_decode($response, true);
    }
}
