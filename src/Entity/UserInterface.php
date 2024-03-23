<?php

declare(strict_types=1);

namespace Senuto\Entity;

interface UserInterface
{
    public function getUserIdentifier(): string;
}
