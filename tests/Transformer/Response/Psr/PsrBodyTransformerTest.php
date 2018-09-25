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

namespace Zibios\WrikePhpLibrary\Tests\Transformer\Response\Psr;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Zibios\WrikePhpLibrary\Transformer\Response\Psr\PsrBodyTransformer;

/**
 * Psr Body Transformer Test.
 */
class PsrBodyTransformerTest extends PsrResponseTransformerTestCase
{
    /**
     * @var PsrBodyTransformer
     */
    protected $object;

    public function setUp(): void
    {
        $this->object = new PsrBodyTransformer();
    }

    public function test_transform(): void
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
