<?php

declare(strict_types=1);

namespace Senuto\BotDetector\Service\Strategy;

use Senuto\BotDetector\BotDetector;
use Senuto\BotDetector\Dto\ValidationResult;

interface ValidationStrategyInterface
{
    public function support(BotDetector $botDetector): bool;

    public function execute(BotDetector $botDetector): ValidationResult;
}
