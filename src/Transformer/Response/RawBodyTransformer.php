<?php
/**
 * This file is part of the WrikePhpLibrary package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Transformer\Response;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Zibios\WrikePhpLibrary\Transformer\AbstractResponseTransformer;

/**
 * Raw Body Transformer
 */
class RawBodyTransformer extends AbstractResponseTransformer
{
    /**
     * @param ResponseInterface $response
     * @param string $resourceClass
     *
     * @return StreamInterface
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function transform(ResponseInterface $response, $resourceClass)
    {
        return $this->transformToRawBody($response);
    }
}
