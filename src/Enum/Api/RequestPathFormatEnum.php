<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Enum\Api;

use Zibios\WrikePhpLibrary\Enum\AbstractEnum;

/**
 * Request Path Format Enum.
 */
class RequestPathFormatEnum extends AbstractEnum
{
    const CONTACTS = 'contacts';
    const CONTACTS_FOR_ACCOUNT = 'accounts/%s/contacts';
    const CONTACTS_BY_ID = 'contacts/%s';
    const CONTACTS_BY_IDS = 'contacts/%s';

    const USERS_BY_ID = 'users/%s';

    const GROUPS_BY_ID = 'groups/%s';
    const GROUPS_FOR_ACCOUNT = 'accounts/%s/groups';

    const INVITATIONS_BY_ID = 'invitations/%s';
    const INVITATIONS_FOR_ACCOUNT = 'accounts/%s/invitations';

    const ACCOUNTS = 'accounts';
    const ACCOUNTS_BY_ID = 'accounts/%s';

    const WORKFLOWS_FOR_ACCOUNT = 'accounts/%s/workflows';
    const WORKFLOWS_BY_ID = 'workflows/%s';

    const CUSTOM_FIELDS = 'customfields';
    const CUSTOM_FIELDS_FOR_ACCOUNT = 'accounts/%s/customfields';
    const CUSTOM_FIELDS_BY_ID = 'customfields/%s';
    const CUSTOM_FIELDS_BY_IDS = 'customfields/%s';

    const FOLDERS = 'folders';
    const FOLDERS_FOR_ACCOUNT = 'accounts/%s/folders';
    const FOLDERS_FOR_FOLDER = 'folders/%s/folders';
    const FOLDERS_BY_ID = 'folders/%s';
    const FOLDERS_BY_IDS = 'folders/%s';
    const FOLDERS_COPY = 'copy_folder/%s';

    const TASKS = 'tasks';
    const TASKS_FOR_ACCOUNT = 'accounts/%s/tasks';
    const TASKS_FOR_FOLDER = 'folders/%s/tasks';
    const TASKS_BY_ID = 'tasks/%s';
    const TASKS_BY_IDS = 'tasks/%s';

    const COMMENTS = 'comments';
    const COMMENTS_FOR_ACCOUNT = 'accounts/%s/comments';
    const COMMENTS_FOR_FOLDER = 'folders/%s/comments';
    const COMMENTS_FOR_TASK = 'tasks/%s/comments';
    const COMMENTS_BY_ID = 'comments/%s';
    const COMMENTS_BY_IDS = 'comments/%s';

    const DEPENDENCIES = 'dependencies';
    const DEPENDENCIES_FOR_TASK = 'tasks/%s/dependencies';
    const DEPENDENCIES_BY_ID = 'dependencies/%s';
    const DEPENDENCIES_BY_IDS = 'dependencies/%s';

    const TIMELOGS = 'timelogs';
    const TIMELOGS_FOR_CONTACT = 'contacts/%s/timelogs';
    const TIMELOGS_FOR_ACCOUNT = 'accounts/%s/timelogs';
    const TIMELOGS_FOR_FOLDER = 'folders/%s/timelogs';
    const TIMELOGS_FOR_TASK = 'tasks/%s/timelogs';
    const TIMELOGS_FOR_TIMELOG_CATEGORY = 'timelog_categories/%s/timelogs';
    const TIMELOGS_BY_ID = 'timelogs/%s';
    const TIMELOGS_BY_IDS = 'timelogs/%s';

    const TIMELOG_CATEGORIES = 'timelog_categories';

    const ATTACHMENTS_FOR_ACCOUNT = 'accounts/%s/attachments';
    const ATTACHMENTS_FOR_FOLDER = 'folders/%s/attachments';
    const ATTACHMENTS_FOR_TASK = 'tasks/%s/attachments';
    const ATTACHMENTS_BY_ID = 'attachments/%s';
    const ATTACHMENTS_BY_IDS = 'attachments/%s';
    const ATTACHMENTS_DOWNLOAD = 'attachments/%s/download';
    const ATTACHMENTS_DOWNLOAD_PREVIEW = 'attachments/%s/preview';
    const ATTACHMENTS_URL = 'attachments/%s/url';

    const VERSIONS = 'version';

    const IDS = 'ids';

    const COLORS = 'colors';
}
