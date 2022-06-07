<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\SideWebpages;
use App\Models\Accounts;
use App\Models\Wowmagazine;

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

    function signup(Request $request) {
        $account = new Accounts;

        if($this->getEmail($request->email)) return 'This email already exists';

        $account->email = $request->email;
        $account->password = $request->password;
        $account->name = $request->name;
        $account->phonenumber = $request->phonenumber;
        $account->birthday = $request->birthday;
        $account->division = $request->division;
        $account->purpose = $request->purpose;
        if($request->purpose_etc) {
            $account->purpose_etc = $request->purpose_etc;
        }

        $account->save();
    }

    function getEmail($email) {
        //email만 불러올 때
        $datas = Accounts::where('email', $email)->first();
        if($datas) {
            $datas = $datas->email;
        }

        return $datas;
    }

    function getAccountList() {
        $datas = Accounts::select('email', 'name', 'phonenumber', 'division', 'purpose', 'created_at', 'purpose_etc')->orderBy('created_at', 'desc')->get();
        //최신 가입자 순으로 정렬
        //특정 컬럼만 갖고 오게 하기

        foreach($datas as $d) {
            $this->changeValue($d);
        }

        return $datas;
    }

    function getAccountInfo($email) {
        $datas = Accounts::select('email', 'name', 'phonenumber', 'division', 'purpose', 'purpose_etc')->where('email', $email)->first();

        return $this->changeValue($datas);
    }

    function checkPassword($email) {
        $datas = Accounts::select();
    }

    function changeValue($datas) {
        switch($datas->division) {
            case 1:
                $datas->division = "개인";
                break;
            case 2:
                $datas->division = "기업";
                break;
            case 3:
                $datas->division = "공공기관/단체";
                break;
            case 4:
                $datas->division = "소상공인/자영업자";
                break;
        }

        switch($datas->purpose) {
            case 'a':
                $datas->purpose = $datas->purpose_etc;
                break;
            case 'b':
                $datas->purpose = "미니 홈페이지";
                break;
            case 'c':
                $datas->purpose = "간편 웹페이지";
                break;
            case 'd':
                $datas->purpose = "브로셔/소개서";
                break;
            case 'e':
                $datas->purpose = "상세페이지 디자인";
                break;
            case 'f':
                $datas->purpose = "유튜브/SNS 홍보";
                break;
            case 'g':
                $datas->purpose = "웹사이트 배너/연결 페이지";
                break;
            case 'h':
                $datas->purpose = "네임카드/명함/쿠폰";
                break;
            case 'i':
                $datas->purpose = "인포그래픽";
                break;
            case 'j':
                $datas->purpose = "프리젠테이션";
                break;
            case 'k':
                $datas->purpose = "카드뉴스";
                break;
        }

        return $datas;
    }

    function wowmagazine() {
        $datas = Wowmagazine::get();

        return $datas;
    }
}
