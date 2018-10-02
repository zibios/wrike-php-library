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

namespace Zibios\WrikePhpLibrary\Transformer\Response\Psr;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

/**
 * Psr Body Transformer for PSR Response from HTTP Client.
 */
class PsrBodyTransformer extends AbstractPsrResponseTransformer
{
    /**
     * @param ResponseInterface $response
     * @param string            $resourceClass
     *
     * @throws \InvalidArgumentException
     *
     * @return StreamInterface
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function transform(ResponseInterface $response, $resourceClass): StreamInterface
    {
        return $this->transformToPsrBody($response);
    }
}
