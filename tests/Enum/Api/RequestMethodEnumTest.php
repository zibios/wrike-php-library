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

namespace Zibios\WrikePhpLibrary\Tests\Enum\Api;

use Zibios\WrikePhpLibrary\Enum\Api\RequestMethodEnum;
use Zibios\WrikePhpLibrary\Tests\Enum\EnumTestCase;

/**
 * Request Method Enum Test.
 */
class RequestMethodEnumTest extends EnumTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = RequestMethodEnum::class;

    /**
     * @var int
     */
    protected $enumCount = 5;
}
