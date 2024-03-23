<?php

declare(strict_types=1);

namespace Senuto\Repository;

use Senuto\Entity\Comment;

interface CommentRepositoryInterface
{
    public function save(Comment $entity): void;
}
