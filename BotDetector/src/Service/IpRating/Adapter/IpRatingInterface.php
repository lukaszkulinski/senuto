<?php

declare(strict_types=1);

namespace Senuto\BotDetector\Service\IpRating\Adapter;

interface IpRatingInterface
{
    public function getRating(string $ip): int;
}
