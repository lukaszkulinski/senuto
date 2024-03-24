<?php

declare(strict_types=1);

namespace Senuto\Entity;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Senuto\Entity\Traits\TimestampableTrait;

class User implements UserInterface
{
    use TimestampableTrait;

    private UuidInterface $id;

    private ?string $email = null;

    private ?string $username = null;

    public function __construct(string $email, string $username)
    {
        $this->id = Uuid::uuid4();
        $this->email = $email;
        $this->username = $username;
        $this->createdAt = new DateTime();
        $this->updatedAt = new DateTime();
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    public function getId(): ?UuidInterface
    {
    }

    public function getEmail(): ?string
    {
    }

    public function getUsername(): ?string
    {
    }
}
