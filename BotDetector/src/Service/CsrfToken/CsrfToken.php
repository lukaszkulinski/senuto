<?php

declare(strict_types=1);

namespace Senuto\BotDetector\Service\CsrfToken;

class CsrfToken
{
    public static function generate(): string
    {
        return bin2hex(random_bytes(32));
    }

    public static function validate(?string $requestedToken, string $sessionToken): bool
    {
        return $requestedToken && $requestedToken === $sessionToken;
    }
}
