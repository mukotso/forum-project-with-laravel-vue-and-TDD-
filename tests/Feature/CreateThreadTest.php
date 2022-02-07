<?php

namespace Tests\Feature;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateThreadTest extends TestCase
{

use DatabaseMigrations;



public function test_guest_may_not_create_thread(){
    $this->expectException('Illuminate\Auth\AuthenticationException');
    $thread=Thread::factory()->make();
   $this->post('/threads',$thread->toArray());

}

    public function test_guest_cannot_see_Create_thread_page(){
        $this->post('/threads/create')
            ->assertRedirect('/login');

    }

    public function test_an_authenticated_user_can_Create_new_thread ()
    {
        //Given we have a signed in user
        $this->actingAs(User::factory()->create());
        //when we hit the end point to create a thread
        $thread=Thread::factory()->make();

        $response=$this->post('/threads',$thread->toArray());
       $this->get($thread->path())->assertSee($thread->title);

    }


}
