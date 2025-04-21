<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateNoteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testCreateNote(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/login')
                ->type('email', 'hamdan@gmail.com') 
                ->type('password', 'dhani23') 
                ->press('LOG IN')          
                ->assertPathIs('/dashboard')         

          
                ->clickLink('Notes')                     
                ->assertPathIs('/notes')               
                ->clickLink('Create Note')                   
                ->type('title', 'Catatan Uji Coba')    
                ->type('description', 'Ini adalah isi dari catatan ujicoba Laravel Dusk.')
                ->press('CREATE')                       
                ->assertSee('Catatan Uji Coba');    
            });
        }
}