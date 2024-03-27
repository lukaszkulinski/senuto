<?php

declare(strict_types=1);

namespace Senuto\BotDetector\Service\IpRating\Adapter;

final class IpRating implements IpRatingInterface
{
    public function __construct(
        private readonly IpqsApi $ipqsApi
    ) {
    }

    public function getRating(string $ip): int
    {
        return $this->ipqsApi->fetchRating($ip);
    }
}
