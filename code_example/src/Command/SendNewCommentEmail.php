<?php

declare(strict_types=1);

namespace Senuto\Command;

use Senuto\CommandHandler\SendNewCommentEmailHandler;

/** @see SendNewCommentEmailHandler */
final class SendNewCommentEmail
{
    public function __construct(
        public readonly string $email,
    ) {
    }
}
