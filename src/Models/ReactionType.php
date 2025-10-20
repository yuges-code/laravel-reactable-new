<?php

namespace Yuges\Reactable\Models;

use Yuges\Package\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $weight
 * @property string $name
 * @property string $icon
 */
class ReactionType extends Model
{
    use HasFactory;

    protected $table = 'reaction_types';

    protected $guarded = ['id'];
}
