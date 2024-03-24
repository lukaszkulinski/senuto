<?php

declare(strict_types=1);

namespace Senuto\Service;

interface CommandBusInterface
{
    public function dispatch(CommandInterface $command): void;
}
