<?php

declare(strict_types=1);

namespace Senuto\Entity;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Senuto\Entity\Traits\TimestampableTrait;

class Comment
{
    use TimestampableTrait;

    private int $id;

    private User $author;

    private string $content;

    public function __construct(User $author, string $content)
    {
        $this->id = Uuid::uuid4();
        $this->author = $author;
        $this->content = $content;
        $this->createdAt = new DateTime();
        $this->updatedAt = new DateTime();
    }

    public function getId(): ?UuidInterface
    {
    }

    public function getAuthor(): ?User
    {
    }

    public function getContent(): ?string
    {
    }
}
