<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Traits;

use Zibios\WrikePhpLibrary\Client\ClientInterface;
use Zibios\WrikePhpLibrary\Transformer\ResponseTransformerInterface;

/**
 * Assert Is Valid Response Format Trait.
 */
trait AssertIsValidResponseFormatTrait
{
    /**
     * @param ClientInterface              $client
     * @param ResponseTransformerInterface $responseTransformer
     *
     * @internal param string $bearerToken
     *
     * @throws \InvalidArgumentException
     */
    protected function assertIsValidResponseFormatTrait(
        ClientInterface $client,
        ResponseTransformerInterface $responseTransformer
    ) {
        if ($responseTransformer->isSupportedResponseFormat($client->getResponseFormat()) === false) {
            throw new \InvalidArgumentException('Client not compatible with response transformer!');
        }
    }
}
