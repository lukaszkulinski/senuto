<?php

declare(strict_types=1);

namespace Senuto\Email\Message;

abstract class AbstractMessage implements MessageInterface
{
    public function getHtmlTemplate(): ?string
    {
        return null;
    }

    public function getTextTemplate(): ?string
    {
        return null;
    }

    /**
     * @return array<string, mixed>
     */
    public function getContext(): array
    {
        return [];
    }
}
