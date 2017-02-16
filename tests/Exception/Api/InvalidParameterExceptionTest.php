<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Tests\Exception\Api;

use Zibios\WrikePhpLibrary\Exception\Api\InvalidParameterException;

/**
 * Invalid Parameter Exception Test.
 */
class InvalidParameterExceptionTest extends ApiExceptionTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = InvalidParameterException::class;
}
