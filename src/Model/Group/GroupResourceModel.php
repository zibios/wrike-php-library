<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Model\Group;

use Zibios\WrikePhpLibrary\Model\Common\MetadataModel;
use Zibios\WrikePhpLibrary\Model\ResourceModelInterface;

/**
 * Group Resource Model.
 */
class GroupResourceModel implements ResourceModelInterface
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
     * Account ID.
     *
     * Comment: Account ID
     *
     * @var string|null
     */
    protected $accountId;

    /**
     * Group Title.
     *
     * @var string|null
     */
    protected $title;

    /**
     * List of group members user IDs.
     *
     * Comment: Contact ID list
     *
     * @var array|string[]|null
     */
    protected $memberIds;

    /**
     * List of child group IDs.
     *
     * Comment: Contact ID list
     *
     * @var array|string[]|null
     */
    protected $childIds;

    /**
     * List of parent group IDs.
     *
     * Comment: Contact ID list
     *
     * @var array|string[]|null
     */
    protected $parentIds;

    /**
     * Avatar URL.
     *
     * @var string|null
     */
    protected $avatarUrl;

    /**
     * Field is present and set to true for My Team (default) group
     * Optional.
     *
     * Comment: Optional
     *
     * @var bool|null
     */
    protected $myTeam;

    /**
     * List of group metadata entries
     * Metadata entry key-value pair
     * Metadata entries are isolated on per-client (application) basis
     * Optional.
     *
     * Comment: Optional
     *
     * @var array|MetadataModel[]|null
     */
    protected $metadata;
}
