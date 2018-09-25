<?php

declare(strict_types=1);

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
 * Scope Enum.
 */
class ScopeEnum extends AbstractEnum
{
    public const SCOPE_DEFAULT = 'Default';
    public const WS_READ_ONLY = 'wsReadOnly';
    public const WS_READ_WRITE = 'wsReadWrite';
    public const AM_READ_ONLY_WORKFLOW = 'amReadOnlyWorkflow';
    public const AM_READ_WRITE_WORKFLOW = 'amReadWriteWorkflow';
    public const AM_READ_ONLY_INVITATION = 'amReadOnlyInvitation';
    public const AM_READ_WRITE_INVITATION = 'amReadWriteInvitation';
    public const AM_READ_ONLY_GROUP = 'amReadOnlyGroup';
    public const AM_READ_WRITE_GROUP = 'amReadWriteGroup';
    public const AM_READ_ONLY_USER = 'amReadOnlyUser';
    public const AM_READ_WRITE_USER = 'amReadWriteUser';
}
