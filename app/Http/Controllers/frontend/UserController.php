<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends FrontendController
{
    //pc user center
    public function center(){
        return view('frontend.pc.usercenter')->with('user', session('user'))->with('vip', session('vip'));
    }

    //wap user center
    public function wapcenter(){
        if(!empty(session('user'))){
            return view('frontend.mobile.usercenter')->with('user', session('user'))->with('vip', session('vip'));
        }else{
            return redirect('/m/user/login');
        }
    }


    //wap user pay
    public function wappay(){
        return view('frontend.mobile.wappay')->with('user', session('user'))->with('vip', session('vip'));
    }
}
