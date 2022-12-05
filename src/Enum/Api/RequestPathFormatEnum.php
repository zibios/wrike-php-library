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

namespace Zibios\WrikePhpLibrary\Enum\Api;

use Zibios\WrikePhpLibrary\Enum\AbstractEnum;

/**
 * Request Path Format Enum.
 */
class RequestPathFormatEnum extends AbstractEnum
{
    public const CONTACTS = 'contacts';
    public const CONTACTS_BY_ID = 'contacts/%s';
    public const CONTACTS_BY_IDS = 'contacts/%s';

    public const USERS_BY_ID = 'users/%s';

    public const GROUPS = 'groups';
    public const GROUPS_BY_ID = 'groups/%s';

    public const INVITATIONS = 'invitations';
    public const INVITATIONS_BY_ID = 'invitations/%s';

    public const ACCOUNTS = 'account';

    public const WORKFLOWS = 'workflows';
    public const WORKFLOWS_BY_ID = 'workflows/%s';

    public const CUSTOM_FIELDS = 'customfields';
    public const CUSTOM_FIELDS_BY_ID = 'customfields/%s';
    public const CUSTOM_FIELDS_BY_IDS = 'customfields/%s';

    public const FOLDERS = 'folders';
    public const FOLDERS_FOR_FOLDER = 'folders/%s/folders';
    public const FOLDERS_BY_ID = 'folders/%s';
    public const FOLDERS_BY_IDS = 'folders/%s';
    public const FOLDERS_COPY = 'copy_folder/%s';

    public const TASKS = 'tasks';
    public const TASKS_FOR_FOLDER = 'folders/%s/tasks';
    public const TASKS_BY_ID = 'tasks/%s';
    public const TASKS_BY_IDS = 'tasks/%s';

    public const COMMENTS = 'comments';
    public const COMMENTS_FOR_FOLDER = 'folders/%s/comments';
    public const COMMENTS_FOR_TASK = 'tasks/%s/comments';
    public const COMMENTS_BY_ID = 'comments/%s';
    public const COMMENTS_BY_IDS = 'comments/%s';

    public const DEPENDENCIES = 'dependencies';
    public const DEPENDENCIES_FOR_TASK = 'tasks/%s/dependencies';
    public const DEPENDENCIES_BY_ID = 'dependencies/%s';
    public const DEPENDENCIES_BY_IDS = 'dependencies/%s';

    public const TIMELOGS = 'timelogs';
    public const TIMELOGS_FOR_CONTACT = 'contacts/%s/timelogs';
    public const TIMELOGS_FOR_FOLDER = 'folders/%s/timelogs';
    public const TIMELOGS_FOR_TASK = 'tasks/%s/timelogs';
    public const TIMELOGS_FOR_TIMELOG_CATEGORY = 'timelog_categories/%s/timelogs';
    public const TIMELOGS_BY_ID = 'timelogs/%s';
    public const TIMELOGS_BY_IDS = 'timelogs/%s';

    public const TIMELOG_CATEGORIES = 'timelog_categories';

    public const ATTACHMENTS = 'attachments';
    public const ATTACHMENTS_FOR_FOLDER = 'folders/%s/attachments';
    public const ATTACHMENTS_FOR_TASK = 'tasks/%s/attachments';
    public const ATTACHMENTS_BY_ID = 'attachments/%s';
    public const ATTACHMENTS_BY_IDS = 'attachments/%s';
    public const ATTACHMENTS_DOWNLOAD = 'attachments/%s/download';
    public const ATTACHMENTS_DOWNLOAD_PREVIEW = 'attachments/%s/preview';
    public const ATTACHMENTS_URL = 'attachments/%s/url';

    public const WEBHOOKS = 'webhooks';
    public const WEBHOOKS_FOR_FOLDER = 'folders/%s/webhooks'; // folder id
    public const WEBHOOKS_FOR_SPACE = 'spaces/%s/webhooks'; // space id
    public const WEBHOOKS_FOR_ACCOUNTS = 'webhooks';
    public const WEBHOOKS_BY_ID = 'webhooks/%s';
    public const WEBHOOKS_BY_IDS = 'webhooks/%s';

    public const SPACES = 'spaces';
    public const SPACES_BY_ID = 'spaces/%s';


    public const VERSIONS = 'version';

    public const IDS = 'ids';

    public const COLORS = 'colors';
}
