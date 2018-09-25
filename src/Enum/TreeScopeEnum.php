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
 * Tree Scope Enum.
 */
class TreeScopeEnum extends AbstractEnum
{
    /**
     * Virtual root folder of account.
     */
    public const WS_ROOT = 'WsRoot';

    /**
     * Virtual Recycle Bin folder of account.
     */
    public const RB_ROOT = 'RbRoot';

    /**
     * Folder in account.
     */
    public const WS_FOLDER = 'WsFolder';

    /**
     * Folder is in Recycle Bin (deleted folder).
     */
    public const RB_FOLDER = 'RbFolder';

    /**
     * Task in account.
     */
    public const WS_TASK = 'WsTask';

    /**
     * Task is in Recycle Bin (deleted task).
     */
    public const RB_TASK = 'RbTask';
}
