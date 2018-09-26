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

namespace Zibios\WrikePhpLibrary;

use Zibios\WrikePhpLibrary\Client\ClientInterface;
use Zibios\WrikePhpLibrary\Resource\AbstractResource;
use Zibios\WrikePhpLibrary\Resource\AccountResource;
use Zibios\WrikePhpLibrary\Resource\AttachmentResource;
use Zibios\WrikePhpLibrary\Resource\ColorResource;
use Zibios\WrikePhpLibrary\Resource\CommentResource;
use Zibios\WrikePhpLibrary\Resource\ContactResource;
use Zibios\WrikePhpLibrary\Resource\CustomFieldResource;
use Zibios\WrikePhpLibrary\Resource\DependencyResource;
use Zibios\WrikePhpLibrary\Resource\FolderResource;
use Zibios\WrikePhpLibrary\Resource\GroupResource;
use Zibios\WrikePhpLibrary\Resource\IdResource;
use Zibios\WrikePhpLibrary\Resource\InvitationResource;
use Zibios\WrikePhpLibrary\Resource\TaskResource;
use Zibios\WrikePhpLibrary\Resource\TimelogCategoryResource;
use Zibios\WrikePhpLibrary\Resource\TimelogResource;
use Zibios\WrikePhpLibrary\Resource\UserResource;
use Zibios\WrikePhpLibrary\Resource\VersionResource;
use Zibios\WrikePhpLibrary\Resource\WorkflowResource;
use Zibios\WrikePhpLibrary\Transformer\ApiExceptionTransformerInterface;
use Zibios\WrikePhpLibrary\Transformer\ResponseTransformerInterface;
use Zibios\WrikePhpLibrary\Validator\AccessTokenValidator;

/**
 * Abstract for General Wrike Api.
 *
 * Entry point for all Wrike API operations.
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
abstract class AbstractApi implements ApiInterface
{
    public const BASE_URI = 'https://www.wrike.com/api/v4/';

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var string
     */
    protected $accessToken = '';

    /**
     * @var ResponseTransformerInterface
     */
    protected $responseTransformer;

    /**
     * @var ApiExceptionTransformerInterface
     */
    protected $apiExceptionTransformer;

    /**
     * Api constructor.
     *
     * @param ClientInterface                  $client
     * @param ResponseTransformerInterface     $responseTransformer
     * @param ApiExceptionTransformerInterface $apiExceptionTransformer
     * @param string                           $accessToken
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(
        ClientInterface $client,
        ResponseTransformerInterface $responseTransformer,
        ApiExceptionTransformerInterface $apiExceptionTransformer,
        $accessToken = ''
    ) {
        AccessTokenValidator::assertIsValidOrEmpty($accessToken);

        $this->client = $client;
        $this->responseTransformer = $responseTransformer;
        $this->apiExceptionTransformer = $apiExceptionTransformer;
        $this->accessToken = $accessToken;
    }

    public function contacts(): ContactResource
    {
        /** @var $resource ContactResource */
        $resource = $this->getResource(ContactResource::class);

        return $resource;
    }

    /**
     * @deprecated getContactResource is deprecated and will be removed in 3.0.0. Use contacts().
     */
    public function getContactResource(): ContactResource
    {
        return $this->contacts();
    }

    /**
     * @return UserResource
     */
    public function getUserResource(): UserResource
    {
        return new UserResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->accessToken
        );
    }

    /**
     * @return GroupResource
     */
    public function getGroupResource(): GroupResource
    {
        return new GroupResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->accessToken
        );
    }

    /**
     * @return InvitationResource
     */
    public function getInvitationResource(): InvitationResource
    {
        return new InvitationResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->accessToken
        );
    }

    /**
     * @return AccountResource
     */
    public function getAccountResource(): AccountResource
    {
        return new AccountResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->accessToken
        );
    }

    /**
     * @return WorkflowResource
     */
    public function getWorkflowResource(): WorkflowResource
    {
        return new WorkflowResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->accessToken
        );
    }

    /**
     * @return CustomFieldResource
     */
    public function getCustomFieldResource(): CustomFieldResource
    {
        return new CustomFieldResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->accessToken
        );
    }

    /**
     * @return FolderResource
     */
    public function getFolderResource(): FolderResource
    {
        return new FolderResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->accessToken
        );
    }

    /**
     * @return TaskResource
     */
    public function getTaskResource(): TaskResource
    {
        return new TaskResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->accessToken
        );
    }

    /**
     * @return CommentResource
     */
    public function getCommentResource(): CommentResource
    {
        return new CommentResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->accessToken
        );
    }

    /**
     * @return DependencyResource
     */
    public function getDependencyResource(): DependencyResource
    {
        return new DependencyResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->accessToken
        );
    }

    /**
     * @return TimelogResource
     */
    public function getTimelogResource(): TimelogResource
    {
        return new TimelogResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->accessToken
        );
    }

    /**
     * @return AttachmentResource
     */
    public function getAttachmentResource(): AttachmentResource
    {
        return new AttachmentResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->accessToken
        );
    }

    /**
     * @return VersionResource
     */
    public function getVersionResource(): VersionResource
    {
        return new VersionResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->accessToken
        );
    }

    /**
     * @return IdResource
     */
    public function getIdResource(): IdResource
    {
        return new IdResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->accessToken
        );
    }

    /**
     * @return ColorResource
     */
    public function getColorResource(): ColorResource
    {
        return new ColorResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->accessToken
        );
    }

    /**
     * @param array $params
     *
     * @return array
     */
    public function normalizeParams(array $params): array
    {
        foreach ($params as $key => $value) {
            if (false === \is_string($value) && false === \is_resource($value)) {
                $params[$key] = json_encode($value);
            }
        }

        return $params;
    }

    private function getResource(string $resourceClass): AbstractResource
    {
        return new $resourceClass(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->accessToken
        );
    }
}
