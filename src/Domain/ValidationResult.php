<?php

namespace ToniIlic\WCCartRules\Domain;

defined( 'ABSPATH' ) || exit;

class ValidationResult
{
    private bool $isValid;
    private string $errorMessage;

    public function __construct(bool $isValid, string $errorMessage = '')
    {
        $this->isValid = $isValid;
        $this->errorMessage = $errorMessage;
    }

    public static function success(): self
    {
        return new self(true);
    }

    public static function failure(string $message): self
    {
        return new self(false, $message);
    }

    public function isValid(): bool
    {
        return $this->isValid;
    }

    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }
}
