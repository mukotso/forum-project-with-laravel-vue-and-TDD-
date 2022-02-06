<?php

namespace Tests\Feature;

use App\Models\Reply;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Auth\AuthenticationException;

class ParticipateInForumTest extends TestCase
{
 use DatabaseMigrations;
    public function test_an_authenticated_user_may_participate_in_forum_thread()
    {
       //given we have an authenticated user


        $this->be(User::factory()->create());
        //and an existing thread
        $thread=Thread::factory()->create();
//        when a user adds areply to the thread
        $reply=Reply::factory()->make();
        $this->post($thread->path().'/replies',$reply->toArray());
//    The reply should be visible in the page
        $this->get($thread->path())
            ->assertSee($reply->body);
    }

    public function test_unauthenticated_user_may_not_add_replies()
    {

        $this->withoutExceptionHandling();
        $this->expectException(AuthenticationException::class);
        $this->post('/threads/1/replies', [])
            ->assertRedirect('/login');
    }
}
