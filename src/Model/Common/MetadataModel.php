<?php
/**
 * This file is part of the WrikePhpLibrary package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Model\Common;

use Zibios\WrikePhpLibrary\Model\ResourceModelInterface;

/**
 * Metadata Model
 */
class MetadataModel implements ResourceModelInterface
{
    /**
     * Key should be less than 50 symbols and match following regular expression ([A-Za-z0-9_-]+)
     *
     * @var string|null
     */
    protected $key;

    /**
     * Value should be less than 1000 symbols, compatible with JSON string.
     * Use JSON 'null' in order to remove metadata entry
     *
     * @var string|null
     */
    protected $value;
}
