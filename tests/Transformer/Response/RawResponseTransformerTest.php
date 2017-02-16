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
use Zibios\WrikePhpLibrary\Tests\Transformer\ResponseTransformerTestCase;
use Zibios\WrikePhpLibrary\Transformer\Response\RawResponseTransformer;

/**
 * Raw Response Transformer Test.
 */
class RawResponseTransformerTest extends ResponseTransformerTestCase
{
    public function setUp()
    {
        $this->object = new RawResponseTransformer();
    }

    public function test_transform()
    {
        $responseMock = $this->getMockForAbstractClass(ResponseInterface::class);
        $returnedResponse = $this->object->transform($responseMock, 'unimportant');

        $this->assertSame($responseMock, $returnedResponse);
    }
}
