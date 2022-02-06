<?php

namespace Tests\Unit;

u
use App\Models\Thread;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp():void{
        parent::setUp();
        $this->thread=Thread::factory()->create();
    }

    public function test_a_thread_has_replies()
    {

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->thread->replies);
    }

    public function test_a_thread_has_a_creator(){
        //given we have a thread

        //we should see replies when we visit that page
        $this->assertInstanceOf(User::class,$this->thread->creator);
    }

    public function test_a_thread_can_add_a_reply(){
        //given we have a thread

        $this->thread->addReply([
            "body"=>"foor",
                'user_id'=>1
                ]
        );

        $this->assertCount($this->thread->replies)
    }
}
