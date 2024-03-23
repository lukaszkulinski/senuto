<?php

declare(strict_types=1);

namespace Senuto\Repository;

use Senuto\Entity\User;

interface UserRepositoryInterface
{
    public function save(User $entity): void;
}
