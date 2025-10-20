<?php

// Config for yuges/reactable

return [
    /*
     * FQCN (Fully Qualified Class Name) of the models to use for reactions
     */
    'models' => [
        'type' => [
            'key' => [
                'has' => true,
                'type' => Yuges\Package\Enums\KeyType::BigInteger,
            ],
            'table' => 'reaction_types',
            'class' => Yuges\Reactable\Models\ReactionType::class,
            'observer' => Yuges\Reactable\Observers\ReactionTypeObserver::class,
        ],
        'reaction' => [
            'key' => [
                'has' => true,
                'type' => Yuges\Package\Enums\KeyType::BigInteger,
            ],
            'table' => 'reactions',
            'class' => Yuges\Reactable\Models\Reaction::class,
            'observer' => Yuges\Reactable\Observers\ReactionObserver::class,
        ],
        'reactable' => [
            'key' => [
                'has' => false,
                'type' => Yuges\Package\Enums\KeyType::BigInteger,
            ],
            'allowed' => [
                'classes' => [
                    // \App\Models\User::class,
                ],
            ],
            'relation' => [
                'name' => 'reactable',
            ],
            'observer' => Yuges\Reactable\Observers\ReactableObserver::class,
        ],
        'reactor' => [
            'key' => [
                'has' => true,
                'type' => Yuges\Package\Enums\KeyType::BigInteger,
            ],
            'default' => [
                'class' => \App\Models\User::class,
            ],
            'allowed' => [
                'classes' => [
                    \App\Models\User::class,
                ],
            ],
            'relation' => [
                'name' => 'reactor',
            ],
            'observer' => Yuges\Reactable\Observers\ReactorObserver::class,
        ],
    ],

    'types' => Yuges\Reactable\Enums\ReactionType::class,
    'icons' => Yuges\Reactable\Enums\ReactionIcon::class,
    'weights' => Yuges\Reactable\Enums\ReactionWeight::class,

    'permissions' => [
        'anonymous' => false,
        'duplicate' => false,
    ],

    'actions' => [
        'create' => Yuges\Reactable\Actions\CreateReactionAction::class,
        'toggle' => Yuges\Reactable\Actions\ToggleReactionAction::class,
    ],
];
