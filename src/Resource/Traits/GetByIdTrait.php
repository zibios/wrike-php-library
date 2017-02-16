<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Resource\Traits;

use Zibios\WrikePhpLibrary\Enum\Api\RequestMethodEnum;
use Zibios\WrikePhpLibrary\Enum\Api\ResourceMethodEnum;

/**
 * GetById Trait.
 */
trait GetByIdTrait
{
    /**
     * @param string     $id
     * @param array|null $params
     *
     * @throws \Zibios\WrikePhpLibrary\Exception\Api\ServerErrorException
     * @throws \Zibios\WrikePhpLibrary\Exception\Api\ResourceNotFoundException
     * @throws \Zibios\WrikePhpLibrary\Exception\Api\ParameterRequiredException
     * @throws \Zibios\WrikePhpLibrary\Exception\Api\NotAuthorizedException
     * @throws \Zibios\WrikePhpLibrary\Exception\Api\NotAllowedException
     * @throws \Zibios\WrikePhpLibrary\Exception\Api\InvalidRequestException
     * @throws \Zibios\WrikePhpLibrary\Exception\Api\InvalidParameterException
     * @throws \Zibios\WrikePhpLibrary\Exception\Api\ApiException
     * @throws \Zibios\WrikePhpLibrary\Exception\Api\AccessForbiddenException
     * @throws \LogicException
     * @throws \InvalidArgumentException
     * @throws \Exception
     *
     * @return mixed
     */
    public function getById($id, array $params = [])
    {
        return $this->executeRequest(
            RequestMethodEnum::GET,
            ResourceMethodEnum::GET_BY_ID,
            $params,
            $id
        );
    }

    /**
     * @param string       $requestMethod
     * @param string       $requestScope
     * @param array        $params
     * @param string|array $id
     *
     * @throws \Zibios\WrikePhpLibrary\Exception\Api\ServerErrorException
     * @throws \Zibios\WrikePhpLibrary\Exception\Api\ResourceNotFoundException
     * @throws \Zibios\WrikePhpLibrary\Exception\Api\ParameterRequiredException
     * @throws \Zibios\WrikePhpLibrary\Exception\Api\NotAuthorizedException
     * @throws \Zibios\WrikePhpLibrary\Exception\Api\NotAllowedException
     * @throws \Zibios\WrikePhpLibrary\Exception\Api\InvalidRequestException
     * @throws \Zibios\WrikePhpLibrary\Exception\Api\InvalidParameterException
     * @throws \Zibios\WrikePhpLibrary\Exception\Api\ApiException
     * @throws \Zibios\WrikePhpLibrary\Exception\Api\AccessForbiddenException
     * @throws \LogicException
     * @throws \InvalidArgumentException
     * @throws \Exception
     *
     * @return mixed
     */
    abstract protected function executeRequest(
        $requestMethod,
        $requestScope,
        array $params,
        $id
    );
}
