<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Tests\Transformer\Response\Json;

use Zibios\WrikePhpLibrary\Enum\Api\ResponseFormatEnum;
use Zibios\WrikePhpLibrary\Tests\TestCase;
use Zibios\WrikePhpLibrary\Transformer\Response\Json\ArrayTransformer;

/**
 * Array Transformer Test.
 */
class ArrayTransformerTest extends TestCase
{
    /**
     * @var ArrayTransformer
     */
    protected $object;

    public function setUp()
    {
        $this->object = new ArrayTransformer();
    }

    public function test_transform()
    {
        $responseArray = ['key' => 'value', 'number' => 100];
        $responseString = json_encode($responseArray);

        $returnedResponse = $this->object->transform($responseString, 'unimportant');

        $this->assertSame($responseArray, $returnedResponse);
    }

    public function test_supportedFormat()
    {
        self::assertTrue($this->object->isSupportedResponseFormat(ResponseFormatEnum::JSON_BODY));
        self::assertFalse($this->object->isSupportedResponseFormat(ResponseFormatEnum::PSR_RESPONSE));
    }
}
