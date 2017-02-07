<?php
/**
 * This file is part of the WrikePhpLibrary package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Transformer;

use Zibios\WrikePhpLibrary\Exception\Api\AccessForbiddenException;
use Zibios\WrikePhpLibrary\Exception\Api\ApiException;
use Zibios\WrikePhpLibrary\Exception\Api\InvalidParameterException;
use Zibios\WrikePhpLibrary\Exception\Api\InvalidRequestException;
use Zibios\WrikePhpLibrary\Exception\Api\MethodNotFoundException;
use Zibios\WrikePhpLibrary\Exception\Api\NotAllowedException;
use Zibios\WrikePhpLibrary\Exception\Api\NotAuthorizedException;
use Zibios\WrikePhpLibrary\Exception\Api\ParameterRequiredException;
use Zibios\WrikePhpLibrary\Exception\Api\ResourceNotFoundException;
use Zibios\WrikePhpLibrary\Exception\Api\ServerErrorException;

/**
 * Abstract Api Exception Transformer
 */
abstract class AbstractApiExceptionTransformer implements ApiExceptionTransformerInterface
{
    /**
     * @param \Exception $exception
     * @param int $errorStatusCode
     * @param string $errorStatusName
     *
     * @return ApiException
     */
    protected function transformByStatusCodeAndName(\Exception $exception, $errorStatusCode, $errorStatusName)
    {
        $supportedApiExceptions = [
            AccessForbiddenException::class,
            InvalidParameterException::class,
            InvalidRequestException::class,
            MethodNotFoundException::class,
            NotAllowedException::class,
            NotAuthorizedException::class,
            ParameterRequiredException::class,
            ResourceNotFoundException::class,
            ServerErrorException::class,
        ];

        $incomingIdentifier = ApiException::calculateExceptionIdentifier($errorStatusCode, $errorStatusName);
        foreach ($supportedApiExceptions as $apiExceptionClass) {
            $supportedIdentifier = call_user_func([$apiExceptionClass, 'getExceptionIdentifier']);
            if ($incomingIdentifier === $supportedIdentifier) {
                return new $apiExceptionClass($exception);
            }
        }

        return new ApiException($exception);
    }
}
