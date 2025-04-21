<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test for user registration.
     */
    public function testRegistrasi(): void
    {
        $this->browse(function (Browser $browser) { 
            $browser->visit('http://127.0.0.1:8000/register')
                    ->assertSee('REGISTER')
                    ->type('name', 'Dadan Hamdani')
                    ->type('email', 'hamdan@gmail.com')
                    ->type('password', 'dhani23')
                    ->type('password_confirmation', 'dhani23')
                    ->press('REGISTER')
                    ->assertPathIs('/dashboard');
        });
    }
}