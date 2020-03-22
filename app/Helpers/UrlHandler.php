<?php

namespace App\Helpers;

use DiDom\Document;
use GuzzleHttp\Client;

/**
 * Url handler
 */
class UrlHandler
{
    public function getUrlInformation($url)
    {
        $client = new Client();
        $response = $client->request('GET', $url);
        $body = $response->getBody();
        $document = new Document((string) $body);
        $domain = [
            'updated_at' => date('d/M/Y H:i:s'),
            'created_at' => date('d/M/Y H:i:s'),
            'content_length' => $response->getBody()->getSize(),
            'response_code' => $response->getStatusCode(),
            'body' => $body,
            'h1' => ($document->has('h1')) ?
                $document->first('h1')->text() :
                'nothing',
            'meta_keywords' => ($document->has("meta[name='keywords']")) ?
                $document->first("meta[name='keywords']")->getAttribute('content') :
                'nothing',
            'meta_description' => ($document->has("meta[name='description']")) ?
                $document->first("meta[name='description']")->getAttribute('content') :
                'nothing'
        ];
        return $domain;
    }
}
