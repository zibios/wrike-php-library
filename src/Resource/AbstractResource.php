<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Resource;

use Zibios\WrikePhpLibrary\Client\ClientInterface;
use Zibios\WrikePhpLibrary\Enum\Api\RequestMethodEnum;
use Zibios\WrikePhpLibrary\Enum\Api\ResourceMethodEnum;
use Zibios\WrikePhpLibrary\Resource\Helpers\RequestPathProcessor;
use Zibios\WrikePhpLibrary\Transformer\ApiExceptionTransformerInterface;
use Zibios\WrikePhpLibrary\Transformer\ResponseTransformerInterface;
use Zibios\WrikePhpLibrary\Validator\AccessTokenValidator;

/**
 * Resource Abstract.
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
abstract class AbstractResource implements ResourceInterface
{
    /**
     * Concrete HTTP client.
     *
     * @var ClientInterface
     */
    protected $client;

    /**
     * Access Token.
     *
     * Access Token must be added to request Headers.
     * 'Authorization: Bearer Access-Token'
     *
     * @var string
     */
    protected $accessToken = '';

    /**
     * Response Transformer.
     *
     * Transform PSR Response or JSON string from HTTP Client to another format: Array, Object, ...
     *
     * @var ResponseTransformerInterface
     */
    protected $responseTransformer;

    /**
     * Api Exception transformer.
     *
     * Transform Exceptions throw by HTTP Client to another Exceptions.
     *
     * @see \Zibios\WrikePhpLibrary\Exception\Api\ApiException
     *
     * @var ApiExceptionTransformerInterface
     */
    protected $apiExceptionTransformer;

    /**
     * Helper for request path calculations.
     *
     * @var RequestPathProcessor
     */
    protected $requestPathProcessor;

    /**
     * Resource constructor.
     *
     * @param ClientInterface                  $client
     * @param ResponseTransformerInterface     $responseTransformer
     * @param ApiExceptionTransformerInterface $apiExceptionTransformer
     * @param string                           $accessToken
     */
    public function __construct(
        ClientInterface $client,
        ResponseTransformerInterface $responseTransformer,
        ApiExceptionTransformerInterface $apiExceptionTransformer,
        $accessToken
    ) {
        AccessTokenValidator::isValidOrEmpty($accessToken);

        $this->client = $client;
        $this->responseTransformer = $responseTransformer;
        $this->apiExceptionTransformer = $apiExceptionTransformer;
        $this->accessToken = $accessToken;

        $this->requestPathProcessor = new RequestPathProcessor();
    }

    /**
     * Return connection array ResourceMethod => RequestPathFormat.
     *
     * @see \Zibios\WrikePhpLibrary\Enum\Api\ResourceMethodEnum
     * @see \Zibios\WrikePhpLibrary\Enum\Api\RequestPathFormatEnum
     *
     * @return array
     */
    abstract protected function getResourceMethodConfiguration();

    /**
     * @param string            $requestMethod
     * @param string            $resourceMethod
     * @param array             $params
     * @param string|array|null $id
     *
     * @throws \Zibios\WrikePhpLibrary\Exception\Api\ApiException
     * @throws \LogicException
     * @throws \InvalidArgumentException
     * @throws \Exception
     *
     * @return mixed
     */
    protected function executeRequest($requestMethod, $resourceMethod, array $params, $id)
    {
        RequestMethodEnum::assertIsValidValue($requestMethod);
        ResourceMethodEnum::assertIsValidValue($resourceMethod);
        AccessTokenValidator::isValid($this->accessToken);

        $requestPathForResourceMethod = $this->requestPathProcessor
            ->prepareRequestPathForResourceMethod(
                $resourceMethod,
                $id,
                $this->getResourceMethodConfiguration()
            );

        try {
            $response = $this->client->executeRequestForParams(
                $requestMethod,
                $requestPathForResourceMethod,
                $params,
                $this->accessToken
            );
        } catch (\Exception $e) {
            throw $this->apiExceptionTransformer->transform($e);
        }

        if (ResourceMethodEnum::DOWNLOAD === $resourceMethod ||
            ResourceMethodEnum::DOWNLOAD_PREVIEW === $resourceMethod) {
            return $response;
        }

        return $this->responseTransformer->transform($response, static::class);
    }
}
