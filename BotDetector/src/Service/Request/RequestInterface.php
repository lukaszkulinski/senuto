<?php

declare(strict_types=1);

namespace Senuto\BotDetector\Service\Request;

interface RequestInterface
{
    public function getClientIp(): string;

    /**
     * @throws Exception
     */
    public function isRequestValid();
}
