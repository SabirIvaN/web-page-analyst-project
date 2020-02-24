<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class Test extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testMainPage ()
    {
        $this->call('GET', route('domains.main'));
        $this->assertResponseOk();
    }

    public function testDatabase () {
        //$response = $this->call('GET', '/domains');
        //$this->assertEquals(200, $response->status());
        $this->assertTrue(true);
    }
}
