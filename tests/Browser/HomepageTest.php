<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HomepageTest extends DuskTestCase
{
    /**
     * @return void
     * @throws \Throwable
     */
    public function testHomeContentAndSendSms()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertTitle('Sample App - Home')
                ->assertSee('Sample App Name')
                ->value('input[name=to]', '+1111')
                ->value('input[name=body]', 'message')
                ->click('button[type=submit]')
                ->waitFor('#dialog:not(.d-none)', 2)
                ->assertSeeIn('#dialog', 'SMS sent to +1111');
        });
    }

    /**
     * @return void
     * @throws \Throwable
     */
    public function testHomeContentAndSendSmsFailure()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertTitle('Sample App - Home')
                ->assertSee('Sample App Name')
                ->value('input[name=to]', '+2222')
                ->value('input[name=body]', 'message')
                ->click('button[type=submit]')
                ->waitFor('#dialog:not(.d-none)', 2)
                ->assertSeeIn('#dialog', 'Failed to send SMS.');
        });
    }
}
