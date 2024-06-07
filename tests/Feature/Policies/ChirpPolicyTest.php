<?php

namespace Tests\Feature\Policies;

use Tests\TestCase;
use App\Models\User;
use App\Models\Chirp;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChirpPolicyTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_policy_returns_true_if_chirp_to_be_updated_belongs_to_user()
    {
        $chirp = Chirp::factory()->create();

        $this->assertTrue($chirp->user->can('update', $chirp));
    }

    public function test_policy_returns_false_if_chirp_to_be_updated_does_not_belongs_to_user()
    {
        $user = User::factory()->create();

        $chirp = Chirp::factory()->create();

        $this->assertFalse($user->can('update', $chirp));
    }

    public function test_policy_returns_true_if_chirp_to_be_deleted_belongs_to_user()
    {
        $chirp = Chirp::factory()->create();

        $this->assertTrue($chirp->user->can('delete', $chirp));
    }

    public function test_policy_returns_false_if_chirp_to_be_deleted_does_not_belongs_to_user()
    {
        $user = User::factory()->create();

        $chirp = Chirp::factory()->create();

        $this->assertFalse($user->can('update', $chirp));
    }
}
