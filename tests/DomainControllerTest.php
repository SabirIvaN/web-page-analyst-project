<?php

namespace Tests;

use Tests\TestCase;
use DiDom\Document;
use GuzzleHttp\Client;
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

    public function testAnalyser()
    {
        $this->get(route('domains.index'))->assertResponseOk();
    }

    public function testHistory()
    {
        $this->get(route('domains.store'))->assertResponseOk();
    }

    public function testDatabase()
    {
        $filePath = __DIR__ . DIRECTORY_SEPARATOR . 'fixtures' . DIRECTORY_SEPARATOR . 'test-page.html';
        $body = file_get_contents($filePath);
        $document = new Document($body);
        $elementH1 = $document->first('h1')->text();
        $elementMetaKeywords = $document->first("meta[name='keywords']")->getAttribute('content');
        $elementMetaDescription = $document->first("meta[name='description']")->getAttribute('content');
        $contentLength = strlen($body);
        $currentDateTime = date('d/M/Y H:i:s');
        $responseCode = 200;
        DB::table('domains')->insert([
            'name' => $filePath,
            'content_length' => $contentLength,
            'response_code' => $responseCode,
            'body' => $body,
            'h1' => $elementH1,
            'meta_keywords' => $elementMetaKeywords,
            'meta_description' => $elementMetaDescription
        ]);
        $this->seeInDatabase('domains', [
            'name' => $filePath,
            'content_length' => $contentLength,
            'response_code' => $responseCode,
            'body' => $body,
            'h1' => $elementH1,
            'meta_keywords' => $elementMetaKeywords,
            'meta_description' => $elementMetaDescription
        ]);
    }
}
