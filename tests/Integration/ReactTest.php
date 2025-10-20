<?php

namespace Yuges\Reactable\Tests\Integration;

use Yuges\Reactable\Tests\TestCase;
use Yuges\Reactable\Models\Reaction;
use Yuges\Reactable\Tests\Stubs\Models\Post;
use Yuges\Reactable\Tests\Stubs\Models\User;
use Yuges\Reactable\Enums\ReactionType as EnumsReactionType;

class ReactTest extends TestCase
{
    public function testReactPosts()
    {
        config(['reactable.models.reactor.allowed.classes' => [User::class]]);

        $user = User::query()->create([
            'name' => 'Georgy',
            'email' => 'goshasafonov@yandex.ru',
            'password' => 'test',
        ]);
        $post = Post::query()->create([
            'title' => 'Post',
        ]);

        $reaction = $post->toggleReact(EnumsReactionType::Like, $user);
        $reaction = $post->toggleReact(EnumsReactionType::Like, $user);

        $this->assertEquals(null, $reaction);

        $reaction = $post->toggleReact(EnumsReactionType::Like, $user);
        $type = $post->getReactionType(EnumsReactionType::Like);

        $this->assertDatabaseHas(Reaction::getTableName(), [
            'reactable_id' => $post->getKey(),
            'reactable_type' => $post->getMorphClass(),
            'reactor_id' => $user->getKey(),
            'reactor_type' => $user->getMorphClass(),
            'reaction_type_id' => $type->id,
        ]);

        $reaction = $post->toggleReact(EnumsReactionType::Dislike, $user);
        $type = $post->getReactionType(EnumsReactionType::Dislike);

        $this->assertDatabaseHas(Reaction::getTableName(), [
            'reactable_id' => $post->getKey(),
            'reactable_type' => $post->getMorphClass(),
            'reactor_id' => $user->getKey(),
            'reactor_type' => $user->getMorphClass(),
            'reaction_type_id' => $type->id,
        ]);
    }
}
