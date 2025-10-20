<?php

namespace Yuges\Reactable\Models;

use Yuges\Package\Models\Model;
use Yuges\Reactable\Traits\HasReactionType;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $reactor_id
 * @property string $reactor_type
 * @property int $reactable_id
 * @property string $reactable_type
 */
class Reaction extends Model
{
    use HasFactory, HasReactionType;

    protected $table = 'reactions';

    protected $guarded = ['id'];

    public function reactor(): BelongsTo
    {
        return $this->morphTo();
    }

    public function reactable(): MorphTo
    {
        return $this->morphTo();
    }
}
