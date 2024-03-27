<?php

declare(strict_types=1);

namespace Senuto\BotDetector\Service\Request;

use Senuto\BotDetector\Service\CsrfToken\CsrfToken;


final class HttpRequest implements RequestInterface
{
    public function __construct(
        private array $request = [],
        private array $server = [],
        private array $session = [],
    ) {
    }
    public function getRequest(): array
    {
        return $this->request;
    }

    public function getServer(): array
    {
        return $this->server;
    }

    public function getSession(): array
    {
        return $this->session;
    }

    public function getClientIp(): string
    {
        $server = $this->getServer();

        return isset($server['HTTP_X_FORWARDED_FOR']) ?
            $server['HTTP_X_FORWARDED_FOR'] :
            $server['REMOTE_ADDR'];
    }

    public function isRequestValid(): bool
    {
        $request = $this->getRequest();
        $session = $this->getSession();

        return CsrfToken::validate($request['csrf_token'], $session['csrf_token']);
    }
}
