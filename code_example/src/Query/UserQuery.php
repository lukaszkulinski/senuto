<?php

declare(strict_types=1);

namespace Senuto\Query;

use Senuto\Entity\User;

class UserQuery implements UserQueryInterface
{
    public function getByEmail(string $email): User
    {
    }
}
