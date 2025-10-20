<?php

use Yuges\Package\Enums\KeyType;
use Yuges\Reactable\Config\Config;
use Yuges\Reactable\Models\ReactionType;
use Yuges\Package\Database\Schema\Schema;
use Yuges\Package\Database\Schema\Blueprint;
use Yuges\Package\Database\Migrations\Migration;

return new class extends Migration
{
    public function __construct()
    {
        $this->table = Config::getReactionTypeClass(ReactionType::class)::getTableName();
    }

    public function up(): void
    {
        if (Schema::hasTable($this->table)) {
            return;
        }

        Schema::create($this->table, function (Blueprint $table) {
            if (Config::getReactionTypeKeyHas(true)) {
                $table->key(Config::getReactionTypeKeyType(KeyType::BigInteger));
            }

            $table->string('name')->unique();
            $table->string('icon')->unique();
            $table->integer('weight');

            $table->timestamps();
        });
    }
};
