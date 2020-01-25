<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;

class DomainController extends BaseController
{
    public function domainsAnalyser ()
    {
        return view('domains.analyser');
    }

    public function domainsHistory ()
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
        $url = $request->input("urlSiteInputing");
        $currentDateTime = date('d/M/Y H:i:s');
        $id = DB::table('domains')->insertGetId([
            'name' => $url,
            'updated_at' => $currentDateTime,
            'created_at' => $currentDateTime
        ]);
        return redirect()->route('domains.table', ['id' => $id]);
    }
}
