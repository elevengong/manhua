<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Requests;

class IndexController extends FrontendController
{

    //pc首页
    public function index(Request $request){
        //$isMobile = $this->isMobile();
        return view('frontend.pc.index')->with('user', session('user'))->with('vip', session('vip'));
    }

    //wap首页
    public function wapindex(){
        return view('frontend.mobile.index')->with('user', session('user'))->with('vip', session('vip'));
    }

    //pc分类列表
    public function manhualist(Request $request,$cid){
        return view('frontend.pc.manhualist')->with('user', session('user'))->with('vip', session('vip'));
    }

    //wap分类列表
    public function wapmanhualist(Request $request,$cid){
        return view('frontend.mobile.manhualist')->with('user', session('user'))->with('vip', session('vip'));
    }

    //pc漫画信息
    public function manhuaview(Request $request,$manhua_id){
        return view('frontend.pc.manhuaview')->with('user', session('user'))->with('vip', session('vip'));
    }

    //wap漫画信息
    public function wapmanhuaview(Request $request,$manhua_id){
        return view('frontend.mobile.manhuaview')->with('user', session('user'))->with('vip', session('vip'));
    }

    //pc查看漫画章节
    public function manhuachapterview(Request $request,$chaper_id){
        return view('frontend.pc.manhuachapterview')->with('user', session('user'))->with('vip', session('vip'));
    }

    //wap查看漫画章节
    public function wapmanhuachapterview(Request $request,$chaper_id){
        return view('frontend.mobile.manhuachapterview')->with('user', session('user'))->with('vip', session('vip'));
    }

    //wap vip chapter
    public function wapmanhuavipchapterview(Request $request,$chaper_id){
        return view('frontend.mobile.wapmanhuavipchapterview')->with('user', session('user'))->with('vip', session('vip'));
    }






}
