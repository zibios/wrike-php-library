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

namespace Zibios\WrikePhpLibrary\Resource\Traits;

use Zibios\WrikePhpLibrary\Enum\Api\RequestMethodEnum;
use Zibios\WrikePhpLibrary\Enum\Api\ResourceMethodEnum;

/**
 * CreateForFolder Trait.
 */
trait CreateWebhookForFolderTrait
{
    /**
     * @param string     $id
     * @param array|null $params
     *
     * @throws \Zibios\WrikePhpLibrary\Exception\Api\ApiException
     * @throws \LogicException
     * @throws \InvalidArgumentException
     * @throws \Throwable
     *
     * @return mixed
     */
    public function createWebhookForFolder(string $id, array $params = [])
    {
        return $this->executeRequest(
            RequestMethodEnum::POST,
            ResourceMethodEnum::CREATE_WEBHOOK_FOR_FOLDER,
            $params,
            $id
        );
    }

    /**
     * @param string       $requestMethod
     * @param string       $requestScope
     * @param array        $params
     * @param string|array $id
     *
     * @throws \Zibios\WrikePhpLibrary\Exception\Api\ApiException
     * @throws \LogicException
     * @throws \InvalidArgumentException
     * @throws \Throwable
     *
     * @return mixed
     */
    abstract protected function executeRequest(
        string $requestMethod,
        string $requestScope,
        array $params,
        $id
    );
}
