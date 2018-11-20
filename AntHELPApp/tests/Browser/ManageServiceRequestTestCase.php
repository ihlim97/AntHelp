<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ManageServiceRequestTestCase extends DuskTestCase
{
    /**
     * Visit login page for senior citizen
     */
    public function testLaunchApplication() {
        $this->browse(function ($browser) {
            $browser->visit('/login')
            ->assertSee('Senior Citizen Login');
        });
    }


    /**
     * Login to senior citizen account
     */
    public function testSeniorLogin() {
        $this->browse(function($browser) {
            $browser->type('email', 'ys@test.com')
            ->type('password', 'secret')
            ->press('LOGIN')
            ->assertPathIs('/home');;
        });
    }

}
