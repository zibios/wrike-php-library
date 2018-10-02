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
 * Subscription Type Enum.
 */
class SubscriptionTypeEnum extends AbstractEnum
{
    public const FREE = 'Free';
    public const PREMIUM = 'Premium';
    public const BUSINESS = 'Business';
    public const CREATIVE_BUSINESS = 'CreativeBusiness';
    public const ENTERPRISE = 'Enterprise';
    public const CREATIVE_ENTERPRISE = 'CreativeEnterprise';
}
