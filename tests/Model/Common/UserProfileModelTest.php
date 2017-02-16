<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Tests\Model\Common;

use Zibios\WrikePhpLibrary\Model\Common\UserProfileModel;
use Zibios\WrikePhpLibrary\Tests\Model\ResourceModelTestCase;

/**
 * User Profile Model Test.
 */
class UserProfileModelTest extends ResourceModelTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = UserProfileModel::class;

    /**
     * @var array
     */
    protected $properties = [
        'accountId',
        'email',
        'role',
        'external',
        'admin',
        'owner',
    ];
}
