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
    const BASE_URI = 'https://www.wrike.com/api/v3/';

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

        if (false === $responseTransformer->isSupportedResponseFormat($client->getResponseFormat())) {
            throw new \InvalidArgumentException('Client not compatible with response transformer!');
        }

        $this->client = $client;
        $this->responseTransformer = $responseTransformer;
        $this->apiExceptionTransformer = $apiExceptionTransformer;
        $this->accessToken = $accessToken;
    }

    /**
     * @return ContactResource
     */
    public function getContactResource()
    {
        /** @var ContactResource $resource */
        $resource = $this->getResource(ContactResource::class);

        return $resource;
    }

    /**
     * @return UserResource
     */
    public function getUserResource()
    {
        /** @var UserResource $resource */
        $resource = $this->getResource(UserResource::class);

        return $resource;
    }

    /**
     * @return GroupResource
     */
    public function getGroupResource()
    {
        /** @var GroupResource $resource */
        $resource = $this->getResource(GroupResource::class);

        return $resource;
    }

    /**
     * @return InvitationResource
     */
    public function getInvitationResource()
    {
        /** @var InvitationResource $resource */
        $resource = $this->getResource(InvitationResource::class);

        return $resource;
    }

    /**
     * @return AccountResource
     */
    public function getAccountResource()
    {
        /** @var AccountResource $resource */
        $resource = $this->getResource(AccountResource::class);

        return $resource;
    }

    /**
     * @return WorkflowResource
     */
    public function getWorkflowResource()
    {
        /** @var WorkflowResource $resource */
        $resource = $this->getResource(WorkflowResource::class);

        return $resource;
    }

    /**
     * @return CustomFieldResource
     */
    public function getCustomFieldResource()
    {
        /** @var CustomFieldResource $resource */
        $resource = $this->getResource(CustomFieldResource::class);

        return $resource;
    }

    /**
     * @return FolderResource
     */
    public function getFolderResource()
    {
        /** @var FolderResource $resource */
        $resource = $this->getResource(FolderResource::class);

        return $resource;
    }

    /**
     * @return TaskResource
     */
    public function getTaskResource()
    {
        /** @var TaskResource $resource */
        $resource = $this->getResource(TaskResource::class);

        return $resource;
    }

    /**
     * @return CommentResource
     */
    public function getCommentResource()
    {
        /** @var CommentResource $resource */
        $resource = $this->getResource(CommentResource::class);

        return $resource;
    }

    /**
     * @return DependencyResource
     */
    public function getDependencyResource()
    {
        /** @var DependencyResource $resource */
        $resource = $this->getResource(DependencyResource::class);

        return $resource;
    }

    /**
     * @return TimelogResource
     */
    public function getTimelogResource()
    {
        /** @var TimelogResource $resource */
        $resource = $this->getResource(TimelogResource::class);

        return $resource;
    }

    /**
     * @return TimelogCategoryResource
     */
    public function getTimelogCategoryResource()
    {
        /** @var TimelogCategoryResource $resource */
        $resource = $this->getResource(TimelogCategoryResource::class);

        return $resource;
    }

    /**
     * @return AttachmentResource
     */
    public function getAttachmentResource()
    {
        /** @var AttachmentResource $resource */
        $resource = $this->getResource(AttachmentResource::class);

        return $resource;
    }

    /**
     * @return VersionResource
     */
    public function getVersionResource()
    {
        /** @var VersionResource $resource */
        $resource = $this->getResource(VersionResource::class);

        return $resource;
    }

    /**
     * @return IdResource
     */
    public function getIdResource()
    {
        /** @var IdResource $resource */
        $resource = $this->getResource(IdResource::class);

        return $resource;
    }

    /**
     * @return ColorResource
     */
    public function getColorResource()
    {
        /** @var ColorResource $resource */
        $resource = $this->getResource(ColorResource::class);

        return $resource;
    }

    /**
     * @param array $params
     *
     * @return array
     */
    public function normalizeParams(array $params)
    {
        foreach ($params as $key => $value) {
            if (false === is_string($value) && false === is_resource($value)) {
                $params[$key] = json_encode($value);
            }
        }

        return $params;
    }

    /**
     * @param string $resourceClass
     * @return AbstractResource
     */
    private function getResource($resourceClass)
    {
        return new $resourceClass(
            $this->client,
            $this->responseTransformer,
            $this->apiExceptionTransformer,
            $this->accessToken
        );
    }
}
