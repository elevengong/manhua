<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Requests;

class IndexController extends FrontendController
{

    public function index(Request $request){
        return view('frontend.pc.index')->with('user', session('user'))->with('vip', session('vip'));
    }

    public function manhualist(Request $request,$cid){
        return view('frontend.pc.manhualist')->with('user', session('user'))->with('vip', session('vip'));
    }

    public function manhuaview(Request $request,$manhua_id){
        return view('frontend.pc.manhuaview')->with('user', session('user'))->with('vip', session('vip'));
    }

    public function manhuachapterview(Request $request,$chaper_id){
        return view('frontend.pc.manhuachapterview')->with('user', session('user'))->with('vip', session('vip'));
    }

    //代理入口
    public function dailienter(){

    }





}
