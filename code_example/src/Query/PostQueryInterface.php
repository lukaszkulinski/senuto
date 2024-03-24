<?php

declare(strict_types=1);

namespace Senuto\Query;

interface PostQueryInterface
{
    /**
     * @throws PostNotFoundException
     */
    public function getById(Uuid $id): Post;
}
