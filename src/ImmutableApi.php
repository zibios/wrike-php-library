<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary;

use Zibios\WrikePhpLibrary\Transformer\ApiExceptionTransformerInterface;
use Zibios\WrikePhpLibrary\Transformer\ResponseTransformerInterface;

/**
 * General Wrike Api.
 *
 * Entry point for all Wrike API operations.
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class ImmutableApi extends AbstractApi implements ImmutableApiInterface
{
    /**
     * @param string $bearerToken
     *
     * @throws \InvalidArgumentException
     *
     * @return $this
     */
    public function recreateForNewBearerToken($bearerToken)
    {
        return new self($this->client, $this->responseTransformer, $this->apiExceptionTransformer, $bearerToken);
    }

    /**
     * @param ApiExceptionTransformerInterface $apiExceptionTransformer
     *
     * @throws \InvalidArgumentException
     *
     * @return $this
     */
    public function recreateForNewApiExceptionTransformer(ApiExceptionTransformerInterface $apiExceptionTransformer)
    {
        return new self($this->client, $this->responseTransformer, $apiExceptionTransformer, $this->bearerToken);
    }

    /**
     * @param ResponseTransformerInterface $responseTransformer
     *
     * @throws \InvalidArgumentException
     *
     * @return $this
     */
    public function recreateForNewResponseTransformer(ResponseTransformerInterface $responseTransformer)
    {
        return new self($this->client, $responseTransformer, $this->apiExceptionTransformer, $this->bearerToken);
    }
}
