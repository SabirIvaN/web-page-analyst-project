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

    public function testMainPage () {
        $this->call('GET', route('domains.main'));
        $this->assertResponseOk();
    }

    public function testDatabase () {
        $parameteres = ['name' => 'https://yandex.ru'];
        $this->seeInDatabase('domains', $parameteres);
    }
}
