<?php

namespace Tests;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class DomainControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDomainMain ()
    {
        $this->get(route('domains.main'))->assertResponseOk();
    }

    public function testDomainSave()
    {
        $this->get(route('domains.save'))->assertResponseOk();
    }

    public function testDomainHistory()
    {
        $this->get(route('domains.history'))->assertResponseOk();
    }

    public function testDomainDatabase()
    {
        $this->seeInDatabase('domains', ['name' => 'https://yandex.ru']);
    }
}
