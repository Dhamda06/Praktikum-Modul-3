<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditNoteTest extends DuskTestCase
{
    /**
     * A Dusk test for editing a note.
     */
    public function testEditNote(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/login')
                ->type('email', 'hamdan@gmail.com') 
                ->type('password', 'dhani23')
                ->press('LOG IN')
                ->assertPathIs('/dashboard')
                ->clickLink('Notes')
                ->assertPathIs('/notes')
                ->with('.note-list', function ($noteList) {
                    $noteList->assertSee('Catatan Uji Coba');
                    $noteList->element('//div[contains(., "Catatan Uji Coba")]//a[contains(text(), "Edit")]')->click();
                })

                ->assertPathContains('/notes/')
                ->assertInputValue('title', 'Catatan Uji Coba')
                ->type('title', 'Catatan Uji Coba - Versi Baru')
                ->type('description', 'Isi catatan ini sudah diedit menggunakan Laravel Dusk.')
                ->press('UPDATE')
                ->assertSee('Catatan Uji Coba - Versi Baru');
        });
    }
}