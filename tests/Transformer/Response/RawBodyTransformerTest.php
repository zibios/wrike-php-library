<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Tests\Transformer\Response;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Zibios\WrikePhpLibrary\Tests\Transformer\ResponseTransformerTestCase;
use Zibios\WrikePhpLibrary\Transformer\Response\RawBodyTransformer;

/**
 * Raw Body Transformer Test.
 */
class RawBodyTransformerTest extends ResponseTransformerTestCase
{
    public function setUp()
    {
        $this->object = new RawBodyTransformer();
    }

    public function test_transform()
    {
        $bodyMock = $this->getMockForAbstractClass(StreamInterface::class);
        $responseMock = $this->getMockForAbstractClass(ResponseInterface::class);
        $responseMock->expects($this->any())
            ->method('getBody')
            ->willReturn($bodyMock);
        $returnedResponse = $this->object->transform($responseMock, 'unimportant');

        $this->assertSame($bodyMock, $returnedResponse);
    }
}
