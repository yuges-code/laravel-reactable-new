<?php

namespace Yuges\Reactable\Providers;

use Yuges\Package\Data\Package;
use Yuges\Reactable\Config\Config;
use Yuges\Reactable\Models\Reaction;
use Database\Seeders\ReactionTypeSeeder;
use Yuges\Reactable\Models\ReactionType;
use Yuges\Reactable\Observers\ReactionObserver;
use Yuges\Reactable\Exceptions\InvalidReaction;
use Yuges\Package\Providers\PackageServiceProvider;
use Yuges\Reactable\Observers\ReactionTypeObserver;
use Yuges\Reactable\Exceptions\InvalidReactionType;

class ReactableServiceProvider extends PackageServiceProvider
{
    protected string $name = 'laravel-reactable';

    public function configure(Package $package): void
    {
        $reaction = Config::getReactionClass(Reaction::class);
        $type = Config::getReactionTypeClass(ReactionType::class);

        if (! is_a($reaction, Reaction::class, true)) {
            throw InvalidReaction::doesNotImplementReaction($reaction);
        }

        if (! is_a($type, ReactionType::class, true)) {
            throw InvalidReactionType::doesNotImplementReactionType($type);
        }

        $package
            ->hasName($this->name)
            ->hasConfig('reactable')
            ->hasMigrations([
                '000_create_reaction_types_table',
                '001_create_reactions_table',
            ])
            ->hasSeeder(ReactionTypeSeeder::class)
            ->hasObserver($reaction, Config::getReactionObserverClass(ReactionObserver::class))
            ->hasObserver($type, Config::getReactionTypeObserverClass(ReactionTypeObserver::class));
    }
}
