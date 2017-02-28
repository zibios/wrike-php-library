<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Transformer\ApiException;

use Zibios\WrikePhpLibrary\Transformer\ApiExceptionTransformerInterface;

/**
 * Raw Exception Transformer.
 */
class RawExceptionTransformer implements ApiExceptionTransformerInterface
{
    /**
     * @param \Exception $exception
     *
     * @return \Exception
     */
    public function transform(\Exception $exception)
    {
        return $exception;
    }
}
