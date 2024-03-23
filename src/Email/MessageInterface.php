<?php

declare(strict_types=1);

namespace Senuto\Email\Message;

interface MessageInterface
{
    public function getHtmlTemplate(): ?string;

    public function getTextTemplate(): ?string;

    public function getSubject(): string;

    /**
     * @return array<string, mixed>
     */
    public function getContext(): array;
}
