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
 * Custom Field Aggregation Enum.
 */
class CustomFieldAggregationEnum extends AbstractEnum
{
    public const NONE = 'None';
    public const SUM = 'Sum';
    public const AVERAGE = 'Average';
}
