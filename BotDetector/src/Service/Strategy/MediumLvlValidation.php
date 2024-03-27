<?php

declare(strict_types=1);

namespace Senuto\BotDetector\Service\Strategy;

use Senuto\BotDetector\BotDetector;
use Senuto\BotDetector\Dto\ValidationResult;

final class MediumLvlValidation implements ValidationStrategyInterface
{
    public function support(BotDetector $botDetector): bool
    {
        return BotDetector::VALIDATION_LVL_MEDIUM <= $botDetector->getValidationLvl();
    }

    public function execute(BotDetector $botDetector): ValidationResult
    {
        $reqestData = $botDetector->getRequest()->getRequest();

        if (null !== $requestData['honeypot_field'] && '' !== $requestData['honeypot_field']) {
            return new ValidationResult(
                isValid: false,
                error: 'The form contains invalid fields.'
            );
        }

        return new ValidationResult(isValid: true);
    }
}
