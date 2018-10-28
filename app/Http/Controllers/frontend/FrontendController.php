<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class FrontendController extends Controller
{
    protected $navigations;

    public function __construct()
    {
        date_default_timezone_set('Asia/Shanghai');
    }

    //删除所有session数据
    protected function deleteAllSession($request){
        return $request->session()->flush();
    }




}
