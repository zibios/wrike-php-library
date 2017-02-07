<?php
/**
 * This file is part of the WrikePhpLibrary package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Model\User;

use Zibios\WrikePhpLibrary\Model\ResponseModelInterface;

/**
 * User Response Model
 */
class UserResponseModel implements ResponseModelInterface
{
    /**
     * Kind of response
     *
     * @var string|null
     */
    protected $kind;

    /**
     * @var array|UserResourceModel[]|null
     */
    protected $data;
}
