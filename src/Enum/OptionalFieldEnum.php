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
     * Brief Description.
     */
    const BRIEF_DESCRIPTION = 'briefDescription';

    /**
     * Custom Column Ids.
     */
    const CUSTOM_COLUMN_IDS = 'customColumnIds';

    /**
     * Attachment Count.
     */
    const ATTACHMENT_COUNT = 'attachmentCount';
}
