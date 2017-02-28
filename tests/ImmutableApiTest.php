<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Tests;

use Zibios\WrikePhpLibrary\ImmutableApi;
use Zibios\WrikePhpLibrary\Transformer\ApiException\RawExceptionTransformer;
use Zibios\WrikePhpLibrary\Transformer\Response\RawResponseTransformer;

/**
 * Immutable Api Test.
 */
class ImmutableApiTest extends ApiTestCase
{
    /**
     * @var ImmutableApi
     */
    protected $object;

    /**
     * @var string
     */
    protected $sourceClass = ImmutableApi::class;

    public function test_immutableMethods()
    {
        $response = $this->object->recreateForNewBearerToken('test');
        self::assertNotSame($this->object, $response);
        self::assertInstanceOf($this->sourceClass, $response);

        $response = $this->object->recreateForNewResponseTransformer(new RawResponseTransformer());
        self::assertNotSame($this->object, $response);
        self::assertInstanceOf($this->sourceClass, $response);

        $response = $this->object->recreateForNewApiExceptionTransformer(new RawExceptionTransformer());
        self::assertNotSame($this->object, $response);
        self::assertInstanceOf($this->sourceClass, $response);
    }
}
