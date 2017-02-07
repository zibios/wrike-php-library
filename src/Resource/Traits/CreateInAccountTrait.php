<?php
/**
 * This file is part of the WrikePhpLibrary package.
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
 * CreateInAccount Trait
 */
trait CreateInAccountTrait
{
    /**
     * @param string $id
     * @param array|null $params
     *
     * @return mixed
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
     */
    public function createInAccount($id, array $params = [])
    {
        return $this->executeRequest(
            RequestMethodEnum::POST,
            ResourceMethodEnum::CREATE_IN_ACCOUNT,
            $params,
            $id
        );
    }

    /**
     * @param string $requestMethod
     * @param string $requestScope
     * @param array $params
     * @param string|array $id
     *
     * @return mixed
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
     */
    abstract protected function executeRequest(
        $requestMethod,
        $requestScope,
        array $params,
        $id
    );
}
