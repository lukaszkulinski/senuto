<?php

declare(strict_types=1);

namespace Senuto\Provider;

use Senuto\Entity\User;
use Senuto\Exception\User\UserNotAuthenticatedException;

interface UserProviderInterface
{
    /**
     * @throws UserNotAuthenticatedException
     */
    public function getUser(): User;
}
