<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Model\Invitation;

use Zibios\WrikePhpLibrary\Model\ResponseModelInterface;

/**
 * Invitation Response Model.
 */
class InvitationResponseModel implements ResponseModelInterface
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
     * @var array|InvitationResourceModel[]|null
     */
    protected $data;
}
