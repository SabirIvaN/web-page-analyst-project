<?php

namespace App\Helpers;

use DiDom\Document;
use GuzzleHttp\Client;

class UrlHandler
{
    /**
     * get url handler
     */
    public function getUrlInformation($response)
    {
        $body = $response->getBody();
        $document = new Document((string) $body);
        $domain = [
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
