<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class KandidatTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_guest()
    {
        $response = $this->get('/kandidat');
        $response->assertStatus(403);
    }

    public function test_user()
    {
        $user = User::find(2);
        $response = $this->actingAs($user)->get('/kandidat');
        $response->assertStatus(403);
    }

    public function test_admin()
    {
        $admin = User::find(1);
        $response = $this->actingAs($admin)->get('/kandidat');
        $response->assertStatus(200);
    }
}
