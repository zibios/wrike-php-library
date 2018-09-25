<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Resource\Helpers;

use Zibios\WrikePhpLibrary\Enum\Api\ResourceMethodEnum;
use Zibios\WrikePhpLibrary\Validator\IdValidator;

/**
 * Request Path Processor.
 */
class RequestPathProcessor
{
    /**
     * Combine ResourceMethodConfiguration, ResourceMethod and optional Id
     * to retrieve correct resource path for request.
     *
     * @param string            $resourceMethod
     * @param string|array|null $id
     * @param array             $resourceMethodConfiguration
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     *
     * @throws \InvalidArgumentException
     *
     * @return string
     */
    public function prepareRequestPathForResourceMethod($resourceMethod, $id, array $resourceMethodConfiguration)
    {
        $requestPathFormat = $this->calculateRequestPathFormat($resourceMethod, $resourceMethodConfiguration);

        switch ($resourceMethod) {
            case ResourceMethodEnum::GET_ALL:
                IdValidator::assertIsNull($id);
                $path = sprintf($requestPathFormat, $id);
                break;

            case ResourceMethodEnum::GET_BY_IDS:
                IdValidator::assertIsValidIdArray($id);
                $path = sprintf($requestPathFormat, implode(',', $id));
                break;

            case ResourceMethodEnum::GET_ALL_FOR_ACCOUNT:
            case ResourceMethodEnum::GET_ALL_FOR_FOLDER:
            case ResourceMethodEnum::GET_ALL_FOR_TASK:
            case ResourceMethodEnum::GET_ALL_FOR_CONTACT:
            case ResourceMethodEnum::GET_ALL_FOR_TIMELOG_CATEGORY:
            case ResourceMethodEnum::CREATE_FOR_ACCOUNT:
            case ResourceMethodEnum::CREATE_FOR_FOLDER:
            case ResourceMethodEnum::CREATE_FOR_TASK:
            case ResourceMethodEnum::GET_BY_ID:
            case ResourceMethodEnum::UPDATE:
            case ResourceMethodEnum::DELETE:
            case ResourceMethodEnum::COPY:
            case ResourceMethodEnum::DOWNLOAD:
            case ResourceMethodEnum::DOWNLOAD_PREVIEW:
            case ResourceMethodEnum::GET_PUBLIC_URL:
            case ResourceMethodEnum::UPLOAD_FOR_FOLDER:
            case ResourceMethodEnum::UPLOAD_FOR_TASK:
                IdValidator::assertIsValidIdString($id);
                $path = sprintf($requestPathFormat, $id);
                break;

            default:
                throw new \InvalidArgumentException(sprintf('"%s" resource method not yet supported', $resourceMethod));
        }

        return $path;
    }

    /**
     * @param string $resourceMethod
     * @param array  $resourceMethodConfiguration
     *
     * @throws \InvalidArgumentException
     *
     * @return string
     */
    private function calculateRequestPathFormat($resourceMethod, array $resourceMethodConfiguration)
    {
        if (false === array_key_exists($resourceMethod, $resourceMethodConfiguration)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Resource "%s" Method not found in configuration keys [%s]',
                    $resourceMethod,
                    implode(', ', array_keys($resourceMethodConfiguration))
                )
            );
        }

        return $resourceMethodConfiguration[$resourceMethod];
    }
}
