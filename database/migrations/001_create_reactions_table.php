<?php

use Yuges\Package\Enums\KeyType;
use Yuges\Reactable\Config\Config;
use Yuges\Reactable\Models\Reaction;
use Yuges\Reactable\Models\ReactionType;
use Yuges\Package\Database\Schema\Schema;
use Yuges\Package\Database\Schema\Blueprint;
use Yuges\Package\Database\Migrations\Migration;

return new class extends Migration
{
    public function __construct()
    {
        $this->table = Config::getReactionClass(Reaction::class)::getTableName();
    }

    public function up(): void
    {
        if (Schema::hasTable($this->table)) {
            return;
        }

        Schema::create($this->table, function (Blueprint $table) {
            if (Config::getReactionKeyHas(true)) {
                $table->key(Config::getReactionKeyType(KeyType::BigInteger));
            }

            Config::getPermissionsAnonymous(false)
                ? $table->nullableKeyMorphs(
                    Config::getReactorKeyType(KeyType::BigInteger),
                    Config::getReactorRelationName('reactor'),
                )
                : $table->keyMorphs(
                    Config::getReactorKeyType(KeyType::BigInteger),
                    Config::getReactorRelationName('reactor'),
                );

            $table->keyMorphs(
                Config::getReactableKeyType(KeyType::BigInteger),
                Config::getReactableRelationName('reactable'),
            );

            $table
                ->foreignIdFor(Config::getReactionTypeClass(ReactionType::class))
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->timestamps();

            if (! Config::getPermissionsDuplicate(false)) {
                $table->unique([
                    'reactor_id',
                    'reactor_type',
                    'reactable_id',
                    'reactable_type',
                ]);
            }
        });
    }
};
