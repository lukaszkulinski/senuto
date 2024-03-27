<?php

declare(strict_types=1);

namespace Senuto\BotDetector\Service\Strategy;

use Senuto\BotDetector\BotDetector;
use Senuto\BotDetector\Dto\ValidationResult;

final class HighLvlValidation implements ValidationStrategyInterface
{
    public function __construct(
        private readonly IpRatingInterface $ipRating,
    ) {
    }

    public function support(BotDetector $botDetector): bool
    {
        return BotDetector::VALIDATION_LVL_HIGH <= $botDetector->getValidationLvl();
    }

    public function execute(BotDetector $botDetector): ValidationResult
    {
        $rating = $this->ipRating->getRating(
            $botDetector->getRequest()->getClientIp()
        );

        if ($rating < 50) {
            return new ValidationResult(
                isValid: false,
                error: 'Reputation of client IP is to low.'
            );
        }

        return new ValidationResult(isValid: true);
    }
}
