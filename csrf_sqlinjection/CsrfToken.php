<?php

class CsrfToken 
{
    public static function generate(): string
    {
        return bin2hex(random_bytes(32));
    }

    public static function validate(): bool
    {
        return $_POST['csrf_token'] && $_POST['csrf_token'] === $_SESSION['csrf_token'];
    }
}