<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Tests\Transformer\Exception\Api;

use Zibios\WrikePhpLibrary\Transformer\AbstractApiExceptionTransformer;

/**
 * Api Exception Transformer Stub.
 */
class ApiExceptionTransformerStub extends AbstractApiExceptionTransformer
{
    /**
     * @param \Exception $e
     *
     * @return \Exception
     */
    public function transform(\Exception $e)
    {
        return $e;
    }

    public function transformByStatusCodeAndName(\Exception $exception, $errorStatusCode, $errorStatusName)
    {
        return parent::transformByStatusCodeAndName(
            $exception,
            $errorStatusCode,
            $errorStatusName
        );
    }
}
