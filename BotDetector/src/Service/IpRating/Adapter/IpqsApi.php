<?php

declare(strict_types=1);

namespace Senuto\BotDetector\Service\IpRating\Adapter;

class IpqsApi
{
    public function __construct(
        private readonly string $apiKey
    ) {
    }

    public function fetchRating(string $ip): int
    {
    }
}
