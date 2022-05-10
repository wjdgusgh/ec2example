<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class ApiController extends BaseController {
    function test() {
        return "success";
    }

    function json() {
        return [
            "name" => "정현호",
            "initial" => "jhh"
        ];
    }
}
