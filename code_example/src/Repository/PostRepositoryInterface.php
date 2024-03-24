<?php

declare(strict_types=1);

namespace Senuto\Repository;

use Senuto\Entity\Post;

interface PostRepositoryInterface
{
    public function save(Post $entity): void;
}
