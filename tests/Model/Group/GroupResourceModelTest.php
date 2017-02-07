<?php
/**
 * This file is part of the WrikePhpLibrary package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Tests\Model\Group;

use Zibios\WrikePhpLibrary\Model\Group\GroupResourceModel;
use Zibios\WrikePhpLibrary\Tests\Model\ResourceModelTestCase;

/**
 * Group Resource Model Test
 */
class GroupResourceModelTest extends ResourceModelTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = GroupResourceModel::class;

    /**
     * @var array
     */
    protected $properties = [
        'id',
        'accountId',
        'title',
        'memberIds',
        'childIds',
        'parentIds',
        'avatarUrl',
        'myTeam',
        'metadata',
    ];
}
