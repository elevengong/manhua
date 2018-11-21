<?php

namespace App\Http\Controllers\frontend;

use App\Model\ManhuaChapter;
use App\Model\OrderDeposit;
use App\Model\PayCoinList;
use App\Model\SaleType;
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

    //user payment
    public function payment(Request $request){
        if($request->isMethod('post')){
            $attribute = $this->attribute;
            $payType = request()->input('pay_type');
            $saleId = request()->input('id');
            $input = array();

            $saleTypeArray = SaleType::find($saleId);

            if(!empty($saleTypeArray)){
                $input['uid'] = session('uid');
                $input['order_money'] = $saleTypeArray->money;
                $input['order_type'] = $saleId;
                if($payType == 'alipay'){
                    $input['pay_type'] = 1;
                }else{
                    $input['pay_type'] = 2;
                }
                $input['ip'] = $request->getClientIp();
                $input['order_no'] = time().rand(100,999);
                //判断当前用户这次存款是否要给代理反佣
                $user = Users::find(session('uid'));
                $daili_id = $user->daili_id;
                if($daili_id != 0){
                    $result = OrderDeposit::where('uid',session('uid'))->where('daili_id',$daili_id)->where('status',1)->count();
                    if($result == 0){
                        $input['daili_id'] = $daili_id;
                    }else{
                        $input['daili_id'] = 0;
                    }

                }else{
                    $input['daili_id'] = $daili_id;
                }

                $order = OrderDeposit::create($input);
                if($order->deposit_id){
                    return redirect($attribute[6]['value'].'?id='.$order->deposit_id.'&money='.$input['order_money'].'&order_no='.$input['order_no']);
                }else{
                    $re['status'] = 0;
                    $re['msg'] = "Error3";
                    echo json_encode($re);
                    exit;
                }

            }else{
                $re['status'] = 0;
                $re['msg'] = "Error2";
                echo json_encode($re);
                exit;
            }


        }else{
            echo "Error!"; exit;
        }
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
    public function wapdeposit(){
        $userInfo = Users::find(session('uid'))->toArray();
        return view('frontend.mobile.deposit',compact('userInfo'))->with('user', session('user'))->with('vip', session('vip'));
    }
}
