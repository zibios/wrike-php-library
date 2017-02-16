<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Model\Invitation;

use Zibios\WrikePhpLibrary\Model\ResourceModelInterface;

/**
 * Invitation Resource Model.
 */
class InvitationResourceModel implements ResourceModelInterface
{
    /**
     * Invitation ID.
     *
     * Comment: Invitation ID
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
     * Invitation Title.
     *
     * @var string|null
     */
    protected $email;

    /**
     * Status.
     *
     * Invitation status
     * Enum: Pending, Accepted, Declined, Cancelled
     *
     * @see \Zibios\WrikePhpLibrary\Enum\InvitationStatusEnum
     *
     * @var string|null
     */
    protected $status;

    /**
     * Inviter Contact ID.
     *
     * Comment: Contact ID
     *
     * @var string|null
     */
    protected $inviterUserId;

    /**
     * Date when invitation was created.
     *
     * Format: yyyy-MM-dd'T'HH:mm:ss'Z'
     *
     * @var string|null
     */
    protected $invitationDate;

    /**
     * Date when the invitation was resolved.
     *
     * Format: yyyy-MM-dd'T'HH:mm:ss'Z'
     * Comment: Optional
     *
     * @var string|null
     */
    protected $resolvedDate;

    /**
     * Invited user role.
     *
     * Enum: User, Collaborator
     *
     * @see \Zibios\WrikePhpLibrary\Enum\UserRoleEnum
     *
     * @var string|null
     */
    protected $role;

    /**
     * Is user external.
     *
     * @var bool|null
     */
    protected $external;
}
