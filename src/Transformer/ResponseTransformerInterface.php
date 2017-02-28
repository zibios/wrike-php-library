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

/**
 * Response Transformer Interface.
 */
interface ResponseTransformerInterface
{
    /**
     * @param string $responseFormat
     *
     * @return bool
     */
    public function isSupportedResponseFormat($responseFormat);

    /**
     * @param mixed  $response
     * @param string $resourceClass
     *
     * @return mixed
     */
    public function transform($response, $resourceClass);
}
