<?php

declare(strict_types=1);

namespace Senuto\CommandHandler;

use Senuto\Command\SendNewCommentEmail;
use Senuto\Email\Factory\EmailFactory;
use Senuto\Email\Message\NewCommentMessage;
use Senuto\Query\UserQuery;

final class SendNewCommentEmailHandler
{
    public function __construct(
        private readonly UserQuery $userQuery,
        private readonly EmailFactory $emailFactory,
    ) {
    }

    public function __invoke(SendNewCommentEmail $message): void
    {
        $user = $this->userQuery->getByEmail($message->email);
        if (!$user->getEmail()) {
            return;
        }

        $this->emailFactory->send(
            new NewCommentMessage(),
            $message->newEmail,
            [
                'username' => $user->getUsername(),
            ]
        );
    }
}
