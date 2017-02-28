<?php

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
use Zibios\WrikePhpLibrary\Resource\TimelogResource;
use Zibios\WrikePhpLibrary\Resource\UserResource;
use Zibios\WrikePhpLibrary\Resource\VersionResource;
use Zibios\WrikePhpLibrary\Resource\WorkflowResource;
use Zibios\WrikePhpLibrary\Traits\AssertIsValidBearerToken;
use Zibios\WrikePhpLibrary\Traits\AssertIsValidResponseFormatTrait;
use Zibios\WrikePhpLibrary\Transformer\ApiExceptionTransformerInterface;
use Zibios\WrikePhpLibrary\Transformer\ResponseTransformerInterface;

/**
 * General Wrike Api.
 *
 * Abstract entry point for all Wrike API operations.
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
abstract class AbstractApi implements ApiInterface
{
    use AssertIsValidBearerToken;
    use AssertIsValidResponseFormatTrait;

    const BASE_URI = 'https://www.wrike.com/api/v3/';

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var string
     */
    protected $bearerToken = '';

    /**
     * @var ResponseTransformerInterface
     */
    protected $responseTransformer;

    /**
     * @var ApiExceptionTransformerInterface
     */
    protected $apiExceptionTransformer;

    /**
     * @param ClientInterface                  $client
     * @param ResponseTransformerInterface     $responseTransformer
     * @param ApiExceptionTransformerInterface $apiExceptionTransformer
     * @param string                           $bearerToken
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(
        ClientInterface $client,
        ResponseTransformerInterface $responseTransformer,
        ApiExceptionTransformerInterface $apiExceptionTransformer,
        $bearerToken
    ) {
        $this->assertIsValidBearerToken($bearerToken);
        $this->assertIsValidResponseFormatTrait($client, $responseTransformer);

        $this->client = $client;
        $this->responseTransformer = $responseTransformer;
        $this->apiExceptionTransformer = $apiExceptionTransformer;
        $this->bearerToken = $bearerToken;
    }

    /**
     * @return ContactResource
     */
    public function getContactResource()
    {
        return new ContactResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->bearerToken
        );
    }

    /**
     * @return UserResource
     */
    public function getUserResource()
    {
        return new UserResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->bearerToken
        );
    }

    /**
     * @return GroupResource
     */
    public function getGroupResource()
    {
        return new GroupResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->bearerToken
        );
    }

    /**
     * @return InvitationResource
     */
    public function getInvitationResource()
    {
        return new InvitationResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->bearerToken
        );
    }

    /**
     * @return AccountResource
     */
    public function getAccountResource()
    {
        return new AccountResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->bearerToken
        );
    }

    /**
     * @return WorkflowResource
     */
    public function getWorkflowResource()
    {
        return new WorkflowResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->bearerToken
        );
    }

    /**
     * @return CustomFieldResource
     */
    public function getCustomFieldResource()
    {
        return new CustomFieldResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->bearerToken
        );
    }

    /**
     * @return FolderResource
     */
    public function getFolderResource()
    {
        return new FolderResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->bearerToken
        );
    }

    /**
     * @return TaskResource
     */
    public function getTaskResource()
    {
        return new TaskResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->bearerToken
        );
    }

    /**
     * @return CommentResource
     */
    public function getCommentResource()
    {
        return new CommentResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->bearerToken
        );
    }

    /**
     * @return DependencyResource
     */
    public function getDependencyResource()
    {
        return new DependencyResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->bearerToken
        );
    }

    /**
     * @return TimelogResource
     */
    public function getTimelogResource()
    {
        return new TimelogResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->bearerToken
        );
    }

    /**
     * @return AttachmentResource
     */
    public function getAttachmentResource()
    {
        return new AttachmentResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->bearerToken
        );
    }

    /**
     * @return VersionResource
     */
    public function getVersionResource()
    {
        return new VersionResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->bearerToken
        );
    }

    /**
     * @return IdResource
     */
    public function getIdResource()
    {
        return new IdResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->bearerToken
        );
    }

    /**
     * @return ColorResource
     */
    public function getColorResource()
    {
        return new ColorResource(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->bearerToken
        );
    }
}
