<?php

declare(strict_types=1);

namespace Senuto\BotDetector\Dto;

final class ValidationResult
{
    public function __construct(
        public bool $isValid = false,
        public ?string $error = null,
    ) {
    }
}
