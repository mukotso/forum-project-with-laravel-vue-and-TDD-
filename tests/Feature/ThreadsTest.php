<?php

namespace Tests\Feature;

use App\Models\Thread;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadsTest extends TestCase
{
    //pull in the database migrations trait
use DatabaseMigrations;

    public function test_a_user_can_view_all_threads()
    {
        //create a threat and check if its seen in the threads page
        $thread=Thread::factory()->create();
        $response = $this->get('/threads');
        $response->assertSee($thread->title);
    }

    public function test_a_user_can_view_single_thread()
    {
        //create a threat and check if its seen in the threads page
        $thread=Thread::factory()->create();
        $response = $this->get('/threads/'.$thread->id);
        $response->assertSee($thread->title);

    }
}
