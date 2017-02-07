<?php
/**
 * This file is part of the WrikePhpLibrary package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Model\Common;

use Zibios\WrikePhpLibrary\Model\ResourceModelInterface;

/**
 * User Profile Model
 */
class UserProfileModel implements ResourceModelInterface
{
    /**
     * Account ID
     *
     * @var string|null
     */
    protected $accountId;

    /**
     * Email address associated with account
     *
     * @var string|null
     */
    protected $email;

    /**
     * Role in account
     *
     * Enum: User, Collaborator
     * @see \Zibios\WrikePhpLibrary\Enum\UserRoleEnum
     *
     * @var string|null
     */
    protected $role;

    /**
     * Is user external
     *
     * @var bool|null
     */
    protected $external;

    /**
     * Is user account admin
     *
     * @var bool|null
     */
    protected $admin;

    /**
     * Is user account owner
     *
     * @var bool|null
     */
    protected $owner;
}
