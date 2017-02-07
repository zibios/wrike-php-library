<?php
/**
 * This file is part of the WrikePhpLibrary package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Enum\Api;

use Zibios\WrikePhpLibrary\Enum\AbstractEnum;

/**
 * Request Path Format Enum
 */
class RequestPathFormatEnum extends AbstractEnum
{
    const CONTACTS = 'contacts';
    const CONTACTS_IN_ACCOUNT = 'accounts/%s/contacts';
    const CONTACTS_BY_ID = 'contacts/%s';
    const CONTACTS_BY_IDS = 'contacts/%s';

    const USERS_BY_ID = 'users/%s';

    const GROUPS_BY_ID = 'groups/%s';
    const GROUPS_IN_ACCOUNT = 'accounts/%s/groups';

    const INVITATIONS_BY_ID = 'invitations/%s';
    const INVITATIONS_IN_ACCOUNT = 'accounts/%s/invitations';
}
