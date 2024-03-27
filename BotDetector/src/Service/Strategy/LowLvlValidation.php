<?php

declare(strict_types=1);

namespace Senuto\BotDetector\Service\Strategy;

use Senuto\BotDetector\BotDetector;
use Senuto\BotDetector\Dto\ValidationResult;

final class LowLvlValidation implements ValidationStrategyInterface
{
    public function support(BotDetector $botDetector): bool
    {
        return BotDetector::VALIDATION_LVL_LOW <= $botDetector->getValidationLvl();
    }

    public function execute(BotDetector $botDetector): ValidationResult
    {
        $now = microtime(true);
        $session = $botDetector->getSession();
        $timeDuration = $now - $session['form_start_time'];

        if ($timeDuration < $botDetector->getMinInputTime() || $timeDuration > $botDetector->getMaxInputTime()) {
            return new ValidationResult(
                isValid: false,
                error: 'Form submission time exceeds the time limit.'
            );
        }

        return new ValidationResult(isValid: true);
    }
}
