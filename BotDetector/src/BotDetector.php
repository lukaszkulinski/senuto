<?php

declare(strict_types=1);

namespace Senuto\BotDetector;

use Senuto\BotDetector\Dto\DetectResult;
use Senuto\BotDetector\Service\Request\HttpRequest;
use Senuto\BotDetector\Service\Strategy\ValidationStrategy;

class BotDetector implements BotDetectorInterface
{
    public const VALIDATION_LVL_LOW = 0;
    public const VALIDATION_LVL_MEDIUM = 1;
    public const VALIDATION_LVL_HIGH = 2;

    public function __construct(
        private readonly HttpRequest $request,
        private readonly int $validationLvl = self::VALIDATION_LVL_MEDIUM,
        private readonly int $minInputTime = 5,
        private readonly int $maxInputTime = 600,
    ) {
    }

    public function detect(): DetectResult
    {
        $errors = [];
        $detectResult = new DetectResult();
        $validationStrategy = new ValidationStrategy($strategies);

        $currentStrategies = $validationStrategy->determineStrategies(self);
        foreach ($currentStrategies as $strategy) {
            $validation = $strategy->execute(self);

            if (!$validation->isValid) {
                $detectResult->isBot = true;
                $errors[] = $validation;
            }
        }

        $detectResult->errors = $errors;

        return $detectResult;
    }

    public function getRequest(): HttpRequest
    {
        return $this->request;
    }

    public function getValidationLvl(): int
    {
        return $this->validationLvl;
    }

    public function getMinInputTime(): int
    {
        return $this->minInputTime;
    }

    public function getMaxInputTime(): int
    {
        return $this->maxInputTime;
    }
}
