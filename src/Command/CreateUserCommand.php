<?php

declare(strict_types=1);

namespace Senuto\Command;

use Senuto\Service\CommandInterface;

/** @see CreateUserCommandHandler */
final class CreateUserCommand implements CommandInterface
{
    public function __construct(
        public readonly string $email,
        public readonly string $username,
    ) {
    }
}
