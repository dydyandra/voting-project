<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class HomeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_redirectGuest()
    {
        $response = $this->get('/');
        $response->assertStatus(302);
        $response->assertRedirect('/articles');
    }

    public function test_redirectUser()
    {
        $user = User::find(2);
        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(302);
        $response->assertRedirect('/articles');
    }

    public function test_redirectAdmin()
    {
        $admin = User::find(1);
        $response = $this->actingAs($admin)->get('/');
        $response->assertStatus(302);
        $response->assertRedirect('/kandidat');
    }
}
