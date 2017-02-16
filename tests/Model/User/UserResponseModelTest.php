<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Tests\Model\User;

use Zibios\WrikePhpLibrary\Model\User\UserResponseModel;
use Zibios\WrikePhpLibrary\Tests\Model\ResponseModelTestCase;

/**
 * User Response Model Test.
 */
class UserResponseModelTest extends ResponseModelTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = UserResponseModel::class;
}
