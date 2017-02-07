<?php
/**
 * This file is part of the WrikePhpLibrary package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Enum;

/**
 * Scope Enum
 */
class ScopeEnum extends AbstractEnum
{
    const SCOPE_DEFAULT = 'Default';
    const WS_READ_ONLY = 'wsReadOnly';
    const WS_READ_WRITE = 'wsReadWrite';
    const AM_READ_ONLY_WORKFLOW = 'amReadOnlyWorkflow';
    const AM_READ_WRITE_WORKFLOW = 'amReadWriteWorkflow';
    const AM_READ_ONLY_INVITATION = 'amReadOnlyInvitation';
    const AM_READ_WRITE_INVITATION = 'amReadWriteInvitation';
    const AM_READ_ONLY_GROUP = 'amReadOnlyGroup';
    const AM_READ_WRITE_GROUP = 'amReadWriteGroup';
    const AM_READ_ONLY_USER = 'amReadOnlyUser';
    const AM_READ_WRITE_USER = 'amReadWriteUser';
}
