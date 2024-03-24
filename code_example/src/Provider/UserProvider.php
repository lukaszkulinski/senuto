<?php

declare(strict_types=1);

namespace Senuto\Provider;

use Senuto\Entity\User;

final class UserProvider implements UserProviderInterface
{
    public function getUser(): User
    {
    }
}
