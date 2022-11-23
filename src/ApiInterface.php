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
use Zibios\WrikePhpLibrary\Resource\WebhookResource;
use Zibios\WrikePhpLibrary\Resource\SpaceResource;
use Zibios\WrikePhpLibrary\Resource\WorkflowResource;

/**
 * General Wrike Api Interface for resource getters.
 */
interface ApiInterface extends DeprecatedApiInterface
{
    /**
     * @return ContactResource
     */
    public function contacts(): ContactResource;

    /**
     * @return WebhookResource
     */
    public function webhooks(): WebhookResource;

    /**
     * @return SpacesResoure
     */
    public function spaces(): SpaceResource;

    /**
     * @return UserResource
     */
    public function users(): UserResource;

    /**
     * @return GroupResource
     */
    public function groups(): GroupResource;

    /**
     * @return InvitationResource
     */
    public function invitations(): InvitationResource;

    /**
     * @return AccountResource
     */
    public function account(): AccountResource;

    /**
     * @return WorkflowResource
     */
    public function workflows(): WorkflowResource;

    /**
     * @return CustomFieldResource
     */
    public function customFields(): CustomFieldResource;

    /**
     * @return FolderResource
     */
    public function folders(): FolderResource;

    /**
     * @return TaskResource
     */
    public function tasks(): TaskResource;

    /**
     * @return CommentResource
     */
    public function comments(): CommentResource;

    /**
     * @return DependencyResource
     */
    public function dependencies(): DependencyResource;

    /**
     * @return TimelogResource
     */
    public function timelogs(): TimelogResource;

    /**
     * @return TimelogCategoryResource
     */
    public function timelogCategories(): TimelogCategoryResource;

    /**
     * @return AttachmentResource
     */
    public function attachments(): AttachmentResource;

    /**
     * @return VersionResource
     */
    public function version(): VersionResource;

    /**
     * @return IdResource
     */
    public function ids(): IdResource;

    /**
     * @return ColorResource
     */
    public function colors(): ColorResource;

    /**
     * Calculate params in array to format expected by Wrike Api.
     *
     * @param array $params
     *
     * @return array
     */
    public function normalizeParams(array $params): array;
}
