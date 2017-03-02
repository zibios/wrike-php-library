<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Tests\Transformer\ApiException;

use Zibios\WrikePhpLibrary\Tests\TestCase;
use Zibios\WrikePhpLibrary\Transformer\ApiException\RawExceptionTransformer;

/**
 * Raw Exception Transformer Test.
 */
class RawExceptionTransformerTest extends TestCase
{
    public function test_transform()
    {
        $exception = new \Exception();
        $transformer = new RawExceptionTransformer();
        self::assertSame($exception, $transformer->transform($exception));
    }
}
