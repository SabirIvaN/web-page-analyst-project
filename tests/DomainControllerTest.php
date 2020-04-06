<?php

namespace Tests;

use Tests\TestCase;
use DiDom\Document;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Handler\MockHandler;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class DomainControllerTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */

    public function testCreate()
    {
        $response = $this->get(route('domains.create'));
        $response->assertEquals(200, $this->response->status());
    }

    public function testIndex()
    {
        $response = $this->get(route('domains.index'));
        $response->assertEquals(200, $this->response->status());
    }

    public function testDomainController()
    {
        $url = ['url' => 'https://yandex.ru'];
        $filePath = __DIR__ . DIRECTORY_SEPARATOR . 'fixtures' . DIRECTORY_SEPARATOR . 'test-page.html';
        $body = file_get_contents($filePath);
        $mock = new MockHandler([
            new Response(200, ['Content-Length' => mb_strlen($body)], $body)
        ]);
        $handler = HandlerStack::create($mock);
        $this->app->bind('HttpClient', function ($app) use ($handler) {
            return new Client(['handler' => $handler]);
        });
        $this->post(route('domains.store'), $url);
        $this->assertResponseStatus(302);
        $this->seeInDatabase('domains', [
            'name' => 'https://yandex.ru',
            'content_length' => mb_strlen($body),
            'response_code' => 200,
            'body' => $body,
            'h1' => 'Header',
            'meta_keywords' => 'keywords test description',
            'meta_description' => 'description'
        ]);
    }
}
