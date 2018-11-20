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

class MyTest extends DuskTestCase
{

    /**
     * Launch Application
     */
    public function testLaunchApplication() {
        $this->browse(function ($browser) {
            $browser->visit('/')
            ->assertTitle('AntHELP');
        });
    }

    /**
     * Click on the login button
     */
    public function testClickLoginButton() {
        $this->browse(function($browser) {
            $browser->click('.navbar-toggler')
            ->click('.login-btn')
            ->assertSee('Senior Citizen Login');
        });
    }

    /**
     * Click on “Login here” link beside “Are you a service provider”.
     */
    public function testClickServiceProviderLoginLink() {
        $this->browse(function($browser) {
            $browser->click('a.service-provider-login-link')
            ->assertSee('Service Provider Login');
        });
    }

    /**
     * Fill in service provider account information
     */
    public function testServiceProviderLogin() {
        $this->browse(function($browser) {
            $browser->type('email', 'iehowe@test.com')
            ->type('password', 'secret')
            ->press('LOGIN')
            ->assertPathIs('/serviceprovider');;
        });
    }

    /**
     * Visit the Service Requests Page
     */
    public function testOpenServiceRequestsPage() {
        $this->browse(function($browser) {
            $browser->visit('/serviceprovider/servicerequests')
            ->assertSee('Service Requests Overview');
        });
    }

    /**
     * Verify if the service request  is displayed with a “PENDING” status
     */
    public function testCheckIfServiceRequestCardIsThere() {
        $this->browse(function($browser) {
            $browser->click('a.nav-link[href="#pending"]')
            ->waitFor('.tab-pane#pending')
            ->assertSeeIn('.tab-pane#pending .service-card-2', 'PENDING');
        });
    }

    /**
     * Verify if the service request card has the appropriate information.
     */
    public function testIfAllInformationPresent() {
        $latestPendingRequest = ServiceRequest::where('status', 'PENDING')->first();
        $this->browse(function($browser) use ($latestPendingRequest) {
            $browser->with('.tab-pane#pending .service-card-2[data-service-request-id="'.$latestPendingRequest->id.'"]', function($card) use ($latestPendingRequest) {
                $card->assertSee($latestPendingRequest->service->category)
                ->assertSee($latestPendingRequest->service->description)
                ->assertSee($latestPendingRequest->user->name)
                ->assertSee(Carbon::parse($latestPendingRequest->start_date_time)->format('M j, H:i A'))
                ->assertSee(Carbon::parse($latestPendingRequest->end_date_time)->format('M j, H:i A'))
                ->assertSee($latestPendingRequest->duration)
                ->assertSee('RM '.$latestPendingRequest->total)
                ->assertSeeIn('.req-id', '# '.$latestPendingRequest->id)
                ->assertSee($latestPendingRequest->note)
                ->assertVisible('button.dropdown-toggle');
            });

        });
    }


    /**
     * Click on the action dropdown button on the service card
     */
    public function testActionDropdownDisplayed() {
        $this->browse(function($browser) {
            $browser->click('.tab-pane#pending .service-card-2 button.dropdown-toggle')
            ->waitFor('.tab-pane#pending .service-card-2 .dropdown .dropdown-menu')
            ->assertVisible('.tab-pane#pending .service-card-2 .dropdown .dropdown-menu');
        });
    }


    /**
     * Click “Accept” on the drop down.
     */
    public function testClickAcceptOnDropdown() {
        $this->browse(function($browser) {
            $browser->click('.tab-pane#pending .service-card-2 .dropdown a[data-target="#request-confirmation"]')
            ->assertVisible('.modal#request-confirmation');
        });
    }

    /**
     * Click “OK” on the modal
     */
    public function testClickOKOnModal() {
        $this->browse(function($browser) {
            $browser->press('OK')
            ->assertPathIs('/serviceprovider/servicerequests');
        });
    }

    /**
     * Verify if the status displayed on the service request card is set to “ACCEPTED”
     */
    public function testCheckStatusChanged() {
        $latestCompleteRequest = ServiceRequest::where('status', 'ACCEPTED')->orderByDesc('updated_at')->first();
        $this->browse(function($browser) use ($latestCompleteRequest) {
            $browser->pause(1000)
            ->click('a.nav-link[href="#accepted"]')
            ->waitFor('.tab-pane#accepted')
            ->assertSeeIn('.tab-pane#accepted .service-card-2[data-service-request-id="'.$latestCompleteRequest->id.'"]', 'ACCEPTED');
        });
    }

}
