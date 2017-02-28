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

/**
 * Assert is valid BearerToken Trait.
 */
trait AssertIsValidBearerToken
{
    /**
     * @param string $bearerToken
     *
     * @throws \InvalidArgumentException
     */
    protected function assertIsValidBearerToken($bearerToken)
    {
        if (is_string($bearerToken) === false) {
            throw new \InvalidArgumentException('Bearer Token should be a string!');
        }
    }
}
