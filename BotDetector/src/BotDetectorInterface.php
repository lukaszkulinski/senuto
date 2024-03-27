<?php

declare(strict_types=1);

namespace Senuto\BotDetector;

use Senuto\BotDetector\Dto\DetectResult;

interface BotDetectorInterface
{
    public function detect(): DetectResult;
}
