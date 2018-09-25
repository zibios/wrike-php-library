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

namespace Zibios\WrikePhpLibrary\Tests\Transformer\ApiException;

use Zibios\WrikePhpLibrary\Exception\Api\ApiException;
use Zibios\WrikePhpLibrary\Transformer\ApiException\AbstractApiExceptionTransformer;

/**
 * Api Exception Transformer Stub.
 */
class ApiExceptionTransformerStub extends AbstractApiExceptionTransformer
{
    /**
     * @param \Throwable $e
     *
     * @return \Throwable
     */
    public function transform(\Throwable $e): \Throwable
    {
        return $e;
    }

    public function transformByStatusCodeAndName(\Throwable $exception, $errorStatusCode, $errorStatusName): ApiException
    {
        return parent::transformByStatusCodeAndName(
            $exception,
            $errorStatusCode,
            $errorStatusName
        );
    }
}
