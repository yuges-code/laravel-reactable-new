<?php

namespace Yuges\Reactable\Tests\Stubs\Models;

use Yuges\Package\Models\Model;
use Yuges\Reactable\Traits\CanReact;
use Yuges\Reactable\Interfaces\Reactor;

class User extends Model implements Reactor
{
    use CanReact;

    protected $table = 'users';

    protected $guarded = ['id'];
}
