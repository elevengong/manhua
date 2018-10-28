<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Requests;

class DailiController extends FrontendController
{
    public function dailientrance(Request $request,$daili_id){
        session(['daili_id'=>$daili_id]);
        return redirect('/');
    }
}
