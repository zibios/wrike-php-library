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

/**
 * @deprecated Will be removed in version 3.0.0.
 * Deprecated Wrike Api Interface for resource getters.
 */
interface DeprecatedApiInterface
{
    /**
     * @deprecated getContactResource is deprecated and will be removed in 3.0.0. Use contacts().
     * @return ContactResource
     */
    public function getContactResource(): ContactResource;

    /**
     * @return UserResource
     */
    public function getUserResource(): UserResource;

    /**
     * @return GroupResource
     */
    public function getGroupResource(): GroupResource;

    /**
     * @return InvitationResource
     */
    public function getInvitationResource(): InvitationResource;

    /**
     * @return AccountResource
     */
    public function getAccountResource(): AccountResource;

    /**
     * @return WorkflowResource
     */
    public function getWorkflowResource(): WorkflowResource;

    /**
     * @return CustomFieldResource
     */
    public function getCustomFieldResource(): CustomFieldResource;

    /**
     * @return FolderResource
     */
    public function getFolderResource(): FolderResource;

    /**
     * @return TaskResource
     */
    public function getTaskResource(): TaskResource;

    /**
     * @return CommentResource
     */
    public function getCommentResource(): CommentResource;

    /**
     * @return DependencyResource
     */
    public function getDependencyResource(): DependencyResource;

    /**
     * @return TimelogResource
     */
    public function getTimelogResource(): TimelogResource;

    /**
     * @return TimelogCategoryResource
     */
    public function getTimelogCategoryResource(): TimelogCategoryResource;

    /**
     * @return AttachmentResource
     */
    public function getAttachmentResource(): AttachmentResource;

    /**
     * @return VersionResource
     */
    public function getVersionResource(): VersionResource;

    /**
     * @return IdResource
     */
    public function getIdResource(): IdResource;

    /**
     * @return ColorResource
     */
    public function getColorResource(): ColorResource;
}
