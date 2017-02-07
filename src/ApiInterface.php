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

use Zibios\WrikePhpLibrary\Resource\ContactResource;
use Zibios\WrikePhpLibrary\Resource\GroupResource;
use Zibios\WrikePhpLibrary\Resource\InvitationResource;
use Zibios\WrikePhpLibrary\Resource\UserResource;

/**
 * General Wrike Api Interface
 */
interface ApiInterface
{
    /**
     * @return string
     */
    public function getBearerToken();

    /**
     * @param string $bearerToken
     *
     * @return $this
     */
    public function setBearerToken($bearerToken);

    /**
     * @return ContactResource
     */
    public function getContactResource();

    /**
     * @return UserResource
     */
    public function getUserResource();

    /**
     * @return GroupResource
     */
    public function getGroupResource();

    /**
     * @return InvitationResource
     */
    public function getInvitationResource();
}
