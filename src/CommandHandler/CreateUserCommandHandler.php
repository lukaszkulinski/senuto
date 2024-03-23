<?php

declare(strict_types=1);

namespace Senuto\CommandHandler;

use Exception;
use Senuto\Command\CreateUserCommand;
use Senuto\Entity\User;
use Senuto\Repository\UserRepositoryInterface;

final class CreateUserCommandHandler
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository,
    ) {
    }

    public function __invoke(CreateUserCommand $command): void
    {
        if (preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $command->email)) {
            throw new Exception('The email address is invalid.');
        }

        $user = new User($command->email, $command->username);
        $this->userRepository->save($user);
    }
}
