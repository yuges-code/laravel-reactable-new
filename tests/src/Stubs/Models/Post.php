<?php

namespace Yuges\Reactable\Tests\Stubs\Models;

use Yuges\Package\Models\Model;
use Yuges\Reactable\Traits\HasReactions;
use Yuges\Reactable\Interfaces\Reactable;

class Post extends Model implements Reactable
{
    use HasReactions;

    protected $table = 'posts';

    protected $guarded = ['id'];
}
