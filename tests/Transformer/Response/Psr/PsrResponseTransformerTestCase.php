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
use Zibios\WrikePhpLibrary\Enum\Api\ResponseFormatEnum;
use Zibios\WrikePhpLibrary\Tests\TestCase;
use Zibios\WrikePhpLibrary\Transformer\ResponseTransformerInterface;

/**
 * Abstract Response Transformer Test Case.
 */
abstract class PsrResponseTransformerTestCase extends TestCase
{
    /**
     * @var ResponseTransformerInterface
     */
    protected $object;

    /**
     * @return array
     */
    public function transformParamsProvider()
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

        $stdClass = new \stdClass();

        return [
            // [response, resourceClass, isValid]
            [$responseMock, 'unimportant', true],
            [$stdClass, 'unimportant', false],
            ['', 'unimportant', false],
        ];
    }

    /**
     * @param mixed $response
     * @param mixed $resourceClass
     * @param bool  $isValid
     *
     * @dataProvider transformParamsProvider
     */
    public function test_transformParams($response, $resourceClass, $isValid)
    {
        $exceptionOccurred = false;
        try {
            $this->object->transform($response, $resourceClass);
        } catch (\Throwable $t) {
            $exceptionOccurred = true;
        } catch (\Exception $e) {
            $exceptionOccurred = true;
        }

        if ($isValid === false) {
            self::assertTrue($exceptionOccurred);
        }
        if ($isValid === true) {
            self::assertFalse($exceptionOccurred);
        }
    }

    public function test_supportedFormat()
    {
        self::assertTrue($this->object->isSupportedResponseFormat(ResponseFormatEnum::PSR_RESPONSE));
        self::assertFalse($this->object->isSupportedResponseFormat(ResponseFormatEnum::JSON_BODY));
    }
}
