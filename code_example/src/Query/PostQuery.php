<?php

declare(strict_types=1);

namespace Senuto\Query;

use Senuto\Entity\Post;

class PostQuery implements PostQueryInterface
{
    public function getById(Uuid $id): Post
    {
    }
}
