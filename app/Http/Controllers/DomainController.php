<?php

namespace App\Http\Controllers;

use App\Helpers\UrlHandler;
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
        $urlHandler = new UrlHandler();
        $domain = $urlHandler->getUrlInformation($url);
        $id = DB::table('domains')->insertGetId([
            'name' => $url,
            'updated_at' => $domain['created_at'],
            'created_at' => $domain['updated_at'],
            'content_length' => $domain['content_length'],
            'response_code' => $domain['response_code'],
            'body' => $domain['body'],
            'h1' => $domain['h1'],
            'meta_keywords' => $domain['meta_keywords'],
            'meta_description' => $domain['meta_description']
        ]);
        return redirect()->route('domains.table', ['id' => $id]);
    }
}
