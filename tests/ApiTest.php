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

use Zibios\WrikePhpLibrary\Api;
use Zibios\WrikePhpLibrary\Transformer\ApiException\RawExceptionTransformer;
use Zibios\WrikePhpLibrary\Transformer\Response\RawResponseTransformer;

/**
 * Api Test.
 */
class ApiTest extends ApiTestCase
{
    /**
     * @var Api
     */
    protected $object;

    /**
     * @var string
     */
    protected $sourceClass = Api::class;

    public function test_immutableMethods()
    {
        $response = $this->object->recreateForNewAccessToken('test');
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
