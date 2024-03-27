<?php

declare(strict_types=1);

namespace Senuto\BotDetector\Service\Strategy;

use LogicException;
use Senuto\BotDetector\BotDetector;

final class ValidationStrategy
{
    /**
     * @param ValidationStrategyInterface[] $strategies
     */
    public function __construct(
        private readonly iterable $strategies,
    ) {
    }

    /**
     * @throws LogicException
     */
    public function determineStrategies(BotDetector $botDetector): array
    {
        $strategies = [];
        foreach ($this->strategies as $strategy) {
            if ($strategy->support($botDetector)) {
                $strategies[] = $strategy;
            }
        }

        if (!empty($strategies)) {
            return $strategies;
        }

        throw new LogicException('The given detector is not supported.');
    }
}
