<?php
/**
 * This file is part of the WrikePhpLibrary package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Model\Contact;

use Zibios\WrikePhpLibrary\Model\ResponseModelInterface;

/**
 * Contact Response Model
 */
class ContactResponseModel implements ResponseModelInterface
{
    /**
     * Kind of response
     *
     * @var string|null
     */
    protected $kind;

    /**
     * Collection of response s
     *
     * @var array|ContactResourceModel[]|null
     */
    protected $data;
}
