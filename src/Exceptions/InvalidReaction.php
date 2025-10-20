<?php

namespace Yuges\Reactable\Exceptions;

use Exception;
use TypeError;
use Yuges\Reactable\Models\Reaction;

class InvalidReaction extends Exception
{
    public static function doesNotImplementReaction(string $class): TypeError
    {
        $reaction = Reaction::class;

        return new TypeError("Reaction class `{$class}` must implement `{$reaction}`");
    }
}
