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
 * General Wrike Api Interface.
 */
interface MutableApiInterface extends ApiInterface
{
    /**
     * @param string $bearerToken
     *
     * @throws \InvalidArgumentException
     *
     * @return $this
     */
    public function setBearerToken($bearerToken);

    /**
     * @param ApiExceptionTransformerInterface $apiExceptionTransformer
     *
     * @return $this
     */
    public function setApiExceptionTransformer(ApiExceptionTransformerInterface $apiExceptionTransformer);

    /**
     * @param ResponseTransformerInterface $responseTransformer
     *
     * @return $this
     */
    public function setResponseTransformer(ResponseTransformerInterface $responseTransformer);
}
