<?php

namespace App\Http\Controllers;

use App\Helpers\UrlHandler;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Laravel\Lumen\Routing\Controller as BaseController;

class DomainController extends BaseController
{
    public function create()
    {
        return view('domains.create');
    }

    public function index()
    {
        $domains = DB::table('domains')->paginate(10);
        return view('domains.index', ['domains' => $domains]);
    }

    public function show($id)
    {
        $domains = DB::table('domains')->where(['id' => $id])->get();
        return view('domains.show', ['domain' => $domains->first()]);
    }

    public function store(Request $request)
    {
        $url = $request->input('urlSiteInputing');
        $validator = Validator::make($request->all(), ['urlSiteInputing' => 'required|url']);
        if ($validator->fails()) {
            return redirect()->route('domains.create');
        }
        $urlHandler = new UrlHandler();
        $domain = $urlHandler->getUrlInformation($url);
        $id = DB::table('domains')->insertGetId([
            'name' => $url,
            'updated_at' => date('d/M/Y H:i:s'),
            'created_at' => date('d/M/Y H:i:s'),
            'content_length' => $domain['content_length'],
            'response_code' => $domain['response_code'],
            'body' => $domain['body'],
            'h1' => $domain['h1'],
            'meta_keywords' => $domain['meta_keywords'],
            'meta_description' => $domain['meta_description']
        ]);
        return redirect()->route('domains.show', ['id' => $id]);
    }
}
