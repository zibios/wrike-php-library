<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Resource;

use Zibios\WrikePhpLibrary\Enum\Api\RequestPathFormatEnum;
use Zibios\WrikePhpLibrary\Enum\Api\ResourceMethodEnum;
use Zibios\WrikePhpLibrary\Resource\Traits\CreateForAccountTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\GetAllForAccountTrait;
use Zibios\WrikePhpLibrary\Resource\Traits\UpdateTrait;

/**
 * Workflow Resource.
 */
class WorkflowResource extends AbstractResource
{
    use GetAllForAccountTrait;
    use CreateForAccountTrait;
    use UpdateTrait;

    /**
     * @return array
     */
    protected function getResourceMethodConfiguration()
    {
        return [
            ResourceMethodEnum::GET_ALL_FOR_ACCOUNT => RequestPathFormatEnum::WORKFLOWS_FOR_ACCOUNT,
            ResourceMethodEnum::CREATE_FOR_ACCOUNT => RequestPathFormatEnum::WORKFLOWS_FOR_ACCOUNT,
            ResourceMethodEnum::UPDATE => RequestPathFormatEnum::WORKFLOWS_BY_ID,
        ];
    }
}
