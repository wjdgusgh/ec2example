<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class MainController extends BaseController {
    function main() {
        return view("index");
    }
}

?>
