<?php

declare(strict_types=1);

namespace Senuto\Command;

use Senuto\Service\CommandInterface;

/** @see CreatePostCommandHandler */
final class CreatePostCommand implements CommandInterface
{
    public function __construct(
        public readonly string $string,
        public readonly string $content,
    ) {
    }
}
