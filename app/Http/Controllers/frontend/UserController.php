<?php

namespace App\Http\Controllers\frontend;

use App\Model\ManhuaChapter;
use App\Model\PayCoinList;
use App\Model\Users;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends FrontendController
{
    //pc user center
    public function center(){
        $attribute = $this->attribute;
        $categories = $this->categories;
        $userInfo = Users::find(session('uid'))->toArray();
        return view('frontend.pc.usercenter',compact('userInfo','attribute','categories'))->with('user', session('user'))->with('vip', session('vip'));
    }

    //wap user center
    public function wapcenter(){
        if(!empty(session('user'))){
            $userInfo = Users::find(session('uid'))->toArray();
            $attribute = $this->attribute;
            return view('frontend.mobile.usercenter',compact('userInfo','attribute'))->with('user', session('user'))->with('vip', session('vip'));
        }else{
            return redirect('/m/login');
        }
    }

    //pc deposit
    public function deposit(){
        $attribute = $this->attribute;
        $categories = $this->categories;
        return view('frontend.pc.deposit',compact('attribute','categories'))->with('user', session('user'))->with('vip', session('vip'));
    }

    //pc pay
    public function pay(Request $request,$chapter_id){
        $user = Users::where('uid',session('uid'))->where('status',1)->get()->toArray();
        $chapter = ManhuaChapter::where('chapter_id',$chapter_id)->where('status',1)->get()->toArray();
        if(!empty($user)) {
            return view('frontend.pc.paychapter',compact('user','chapter'));
        }else{
            echo "Error!";exit;
        }
    }

    //pc pay coin process
    public function paycoin(Request $request,$chapter_id){
        if($request->isMethod('post')){
            $chapter = ManhuaChapter::where('chapter_id',$chapter_id)->where('status',1)->get()->toArray();
            if(!empty($chapter)){
                //判断用户是否有足够的积分
                $userInfo = Users::where('uid',session('uid'))->get()->toArray();
                if($userInfo[0]['coin'] < $chapter[0]['coin'])
                {
                    $re['status'] = 0;
                    $re['msg'] = "积分不够，请及时充值或者成为VIP";
                    echo json_encode($re);
                    exit;
                }
                $result = Users::where('uid',session('uid'))->decrement('coin',$chapter[0]['coin']);
                $datas = array(
                    'uid' => session('uid'),
                    'manhua_id' => $chapter[0]['manhua_id'],
                    'chapter_id' => $chapter[0]['chapter_id']
                );
                $result = PayCoinList::create($datas);
                if($result->id){
                    $re['status'] = 1;
                    $re['msg'] = "购买成功";
                }else{
                    $re['status'] = 0;
                    $re['msg'] = "购买失败";
                }
                echo json_encode($re);
            }

        }else{
            echo "Error!";exit;
        }
    }


    //wap user pay
    public function wappay(){
        return view('frontend.mobile.wappay')->with('user', session('user'))->with('vip', session('vip'));
    }
}
