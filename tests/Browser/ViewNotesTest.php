<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ViewNotesTest extends DuskTestCase
{
    /**
     * A Dusk test for viewing notes.
     */
    public function testViewNotes(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/login')
                ->type('email', 'hamdan@gmail.com') 
                ->type('password', 'dhani23')       
                ->press('LOG IN')
                ->assertPathIs('/dashboard')
                ->clickLink('Notes')
                ->assertPathIs('/notes')
                ->assertSee('Catatan Uji Coba')         
                ->assertSee('Tugas Modul 3');    
        });
    }
}