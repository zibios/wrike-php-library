<?php

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
 * Array Body Transformer for PSR Response from HTTP Client.
 */
class ArrayBodyTransformer extends AbstractPsrResponseTransformer
{
    /**
     * @param ResponseInterface $response
     * @param string            $resourceClass
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     *
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     *
     * @return array
     */
    public function transform($response, $resourceClass)
    {
        return $this->transformToArrayBody($response);
    }
}
