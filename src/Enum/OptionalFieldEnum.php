<?php

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
    const METADATA = 'metadata';

    /**
     * Subscription.
     */
    const SUBSCRIPTION = 'subscription';

    /**
     * Custom Fields.
     */
    const CUSTOM_FIELDS = 'customFields';

    /**
     * Description.
     */
    const DESCRIPTION = 'description';

    /**
     * Brief Description.
     */
    const BRIEF_DESCRIPTION = 'briefDescription';

    /**
     * Custom Column Ids.
     */
    const CUSTOM_COLUMN_IDS = 'customColumnIds';

    /**
     * List of task parent folder.
     */
    const PARENT_IDS = 'parentIds';

    /**
     * List of folder IDs inherited from parent task.
     */
    const SUPER_PARENT_IDS = 'superParentIds';

    /**
     * List of user IDs, who have task share.
     */
    const SHARED_IDS = 'sharedIds';

    /**
     * List of responsible user IDs.
     */
    const RESPONSIBLE_IDS = 'responsibleIds';

    /**
     * List of supertask IDs.
     */
    const SUPER_TASK_IDS = 'superTaskIds';

    /**
     * List of subtask IDs.
     */
    const SUB_TASK_IDS = 'subTaskIds';

    /**
     * Dependency IDs.
     */
    const DEPENDENCY_IDS = 'dependencyIds';

    /**
     * Has attachments.
     */
    const HAS_ATTACHMENTS = 'hasAttachments';

    /**
     * Attachment Count.
     */
    const ATTACHMENT_COUNT = 'attachmentCount';

    /**
     * Recurrent.
     */
    const RECURRENT = 'recurrent';

    /**
     * Author IDs.
     */
    const AUTHOR_IDS = 'authorIds';
}
