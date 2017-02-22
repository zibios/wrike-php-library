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
 * Tree Scope Enum.
 */
class TreeScopeEnum extends AbstractEnum
{
    /**
     * Virtual root folder of account.
     */
    const WS_ROOT = 'WsRoot';

    /**
     * Virtual Recycle Bin folder of account.
     */
    const RB_ROOT = 'RbRoot';

    /**
     * Folder in account.
     */
    const WS_FOLDER = 'WsFolder';

    /**
     * Folder is in Recycle Bin (deleted folder).
     */
    const RB_FOLDER = 'RbFolder';

    /**
     * Task in account.
     */
    const WS_TASK = 'WsTask';

    /**
     * Task is in Recycle Bin (deleted task).
     */
    const RB_TASK = 'RbTask';
}
