<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Model\Contact;

use Zibios\WrikePhpLibrary\Model\Common\MetadataModel;
use Zibios\WrikePhpLibrary\Model\Common\UserProfileModel;
use Zibios\WrikePhpLibrary\Model\ResourceModelInterface;

/**
 * Contact Resource Model.
 *
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class ContactResourceModel implements ResourceModelInterface
{
    /**
     * Contact ID.
     *
     * Comment: Contact ID
     *
     * @var string|null
     */
    protected $id;

    /**
     * First name.
     *
     * @var string|null
     */
    protected $firstName;

    /**
     * Last name.
     *
     * @var string|null
     */
    protected $lastName;

    /**
     * Type of the user.
     *
     * Enum: Person, Group
     *
     * @see \Zibios\WrikePhpLibrary\Enum\UserTypeEnum
     *
     * @var string|null
     */
    protected $type;

    /**
     * List of user profiles in accounts accessible for requesting user.
     *
     * @var array|UserProfileModel[]|null
     */
    protected $profiles;

    /**
     * Avatar URL.
     *
     * @var string|null
     */
    protected $avatarUrl;

    /**
     * Timezone Id, e.g 'America/New_York'.
     *
     * @var string|null
     */
    protected $timezone;

    /**
     * Locale.
     *
     * @var string|null
     */
    protected $locale;

    /**
     * True if user is deleted, false otherwise.
     *
     * @var bool|null
     */
    protected $deleted;

    /**
     * Field is present and set to true only for requesting user.
     *
     * @var bool|null
     */
    protected $me;

    /**
     * List of group members contact IDs (field is present only for groups).
     *
     * Comment: Contact ID array
     *
     * @var array|string[]|null
     */
    protected $memberIds;

    /**
     * List of contact metadata entries.
     *
     * Requesting user has read/write access to his own metadata, other entries are read-only
     * Metadata entry key-value pair
     * Metadata entries are isolated on per-client (application) basis
     * Comment: Optional
     *
     * @var array|MetadataModel[]|null
     */
    protected $metadata;

    /**
     * Field is present and set to true for My Team (default) group.
     *
     * Comment: Optional
     *
     * @var bool|null
     */
    protected $myTeam;

    /**
     * User Title.
     *
     * Comment: Optional
     *
     * @var string|null
     */
    protected $title;

    /**
     * User Company Name.
     *
     * Comment: Optional
     *
     * @var string|null
     */
    protected $companyName;

    /**
     * User phone.
     *
     * Comment: Optional
     *
     * @var string|null
     */
    protected $phone;

    /**
     * User location.
     *
     * Comment: Optional
     *
     * @var string|null
     */
    protected $location;
}
