<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Enum;

/**
 * User Type Enum.
 */
class UserTypeEnum extends AbstractEnum
{
    /**
     * Person.
     */
    const PERSON = 'Person';

    /**
     * Group of users.
     *
     * Group userId can be used in folder/task sharing requests only. It has no effect in other operations.
     */
    const GROUP = 'Group';
}
