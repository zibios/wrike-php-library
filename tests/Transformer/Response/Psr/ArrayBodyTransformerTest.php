<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Tests\Transformer\Response\Psr;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Zibios\WrikePhpLibrary\Transformer\Response\Psr\ArrayBodyTransformer;

/**
 * Array Body Transformer Test.
 */
class ArrayBodyTransformerTest extends PsrResponseTransformerTestCase
{
    /**
     * @var ArrayBodyTransformer
     */
    protected $object;

    public function setUp()
    {
        $this->object = new ArrayBodyTransformer();
    }

    public function test_transform()
    {
        $responseArray = ['key' => 'value', 'number' => 100];
        $responseString = json_encode($responseArray);
        $bodyMock = $this->getMockForAbstractClass(StreamInterface::class);
        $bodyMock->expects($this->any())
            ->method('getContents')
            ->willReturn($responseString);
        $responseMock = $this->getMockForAbstractClass(ResponseInterface::class);
        $responseMock->expects($this->any())
            ->method('getBody')
            ->willReturn($bodyMock);

        $returnedResponse = $this->object->transform($responseMock, 'unimportant');

        $this->assertSame($responseArray, $returnedResponse);
    }
}
