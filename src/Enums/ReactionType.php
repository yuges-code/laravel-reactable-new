<?php

namespace Yuges\Reactable\Enums;

use Yuges\Reactable\Traits\HasReactionTypeInterface;
use Yuges\Reactable\Interfaces\ReactionType as ReactionTypeInterface;

enum ReactionType: int implements ReactionTypeInterface
{
    use HasReactionTypeInterface;

    case Like = 10;
    case Dislike = 20;
}
