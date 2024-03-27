<?php

declare(strict_types=1);

namespace Senuto\BotDetector\Dto;

final class DetectResult
{
    public function __construct(
        public bool $isBot = false,
        public array $errors = [],
    ) {
    }
}
