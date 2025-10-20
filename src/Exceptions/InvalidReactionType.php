<?php

namespace Yuges\Reactable\Exceptions;

use Exception;
use TypeError;
use Yuges\Reactable\Models\ReactionType;

class InvalidReactionType extends Exception
{
    public static function doesNotImplementReactionType(string $class): TypeError
    {
        $type = ReactionType::class;

        return new TypeError("Reaction type class `{$class}` must implement `{$type}`");
    }
}
