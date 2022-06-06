<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class KandidatTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
        ->get('/articles');

        $response->assertStatus(200);
    }

    public function test_admin()
    {
        // $this->withoutMiddleware();
        // Login as a user
        $this->actingAs(User::factory()->create());
        // Simulate a GET request to the given URL
        $response = $this->get('/kandidat');
        // Check the response, we should have been
        // redirected to the homepage
        $response->assertStatus(403);
    }
}
