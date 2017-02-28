<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Transformer\ApiException;

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
use Zibios\WrikePhpLibrary\Transformer\ApiExceptionTransformerInterface;

/**
 * Abstract Api Exception Transformer.
 */
abstract class AbstractApiExceptionTransformer implements ApiExceptionTransformerInterface
{
    /**
     * @var array
     */
    protected $supportedApiExceptions = [
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

    /**
     * @param \Exception $exception
     * @param int        $errorStatusCode
     * @param string     $errorStatusName
     *
     * @return ApiException
     */
    protected function transformByStatusCodeAndName(\Exception $exception, $errorStatusCode, $errorStatusName)
    {
        foreach ($this->supportedApiExceptions as $apiExceptionClass) {
            $statusCode = constant($apiExceptionClass.'::STATUS_CODE');
            $statusName = constant($apiExceptionClass.'::STATUS_NAME');
            if ($errorStatusCode === $statusCode && $errorStatusName === $statusName) {
                return new $apiExceptionClass($exception);
            }
        }

        return new ApiException($exception);
    }
}
