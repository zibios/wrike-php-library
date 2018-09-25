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

/**
 * String Body Transformer for PSR Response from HTTP Client.
 */
class StringBodyTransformer extends AbstractPsrResponseTransformer
{
    /**
     * @param ResponseInterface $response
     * @param string            $resourceClass
     *
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     *
     * @return string
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function transform(ResponseInterface $response, $resourceClass): string
    {
        return $this->transformToStringBody($response);
    }
}
