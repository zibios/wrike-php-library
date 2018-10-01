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

namespace Zibios\WrikePhpLibrary\Enum;

/**
 * Optional Field Enum.
 */
class OptionalFieldEnum extends AbstractEnum
{
    /**
     * Metadata.
     */
    public const METADATA = 'metadata';

    /**
     * Subscription.
     */
    public const SUBSCRIPTION = 'subscription';

    /**
     * Custom Fields.
     */
    public const CUSTOM_FIELDS = 'customFields';

    /**
     * Description.
     */
    public const DESCRIPTION = 'description';

    /**
     * Brief Description.
     */
    public const BRIEF_DESCRIPTION = 'briefDescription';

    /**
     * Custom Column Ids.
     */
    public const CUSTOM_COLUMN_IDS = 'customColumnIds';

    /**
     * List of task parent folder.
     */
    public const PARENT_IDS = 'parentIds';

    /**
     * List of folder IDs inherited from parent task.
     */
    public const SUPER_PARENT_IDS = 'superParentIds';

    /**
     * List of user IDs, who have task share.
     */
    public const SHARED_IDS = 'sharedIds';

    /**
     * List of responsible user IDs.
     */
    public const RESPONSIBLE_IDS = 'responsibleIds';

    /**
     * List of supertask IDs.
     */
    public const SUPER_TASK_IDS = 'superTaskIds';

    /**
     * List of subtask IDs.
     */
    public const SUB_TASK_IDS = 'subTaskIds';

    /**
     * Dependency IDs.
     */
    public const DEPENDENCY_IDS = 'dependencyIds';

    /**
     * Has attachments.
     */
    public const HAS_ATTACHMENTS = 'hasAttachments';

    /**
     * Attachment Count.
     */
    public const ATTACHMENT_COUNT = 'attachmentCount';

    /**
     * Recurrent.
     */
    public const RECURRENT = 'recurrent';

    /**
     * Author IDs.
     */
    public const AUTHOR_IDS = 'authorIds';
}
