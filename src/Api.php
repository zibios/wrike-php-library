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
use Zibios\WrikePhpLibrary\Validator\AccessTokenValidator;

/**
 * General Wrike Api.
 *
 * Entry point for all Wrike API operations. Immutable.
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class Api extends AbstractApi implements ImmutableApiInterface
{
    /**
     * @param string $accessToken
     *
     * @throws \InvalidArgumentException
     *
     * @return $this
     */
    public function recreateForNewAccessToken($accessToken)
    {
        AccessTokenValidator::assertIsValid($accessToken);

        return new self($this->client, $this->responseTransformer, $this->apiExceptionTransformer, $accessToken);
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
        return new self($this->client, $this->responseTransformer, $apiExceptionTransformer, $this->accessToken);
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
        return new self($this->client, $responseTransformer, $this->apiExceptionTransformer, $this->accessToken);
    }
}
