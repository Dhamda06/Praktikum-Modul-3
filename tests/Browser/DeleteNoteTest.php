<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteNoteTest extends DuskTestCase
{
    /**
     * A Dusk test for deleting a note.
     */
    public function testDeleteNote(): void
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
                    $noteList->element('//div[contains(., "Catatan Uji Coba")]//button[contains(text(), "Delete")]')->click();
                })
                ->whenAvailable('dialog[open]', function ($dialog) {
                    $dialog->accept(); 
                })
                ->pause(1000) 
                ->assertDontSee('Catatan Uji Coba');
        });
    }
}