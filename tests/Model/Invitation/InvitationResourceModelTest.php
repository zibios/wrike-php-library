<?php
/**
 * This file is part of the WrikePhpLibrary package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Tests\Model\Invitation;

use Zibios\WrikePhpLibrary\Model\Invitation\InvitationResourceModel;
use Zibios\WrikePhpLibrary\Tests\Model\ResourceModelTestCase;

/**
 * Invitation Resource Model Test
 */
class InvitationResourceModelTest extends ResourceModelTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = InvitationResourceModel::class;

    /**
     * @var array
     */
    protected $properties = [
        'id',
        'accountId',
        'firstName',
        'lastName',
        'email',
        'status',
        'inviterUserId',
        'invitationDate',
        'resolvedDate',
        'role',
        'external',
    ];
}
