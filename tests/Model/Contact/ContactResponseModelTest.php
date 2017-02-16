<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Tests\Model\Contact;

use Zibios\WrikePhpLibrary\Model\Contact\ContactResponseModel;
use Zibios\WrikePhpLibrary\Tests\Model\ResponseModelTestCase;

/**
 * Contact Response Model Test.
 */
class ContactResponseModelTest extends ResponseModelTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = ContactResponseModel::class;
}
