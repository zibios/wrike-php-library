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

/**
 * General Wrike Api Interface.
 */
interface ApiInterface
{
    /**
     * @return ContactResource
     */
    public function getContactResource();

    /**
     * @return UserResource
     */
    public function getUserResource();

    /**
     * @return GroupResource
     */
    public function getGroupResource();

    /**
     * @return InvitationResource
     */
    public function getInvitationResource();

    /**
     * @return AccountResource
     */
    public function getAccountResource();

    /**
     * @return WorkflowResource
     */
    public function getWorkflowResource();

    /**
     * @return CustomFieldResource
     */
    public function getCustomFieldResource();

    /**
     * @return FolderResource
     */
    public function getFolderResource();

    /**
     * @return TaskResource
     */
    public function getTaskResource();

    /**
     * @return CommentResource
     */
    public function getCommentResource();

    /**
     * @return DependencyResource
     */
    public function getDependencyResource();

    /**
     * @return TimelogResource
     */
    public function getTimelogResource();

    /**
     * @return AttachmentResource
     */
    public function getAttachmentResource();

    /**
     * @return VersionResource
     */
    public function getVersionResource();

    /**
     * @return IdResource
     */
    public function getIdResource();

    /**
     * @return ColorResource
     */
    public function getColorResource();
}
