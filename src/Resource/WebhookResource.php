<?php

declare(strict_types=1);

/*
 * This file is part of the zibios/wrike-php-library package.
 * Webhook Resource added - zack-carlson
 *
 * (c) Zbigniew Ślązak0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Resource;

use Zibios\WrikePhpLibrary\Enum\Api\RequestPathFormatEnum;
use Zibios\WrikePhpLibrary\Enum\Api\ResourceMethodEnum;
use Zibios\WrikePhpLibrary\Resource\Traits\CreateForSpaceTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\CreateWebhookForFolderTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\DeleteTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetAllTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetByIdsTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetByIdTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\UpdateTrait;

/**
 * Comment Resource.
 */
class WebhookResource extends AbstractResource
{
    use CreateWebhookForFolderTrait;
    use CreateForSpaceTrait;
    use DeleteTrait;
    use GetAllTrait;
    use GetByIdsTrait;
    use GetByIdTrait;
    use UpdateTrait;

    /**
     * Return connection array ResourceMethod => RequestPathFormat.
     *
     * @see \Zibios\WrikePhpLibrary\Enum\Api\ResourceMethodEnum
     * @see \Zibios\WrikePhpLibrary\Enum\Api\RequestPathFormatEnum
     *
     * @return array
     */
    protected function getResourceMethodConfiguration(): array
    {
        return [
            ResourceMethodEnum::GET_ALL => RequestPathFormatEnum::WEBHOOKS,
            ResourceMethodEnum::GET_BY_ID => RequestPathFormatEnum::WEBHOOKS_BY_ID,
            ResourceMethodEnum::GET_BY_IDS => RequestPathFormatEnum::WEBHOOKS_BY_IDS,
            ResourceMethodEnum::CREATE_WEBHOOK_FOR_FOLDER => RequestPathFormatEnum::WEBHOOKS_FOR_FOLDER,
            ResourceMethodEnum::CREATE_FOR_SPACE => RequestPathFormatEnum::WEBHOOKS_FOR_SPACE,
            ResourceMethodEnum::UPDATE => RequestPathFormatEnum::WEBHOOKS_BY_ID,
            ResourceMethodEnum::DELETE => RequestPathFormatEnum::WEBHOOKS_BY_ID,
        ];
    }
}
