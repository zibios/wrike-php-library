<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Tests\Model\Common;

use Zibios\WrikePhpLibrary\Model\Common\AvatarModel;
use Zibios\WrikePhpLibrary\Tests\Model\ResourceModelTestCase;

/**
 * Avatar Model Test.
 */
class AvatarModelTest extends ResourceModelTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = AvatarModel::class;

    /**
     * @var array
     */
    protected $properties = [
        'letters',
        'color',
    ];
}
