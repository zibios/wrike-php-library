<?php
/**
 * This file is part of the WrikePhpLibrary package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary;

use Zibios\WrikePhpLibrary\Client\ClientInterface;
use Zibios\WrikePhpLibrary\Resource\ContactResource;
use Zibios\WrikePhpLibrary\Resource\GroupResource;
use Zibios\WrikePhpLibrary\Resource\InvitationResource;
use Zibios\WrikePhpLibrary\Resource\UserResource;
use Zibios\WrikePhpLibrary\Transformer\ResponseTransformerInterface;

/**
 * General Wrike Api
 *
 * Entry point for all Wrike API operations.
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Api implements ApiInterface
{
    const BASE_URI = 'https://www.wrike.com/api/v3/';

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var ResponseTransformerInterface
     */
    protected $responseTransformer;

    /**
     * @var ContactResource
     */
    protected $contactResource;

    /**
     * @var UserResource
     */
    protected $userResource;

    /**
     * @var GroupResource
     */
    protected $groupResource;

    /**
     * @var InvitationResource
     */
    protected $invitationResource;

    /**
     * @param ClientInterface $client
     * @param ResponseTransformerInterface $responseTransformer
     */
    public function __construct(
        ClientInterface $client,
        ResponseTransformerInterface $responseTransformer
    ) {
        $this->client = $client;
        $this->responseTransformer = $responseTransformer;
    }

    /**
     * @return string
     */
    public function getBearerToken()
    {
        return $this->client->getBearerToken();
    }

    /**
     * @param string $bearerToken
     *
     * @return $this
     */
    public function setBearerToken($bearerToken)
    {
        $this->client->setBearerToken($bearerToken);

        return $this;
    }

    /**
     * @return ContactResource
     */
    public function getContactResource()
    {
        if ($this->contactResource === null) {
            $this->contactResource = new ContactResource(
                $this->client,
                $this->responseTransformer
            );
        }

        return $this->contactResource;
    }

    /**
     * @return UserResource
     */
    public function getUserResource()
    {
        if ($this->userResource === null) {
            $this->userResource = new UserResource(
                $this->client,
                $this->responseTransformer
            );
        }

        return $this->userResource;
    }

    /**
     * @return GroupResource
     */
    public function getGroupResource()
    {
        if ($this->groupResource === null) {
            $this->groupResource = new GroupResource(
                $this->client,
                $this->responseTransformer
            );
        }

        return $this->groupResource;
    }

    /**
     * @return InvitationResource
     */
    public function getInvitationResource()
    {
        if ($this->invitationResource === null) {
            $this->invitationResource = new InvitationResource(
                $this->client,
                $this->responseTransformer
            );
        }

        return $this->invitationResource;
    }
}
