<?php

namespace App\Http\Controllers;

use App\Domain;
use DiDom\Document;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Laravel\Lumen\Routing\Controller as BaseController;

class DomainController extends BaseController
{
    public function showAnalyser()
    {
        return view('domains.analyser');
    }

    public function showHistory()
    {
        $domains = DB::table('domains')->paginate(10);
        return view('domains.history', ['domains' => $domains]);
    }

    public function showTable($id)
    {
        $domains = DB::table('domains')->where(['id' => $id])->get();
        return view('domains.table', ['domain' => $domains->first()]);
    }

    public function sendData(Request $request)
    {
        $url = $request->input('urlSiteInputing');
        $validator = Validator::make($request->all(), ['urlSiteInputing' => 'required|url']);
        if ($validator->fails()) {
            return redirect()->route('domains.analyser');
        }
        $client = new Client();
        $response = $client->request('GET', $url);
        $body = $response->getBody();
        $document = new Document((string) $body);
        $elementH1 = ($document->has('h1')) ?
            $document->first('h1')->text() :
            'nothing';
        $elementMetaKeywords = ($document->has("meta[name='keywords']")) ?
            $document->first("meta[name='keywords']")->getAttribute('content') :
            'nothing';
        $elementMetaDescription = ($document->has("meta[name='description']")) ?
            $document->first("meta[name='description']")->getAttribute('content') :
            'nothing';
        $id = DB::table('domains')->insertGetId([
            'name' => $url,
            'updated_at' => date('d/M/Y H:i:s'),
            'created_at' => date('d/M/Y H:i:s'),
            'content_length' => $response->getBody()->getSize(),
            'response_code' => $response->getStatusCode(),
            'body' => $body,
            'h1' => $elementH1,
            'meta_keywords' => $elementMetaKeywords,
            'meta_description' => $elementMetaDescription
        ]);
        return redirect()->route('domains.table', ['id' => $id]);
    }
}
