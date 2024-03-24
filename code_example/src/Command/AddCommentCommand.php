<?php

declare(strict_types=1);

namespace Senuto\Command;

use Ramsey\Uuid\UuidInterface;
use Senuto\Service\CommandInterface;

/** @see AddCommentCommandHandler */
final class AddCommentCommand implements CommandInterface
{
    public function __construct(
        public readonly UuidInterface $postId,
        public readonly string $content,
    ) {
    }
}
