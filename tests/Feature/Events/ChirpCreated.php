<?php

namespace Tests\Feature\Events;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChirpCreated extends TestCase
{
    public function test_chirp_created_event_is_dispatched()
    {
        Event::fake();

        $user = User::factory()->create();

        $this->actingAs($user);

        $this->post(route('chirps.store'),['message' => 'test new message']);

        Event::assertDispatched(ChirpCreated::class);
    }
}
