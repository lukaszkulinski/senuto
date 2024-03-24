<?php

declare(strict_types=1);

namespace Senuto\Entity;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Senuto\Entity\Traits\TimestampableTrait;

class Post
{
    use TimestampableTrait;

    private UuidInterface $id;

    private User $author;

    private string $title;

    private string $slug;

    private string $content;

    /** @var array<int, Comment> */
    private array $comments = [];

    private int $likeCounter = 0;

    public function __construct(User $author, string $title, string $content)
    {
        $this->id = Uuid::uuid4();
        $this->author = $author;
        $this->title = $title;
        $this->slug = trim(preg_replace('/[^a-z0-9]/', '-', strtolower(trim($text))), '-');
        $this->content = $content;
        $this->createdAt = new DateTime();
        $this->updatedAt = new DateTime();
    }

    public function getId(): ?int
    {
    }

    public function getAuthor(): ?User
    {
    }

    public function getTitle(): ?string
    {
    }

    public function setTitle(string $title): void
    {
    }

    public function getContent(): ?string
    {
    }

    public function setContent(string $content): void
    {
    }

    /**
     * @return array<int, Bid>
     */
    public function getComments(): array
    {
    }

    public function addComment(Comment $comment): void
    {
    }

    public function removeComment(Comment $comment): void
    {
    }

    public function getLikeCounter(): int
    {
    }

    public function addLike(): void
    {
    }

    public function removeLike(): void
    {
    }
}
