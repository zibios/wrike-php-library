<?php
/**
 * This file is part of the WrikePhpLibrary package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Transformer;

use Zibios\WrikePhpLibrary\Exception\Api\ApiException;

/**
 * Api Exception Transformer Interface
 */
interface ApiExceptionTransformerInterface
{
    /**
     * @param \Exception $exception
     *
     * @return ApiException
     */
    public function transform(\Exception $exception);
}
