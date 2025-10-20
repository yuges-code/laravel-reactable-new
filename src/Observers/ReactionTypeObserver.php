<?php

namespace Yuges\Reactable\Observers;

use Yuges\Reactable\Models\ReactionType;

class ReactionTypeObserver
{
    public function saving(ReactionType $type): void
    {

    }

    public function deleted(ReactionType $type): void
    {

    }
}
