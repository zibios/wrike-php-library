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
use Zibios\WrikePhpLibrary\Transformer\ResponseTransformerInterface;

/**
 * General Wrike Api.
 *
 * Entry point for all Wrike API operations.
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class Api implements ApiInterface
{
    const BASE_URI = 'https://www.wrike.com/api/v3/';

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var ResponseTransformerInterface
     */
    protected $responseTransformer;

    /**
     * @var ContactResource
     */
    protected $contactResource;

    /**
     * @var UserResource
     */
    protected $userResource;

    /**
     * @var GroupResource
     */
    protected $groupResource;

    /**
     * @var InvitationResource
     */
    protected $invitationResource;

    /**
     * @var AccountResource
     */
    protected $accountResource;

    /**
     * @var WorkflowResource
     */
    protected $workflowResource;

    /**
     * @var CustomFieldResource
     */
    protected $customFieldResource;

    /**
     * @var FolderResource
     */
    protected $folderResource;

    /**
     * @var TaskResource
     */
    protected $taskResource;

    /**
     * @var CommentResource
     */
    protected $commentResource;

    /**
     * @var DependencyResource
     */
    protected $dependencyResource;

    /**
     * @var TimelogResource
     */
    protected $timelogResource;

    /**
     * @var AttachmentResource
     */
    protected $attachmentResource;

    /**
     * @var VersionResource
     */
    protected $versionResource;

    /**
     * @var IdResource
     */
    protected $idResource;

    /**
     * @var ColorResource
     */
    protected $colorResource;

    /**
     * @param ClientInterface              $client
     * @param ResponseTransformerInterface $responseTransformer
     */
    public function __construct(
        ClientInterface $client,
        ResponseTransformerInterface $responseTransformer
    ) {
        $this->client = $client;
        $this->responseTransformer = $responseTransformer;
    }

    /**
     * @return string
     */
    public function getBearerToken()
    {
        return $this->client->getBearerToken();
    }

    /**
     * @param string $bearerToken
     *
     * @return $this
     */
    public function setBearerToken($bearerToken)
    {
        $this->client->setBearerToken($bearerToken);

        return $this;
    }

    /**
     * @return ContactResource
     */
    public function getContactResource()
    {
        if ($this->contactResource === null) {
            $this->contactResource = new ContactResource(
                $this->client,
                $this->responseTransformer
            );
        }

        return $this->contactResource;
    }

    /**
     * @return UserResource
     */
    public function getUserResource()
    {
        if ($this->userResource === null) {
            $this->userResource = new UserResource(
                $this->client,
                $this->responseTransformer
            );
        }

        return $this->userResource;
    }

    /**
     * @return GroupResource
     */
    public function getGroupResource()
    {
        if ($this->groupResource === null) {
            $this->groupResource = new GroupResource(
                $this->client,
                $this->responseTransformer
            );
        }

        return $this->groupResource;
    }

    /**
     * @return InvitationResource
     */
    public function getInvitationResource()
    {
        if ($this->invitationResource === null) {
            $this->invitationResource = new InvitationResource(
                $this->client,
                $this->responseTransformer
            );
        }

        return $this->invitationResource;
    }

    /**
     * @return AccountResource
     */
    public function getAccountResource()
    {
        if ($this->accountResource === null) {
            $this->accountResource = new AccountResource(
                $this->client,
                $this->responseTransformer
            );
        }

        return $this->accountResource;
    }

    /**
     * @return WorkflowResource
     */
    public function getWorkflowResource()
    {
        if ($this->workflowResource === null) {
            $this->workflowResource = new WorkflowResource(
                $this->client,
                $this->responseTransformer
            );
        }

        return $this->workflowResource;
    }

    /**
     * @return CustomFieldResource
     */
    public function getCustomFieldResource()
    {
        if ($this->customFieldResource === null) {
            $this->customFieldResource = new CustomFieldResource(
                $this->client,
                $this->responseTransformer
            );
        }

        return $this->customFieldResource;
    }

    /**
     * @return FolderResource
     */
    public function getFolderResource()
    {
        if ($this->folderResource === null) {
            $this->folderResource = new FolderResource(
                $this->client,
                $this->responseTransformer
            );
        }

        return $this->folderResource;
    }

    /**
     * @return TaskResource
     */
    public function getTaskResource()
    {
        if ($this->taskResource === null) {
            $this->taskResource = new TaskResource(
                $this->client,
                $this->responseTransformer
            );
        }

        return $this->taskResource;
    }

    /**
     * @return CommentResource
     */
    public function getCommentResource()
    {
        if ($this->commentResource === null) {
            $this->commentResource = new CommentResource(
                $this->client,
                $this->responseTransformer
            );
        }

        return $this->commentResource;
    }

    /**
     * @return DependencyResource
     */
    public function getDependencyResource()
    {
        if ($this->dependencyResource === null) {
            $this->dependencyResource = new DependencyResource(
                $this->client,
                $this->responseTransformer
            );
        }

        return $this->dependencyResource;
    }

    /**
     * @return TimelogResource
     */
    public function getTimelogResource()
    {
        if ($this->timelogResource === null) {
            $this->timelogResource = new TimelogResource(
                $this->client,
                $this->responseTransformer
            );
        }

        return $this->timelogResource;
    }

    /**
     * @return AttachmentResource
     */
    public function getAttachmentResource()
    {
        if ($this->attachmentResource === null) {
            $this->attachmentResource = new AttachmentResource(
                $this->client,
                $this->responseTransformer
            );
        }

        return $this->attachmentResource;
    }

    /**
     * @return VersionResource
     */
    public function getVersionResource()
    {
        if ($this->versionResource === null) {
            $this->versionResource = new VersionResource(
                $this->client,
                $this->responseTransformer
            );
        }

        return $this->versionResource;
    }

    /**
     * @return IdResource
     */
    public function getIdResource()
    {
        if ($this->idResource === null) {
            $this->idResource = new IdResource(
                $this->client,
                $this->responseTransformer
            );
        }

        return $this->idResource;
    }

    /**
     * @return ColorResource
     */
    public function getColorResource()
    {
        if ($this->colorResource === null) {
            $this->colorResource = new ColorResource(
                $this->client,
                $this->responseTransformer
            );
        }

        return $this->colorResource;
    }
}
