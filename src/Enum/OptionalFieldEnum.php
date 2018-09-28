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
     * List of super parent folder IDs (applicable to 'Selective Sharing' labs feature).
     */
    const SUPER_PARENT_IDS = 'superParentIds';

    /**
     * Has attachments.
     */
    const HAS_ATTACHMENTS = 'hasAttachments';

    /**
     * Attachment Count.
     */
    const ATTACHMENT_COUNT = 'attachmentCount';
}
