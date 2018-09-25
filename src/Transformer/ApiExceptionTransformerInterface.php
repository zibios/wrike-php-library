<?php

declare(strict_types=1);

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Transformer;

use Zibios\WrikePhpLibrary\Exception\Api\ApiException;

/**
 * Api Exception Transformer Interface.
 */
interface ApiExceptionTransformerInterface
{
    /**
     * @param \Throwable $exception
     *
     * @return ApiException|\Throwable
     */
    public function transform(\Throwable $exception): \Throwable;
}
