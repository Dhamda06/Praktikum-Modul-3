<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/login')
                    ->assertSee('LOG IN')
                    ->type('email', 'hamdan@gmail.com')
                    ->type('password', 'dhani23')
                    ->press('LOG IN')
                    ->assertPathIs('/dashboard');
        });
    }
}