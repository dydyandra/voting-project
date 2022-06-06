<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LogoutTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    use DatabaseMigrations;

    public function test_logout()
    {
        $this->seed();

        $user = User::factory()->create([
            'email' => 'test@example.com',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/home')
                ->press('logout')
                ->assertPathIs('/articles');
        });
    }
}
