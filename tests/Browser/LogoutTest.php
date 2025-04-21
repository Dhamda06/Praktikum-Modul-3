<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LogoutTest extends DuskTestCase
{
    /**
     * A Dusk test for logging out.
     */
    public function testLogout(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/login')
                ->type('email', 'hamdan@gmail.com') 
                ->type('password', 'dhani23')
                ->press('LOG IN')
                ->assertPathIs('/dashboard')
                ->click('@user-dropdown') 
                ->clickLink('Logout')
                ->assertPathIs('/login')
                ->assertSee('LOG IN');
        });
    }
}