<?php

namespace Yuges\Reactable\Config;

use TypeError;
use Yuges\Package\Enums\KeyType;
use Illuminate\Support\Collection;
use Yuges\Reactable\Models\Reaction;
use Yuges\Reactable\Interfaces\Reactor;
use Yuges\Reactable\Models\ReactionType;
use Yuges\Reactable\Interfaces\Reactable;
use Yuges\Reactable\Observers\ReactorObserver;
use Yuges\Reactable\Observers\ReactionObserver;
use Yuges\Reactable\Observers\ReactableObserver;
use Yuges\Reactable\Actions\CreateReactionAction;
use Yuges\Reactable\Actions\ToggleReactionAction;
use Yuges\Reactable\Observers\ReactionTypeObserver;
use Yuges\Reactable\Interfaces\ReactionType as ReactionTypeInterface;
use Yuges\Reactable\Interfaces\ReactionIcon as ReactionIconInterface;
use Yuges\Reactable\Interfaces\ReactionWeight as ReactionWeightInterface;

class Config extends \Yuges\Package\Config\Config
{
    const string NAME = 'reactable';

    public static function getReactionTable(mixed $default = null): string
    {
        return self::get('models.reaction.table', $default);
    }

    /** @return class-string<Reaction> */
    public static function getReactionClass(mixed $default = null): string
    {
        return self::get('models.reaction.class', $default);
    }

    public static function getReactionKeyHas(mixed $default = null): bool
    {
        return self::get('models.reaction.key.has', $default);
    }

    public static function getReactionKeyType(mixed $default = null): KeyType
    {
        return self::get('models.reaction.key.type', $default);
    }

    /** @return class-string<ReactionObserver> */
    public static function getReactionObserverClass(mixed $default = null): string
    {
        return self::get('models.reaction.observer', $default);
    }

    public static function getReactionTypeTable(mixed $default = null): string
    {
        return self::get('models.type.table', $default);
    }

    /** @return class-string<ReactionType> */
    public static function getReactionTypeClass(mixed $default = null): string
    {
        return self::get('models.type.class', $default);
    }

    public static function getReactionTypeKeyHas(mixed $default = null): bool
    {
        return self::get('models.type.key.has', $default);
    }

    public static function getReactionTypeKeyType(mixed $default = null): KeyType
    {
        return self::get('models.type.key.type', $default);
    }

    /** @return class-string<ReactionTypeObserver> */
    public static function getReactionTypeObserverClass(mixed $default = null): string
    {
        return self::get('models.type.observer', $default);
    }

    public static function getReactableTable(mixed $default = null): string
    {
        return self::get('models.reactable.table', $default);
    }

    public static function getReactableKeyHas(mixed $default = null): bool
    {
        return self::get('models.reactable.key.has', $default);
    }

    public static function getReactableKeyType(mixed $default = null): KeyType
    {
        return self::get('models.reactable.key.type', $default);
    }

    public static function getReactableRelationName(mixed $default = null): string
    {
        return self::get('models.reactable.relation.name', $default);
    }

    /** @return Collection<array-key, class-string<Reactable>> */
    public static function getReactableAllowedClasses(mixed $default = null): Collection
    {
        return Collection::make(
            self::get('models.reactable.allowed.classes', $default)
        );
    }

    /** @return class-string<ReactableObserver> */
    public static function getReactableObserverClass(mixed $default = null): string
    {
        return self::get('models.reactable.observer', $default);
    }

    public static function getReactorKeyHas(mixed $default = null): bool
    {
        return self::get('models.reactor.key.has', $default);
    }

    public static function getReactorKeyType(mixed $default = null): KeyType
    {
        return self::get('models.reactor.key.type', $default);
    }

    public static function getReactorRelationName(mixed $default = null): string
    {
        return self::get('models.reactor.relation.name', $default);
    }

    /** @return class-string<Reactor> */
    public static function getReactorDefaultClass(mixed $default = null): string
    {
        return self::get('models.reactor.default.class', $default);
    }

    /** @return Collection<array-key, class-string<Reactor>> */
    public static function getReactorAllowedClasses(mixed $default = null): Collection
    {
        return Collection::make(
            self::get('models.reactor.allowed.classes', $default)
        );
    }

    /** @return class-string<ReactorObserver> */
    public static function getReactorObserverClass(mixed $default = null): string
    {
        return self::get('models.reactor.observer', $default);
    }

    public static function getToggleReactionAction(Reactable $reactable, mixed $default = null): ToggleReactionAction
    {
        return self::getToggleReactionActionClass($default)::create($reactable);
    }

    /** @return class-string<ToggleReactionAction> */
    public static function getToggleReactionActionClass(mixed $default = null): string
    {
        return self::get('actions.toggle', $default);
    }

    public static function getCreateReactionAction(Reactable $reactable, mixed $default = null): CreateReactionAction
    {
        return self::getCreateReactionActionClass($default)::create($reactable);
    }

    /** @return class-string<CreateReactionAction> */
    public static function getCreateReactionActionClass(mixed $default = null): string
    {
        return self::get('actions.create', $default);
    }

    /** @return class-string<ReactionTypeInterface> */
    public static function getReactionTypeEnumClass(mixed $default = null): string
    {
        $class = self::get('types', $default);

        if (! is_subclass_of($class, ReactionTypeInterface::class)) {
            throw new TypeError('Reaction type enum type error');
        }

        return $class;
    }

    /** @return class-string<ReactionIconInterface> */
    public static function getReactionIconEnumClass(mixed $default = null): string
    {
        $class = self::get('icons', $default);

        if (! is_subclass_of($class, ReactionIconInterface::class)) {
            throw new TypeError('Reaction icon enum type error');
        }

        return $class;
    }

    /** @return class-string<ReactionWeightInterface> */
    public static function getReactionWeightEnumClass(mixed $default = null): string
    {
        $class = self::get('weights', $default);

        if (! is_subclass_of($class, ReactionWeightInterface::class)) {
            throw new TypeError('Reaction weight enum type error');
        }

        return $class;
    }

    public static function getPermissionsAnonymous(mixed $default = false): bool
    {
        return self::get('permissions.anonymous', $default);
    }

    public static function getPermissionsDuplicate(mixed $default = false): bool
    {
        return self::get('permissions.duplicate', $default);
    }
}
