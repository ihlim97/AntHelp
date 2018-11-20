<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use \App\User;
use \App\ServiceRequest;
use \App\ServiceProvider;
use \App\Service;
use Carbon\Carbon;

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

    /**
     * Go to Services page
     */
    public function testVisitServicesPage() {
        $this->browse(function($browser) {
            $browser->visit('/myservices')
            ->assertSee('Manage your services');
        });
    }

    /**
     * Verify if page contains a list of cards with each request made by the Senior Citizen
     */
    public function testVerifyPageHasListOfRequests() {
        $this->browse(function($browser) {
            $browser->assertPresent('.requests-tabbed-nav');
        });
    }

    /**
     * For services which status is set to “PENDING”, senior citizens can cancel it.
     */
    public function testSeniorCanCancelPendingRequest() {

        $this->browse(function($browser) {
            $browser->click('a[href="#pending"]')
            ->waitFor('.tab-pane#pending')
            ->assertPresent('.tab-pane#pending .senior-request-card')
            ->click('.tab-pane#pending .senior-request-card button.dropdown-toggle')
            ->click('.tab-pane#pending .senior-request-card .dropdown-menu button')
            ->waitFor('.modal#request-confirmation')
            ->press('OK')->waitForReload();
        });

        $latestCancelled = ServiceRequest::where('status', 'CANCELLED')->orderByDesc('updated_at')->first();

        $this->browse(function($browser) use ($latestCancelled){
            $browser->click('a[href="#cancelled"]')
            ->waitFor('.tab-pane#cancelled')
            ->assertVisible('.tab-pane#cancelled .senior-request-card[data-service-request-id="'.$latestCancelled->id.'"]');
        });
    }

    /**
     * For services which status is set to “PENDING”, senior citizens can cancel it.
     */
    public function testSeniorCanMarkAcceptedRequestsAsComplete() {

        $this->browse(function($browser) {
            $browser->click('a[href="#accepted"]')
            ->waitFor('.tab-pane#accepted')
            ->assertPresent('.tab-pane#accepted .senior-request-card')
            ->click('.tab-pane#accepted .senior-request-card:first-child button.dropdown-toggle')
            ->click('.tab-pane#accepted .senior-request-card:first-child .dropdown-menu button')
            ->waitFor('.modal#request-confirmation')
            ->press('OK')->waitForReload();
        });

        $latestComplete = ServiceRequest::where('status', 'COMPLETED')->orderByDesc('updated_at')->first();

        $this->browse(function($browser) use ($latestComplete){
            $browser->click('a[href="#completed"]')
            ->waitFor('.tab-pane#completed')
            ->assertVisible('.tab-pane#completed .senior-request-card[data-service-request-id="'.$latestComplete->id.'"]');
        });
    }

    /**
     * For services which status is set to “EXPIRED” or “CANCELLED”, senior citizens can delete it.
     */
    public function testSeniorCanCancelRequest() {
        $beforeTestExpired = count(ServiceRequest::where('status', 'EXPIRED')->get());
        $this->browse(function($browser) {
            $browser->click('a[href="#expired"]')
            ->waitFor('.tab-pane#expired')
            ->click('.tab-pane.active .senior-request-card button.dropdown-toggle')
            ->click('.tab-pane.active .senior-request-card .dropdown-menu button')
            ->waitForReload();
        });

        assertTrue($beforeTestExpired > count(ServiceRequest::where('status', 'EXPIRED'))->get());
    }

}
