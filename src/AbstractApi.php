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
use Zibios\WrikePhpLibrary\Resource\WebhookResource;
use Zibios\WrikePhpLibrary\Resource\SpaceResource;
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
    public function webhooks(): WebhookResource
    {
        /** @var $resource ContactResource */
        $resource = $this->getResource(WebhookResource::class);

        return $resource;
    }
    public function spaces(): SpaceResource
    {
        /** @var $resource ContactResource */
        $resource = $this->getResource(SpaceResource::class);

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
    public function users(): UserResource
    {
        /** @var UserResource $resource */
        $resource = $this->getResource(UserResource::class);

        return $resource;
    }

    /**
     * @return UserResource
     */
    public function getUserResource(): UserResource
    {
        return $this->users();
    }

    /**
     * @return GroupResource
     */
    public function groups(): GroupResource
    {
        /** @var GroupResource $resource */
        $resource = $this->getResource(GroupResource::class);

        return $resource;
    }

    /**
     * @return GroupResource
     */
    public function getGroupResource(): GroupResource
    {
        return $this->groups();
    }

    /**
     * @return InvitationResource
     */
    public function invitations(): InvitationResource
    {
        /** @var InvitationResource $resource */
        $resource = $this->getResource(InvitationResource::class);

        return $resource;
    }

    /**
     * @return InvitationResource
     */
    public function getInvitationResource(): InvitationResource
    {
        return $this->invitations();
    }

    /**
     * @return AccountResource
     */
    public function account(): AccountResource
    {
        /** @var AccountResource $resource */
        $resource = $this->getResource(AccountResource::class);

        return $resource;
    }

    /**
     * @return AccountResource
     */
    public function getAccountResource(): AccountResource
    {
        return $this->account();
    }

    /**
     * @return WorkflowResource
     */
    public function workflows(): WorkflowResource
    {
        /** @var WorkflowResource $resource */
        $resource = $this->getResource(WorkflowResource::class);

        return $resource;
    }

    /**
     * @return WorkflowResource
     */
    public function getWorkflowResource(): WorkflowResource
    {
        return $this->workflows();
    }

    /**
     * @return CustomFieldResource
     */
    public function customFields(): CustomFieldResource
    {
        /** @var CustomFieldResource $resource */
        $resource = $this->getResource(CustomFieldResource::class);

        return $resource;
    }

    /**
     * @return CustomFieldResource
     */
    public function getCustomFieldResource(): CustomFieldResource
    {
        return $this->customFields();
    }

    /**
     * @return FolderResource
     */
    public function folders(): FolderResource
    {
        /** @var FolderResource $resource */
        $resource = $this->getResource(FolderResource::class);

        return $resource;
    }

    /**
     * @return FolderResource
     */
    public function getFolderResource(): FolderResource
    {
        return $this->folders();
    }

    /**
     * @return TaskResource
     */
    public function tasks(): TaskResource
    {
        /** @var TaskResource $resource */
        $resource = $this->getResource(TaskResource::class);

        return $resource;
    }

    /**
     * @return TaskResource
     */
    public function getTaskResource(): TaskResource
    {
        return $this->tasks();
    }

    /**
     * @return CommentResource
     */
    public function comments(): CommentResource
    {
        /** @var CommentResource $resource */
        $resource = $this->getResource(CommentResource::class);

        return $resource;
    }

    /**
     * @return CommentResource
     */
    public function getCommentResource(): CommentResource
    {
        return $this->comments();
    }

    /**
     * @return DependencyResource
     */
    public function dependencies(): DependencyResource
    {
        /** @var DependencyResource $resource */
        $resource = $this->getResource(DependencyResource::class);

        return $resource;
    }

    /**
     * @return DependencyResource
     */
    public function getDependencyResource(): DependencyResource
    {
        return $this->dependencies();
    }

    /**
     * @return TimelogResource
     */
    public function timelogs(): TimelogResource
    {
        /** @var TimelogResource $resource */
        $resource = $this->getResource(TimelogResource::class);

        return $resource;
    }

    /**
     * @return TimelogResource
     */
    public function getTimelogResource(): TimelogResource
    {
        return $this->timelogs();
    }

    /**
     * @return TimelogCategoryResource
     */
    public function timelogCategories(): TimelogCategoryResource
    {
        /** @var TimelogCategoryResource $resource */
        $resource = $this->getResource(TimelogCategoryResource::class);

        return $resource;
    }

    /**
     * @return TimelogCategoryResource
     */
    public function getTimelogCategoryResource(): TimelogCategoryResource
    {
        return $this->timelogCategories();
    }

    /**
     * @return AttachmentResource
     */
    public function attachments(): AttachmentResource
    {
        /** @var AttachmentResource $resource */
        $resource = $this->getResource(AttachmentResource::class);

        return $resource;
    }

    /**
     * @return AttachmentResource
     */
    public function getAttachmentResource(): AttachmentResource
    {
        return $this->attachments();
    }

    /**
     * @return VersionResource
     */
    public function version(): VersionResource
    {
        /** @var VersionResource $resource */
        $resource = $this->getResource(VersionResource::class);

        return $resource;
    }

    /**
     * @return VersionResource
     */
    public function getVersionResource(): VersionResource
    {
        return $this->version();
    }

    /**
     * @return IdResource
     */
    public function ids(): IdResource
    {
        /** @var IdResource $resource */
        $resource = $this->getResource(IdResource::class);

        return $resource;
    }

    /**
     * @return IdResource
     */
    public function getIdResource(): IdResource
    {
        return $this->ids();
    }

    /**
     * @return ColorResource
     */
    public function colors(): ColorResource
    {
        /** @var ColorResource $resource */
        $resource = $this->getResource(ColorResource::class);

        return $resource;
    }

    /**
     * @return ColorResource
     */
    public function getColorResource(): ColorResource
    {
        return $this->colors();
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

    /**
     * @param string $resourceClass
     *
     * @return AbstractResource
     */
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
