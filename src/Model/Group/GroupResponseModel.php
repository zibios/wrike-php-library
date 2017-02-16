<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Model\Group;

use Zibios\WrikePhpLibrary\Model\ResponseModelInterface;

/**
 * Group Response Model.
 */
class GroupResponseModel implements ResponseModelInterface
{
    /**
     * Kind of response.
     *
     * @var string|null
     */
    protected $kind;

    /**
     * Collection of response s.
     *
     * @var array|GroupResourceModel[]|null
     */
    protected $data;
}
