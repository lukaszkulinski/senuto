<?php

declare(strict_types=1);

namespace Senuto\Query;

interface UserQueryInterface
{
    /**
     * @throws UserNotFoundException
     */
    public function getByEmail(string $email): User;
}
