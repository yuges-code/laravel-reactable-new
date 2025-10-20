<?php

namespace Yuges\Reactable\Tests\Feature;

use Yuges\Reactable\Tests\TestCase;
use Yuges\Reactable\Tests\Stubs\Models\User;

class HasTableTest extends TestCase
{
    public function testGettingTableName()
    {
        $this->assertEquals('users', User::getTableName());
    }
}
