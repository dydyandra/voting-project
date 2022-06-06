<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    use DatabaseMigrations;

    public function test_register()
    {
        $this->seed();

        $this->browse(function ($browser) {
            $browser->visit('/register')
                ->type('name', 'testing')
                ->type('email', 'testing@mail.com')
                ->type('password', 'testing123')
                ->type('password_confirmation', 'testing123')
                ->press('register')
                ->assertPathIs('/articles');
        });
    }
}
