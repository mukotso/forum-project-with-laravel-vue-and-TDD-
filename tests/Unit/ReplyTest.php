<?php

namespace Tests\Unit;

use App\Models\Reply;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ReplyTest extends TestCase
{
    use DatabaseMigrations;
    public function test_reply_has_an_owner()
    {
        $reply = Reply::factory()->create();
        $this->assertInstanceOf(User::class, $reply->owner);


    }

    public function test_a_thread_has_a_user(){
        //given we have a thread

        $thread=Thread::factory()->create();

        //we should see replies when we visit that page
        $this->assertInstanceOf(User::class,$thread->creator);
    }
}
