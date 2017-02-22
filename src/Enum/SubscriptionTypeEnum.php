<?php

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
    const FREE = 'Free';
    const PREMIUM = 'Premium';
    const BUSINESS = 'Business';
    const CREATIVE_BUSINESS = 'CreativeBusiness';
    const ENTERPRISE = 'Enterprise';
    const CREATIVE_ENTERPRISE = 'CreativeEnterprise';
}
