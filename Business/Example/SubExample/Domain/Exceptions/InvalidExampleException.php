<?php

namespace Business\Example\SubExample\Domain\Exceptions;

use Exception;

class InvalidExampleException extends Exception
{
    public static function example(string $message): self
    {
        return new self($message);
    }
}
