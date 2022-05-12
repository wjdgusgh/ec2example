<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Models\Test;
use App\Models\SideWebpages;

class ApiController extends BaseController {
    function test() {
        return "success";
    }

    function json() {
        //$datas = DB::select("SELECT * FROM test");
        $datas = Test::get();
        //$datas = Test::where('id', 1)->get();

        return $datas;

        /*
        return [
            "name" => "정현호",
            "initial" => "jhh"
        ];
        */
    }

    function webpages() {
        $datas = SideWebpages::get();

        return $datas;
    }
}
