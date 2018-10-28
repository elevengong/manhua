<?php

namespace App\Http\Controllers\frontend;

use App\Model\Users;
use Illuminate\Http\Request;
use Crypt;
use App\Http\Requests;

class LoginController extends FrontendController
{
    public function login(){
        if(empty(session('user')))
        {
            return view('frontend.pc.login');
        }else{
            return redirect('/');
        }

    }

    public function registered(){
        if(empty(session('user')))
        {
            if(empty(session('daili_id')))
            {
                $daili_id = 0;
            }else{
                $daili_id = session('daili_id');
            }
            return view('frontend.pc.registered')->with('daili_id', $daili_id);
        }else{
            return redirect('/');
        }

    }

    public function loginprocess(Request $request){
        if($request->isMethod('post')){
            $login_ip = $request->getClientIp();
            $user_name = request()->input('name');
            $pwd = request()->input('pwd');

            $result = Users::where('user_name',$user_name)->get()->toArray();
            if($result){
                if($result[0]['status']==1){
                    $stored_pwd= Crypt::decrypt($result[0]['pwd']);
                    if($stored_pwd == $pwd){
                        $last_login_time = date('Y-m-d h:i:s',time());
                        //判断vip过期未
                        if(time() > strtotime($result['0']['vip_end_time']))
                        {
                            $result['0']['vip'] = 0;
                            $result['0']['vip_start_time'] = '0000-00-00 00:00:00';
                            $result['0']['vip_end_time'] = '0000-00-00 00:00:00';
                            $result = Users::where('uid',session('uid'))->update(['login_ip'=>$login_ip, 'last_login_time'=>$last_login_time, 'vip' => '0', 'vip_start_time' =>'0000-00-00 00:00:00', 'vip_end_time' =>'0000-00-00 00:00:00']);
                        }else{
                            $result = Users::where('uid',session('uid'))->update(['login_ip'=>$login_ip, 'last_login_time'=>$last_login_time]);
                        }
                        session(['user' => $user_name, 'uid' => $result['0']['uid'],'vip' => $result['0']['vip'],'vip_start_time' => $result['0']['vip_start_time'],'vip_end_time' => $result['0']['vip_end_time']]);

                        $data['status'] = 1;
                        $data['msg'] = '登陆成功，请等待跳转';
                    }else{
                        $data['status'] = 0;
                        $data['msg'] = '用户不存在或密码错误';
                    }
                }else{
                    $data['status'] = 0;
                    $data['msg'] = '该用户已被冻结';
                }
            }else{
                $data['status'] = 0;
                $data['msg'] = '用户不存在或密码错误';
            }
            echo json_encode($data);
        }

    }

    public function registeredprocess(Request $request){
        if ($request->isMethod('post')) {
            $data['user_name'] = request()->input('name');
            $data['pwd']= Crypt::encrypt(request()->input('pwd'));
            $data['daili_id'] = is_numeric(request()->input('recommend'))? request()->input('recommend') : 0;
            $data['register_ip'] = $request->getClientIp();
            $data['login_ip'] = $request->getClientIp();
            $data['last_login_time'] = date('Y-m-d h:i:s',time());

            $result = Users::where('user_name',$data['user_name'])->get()->toArray();
            if(empty($result))
            {
                $insert_result = Users::create($data);
                if($insert_result->uid){
                    $reData['status'] = 1;
                    $reData['msg'] = "注册成功";
                }else{
                    $reData['status'] = 0;
                    $reData['msg'] = "注册失败";
                }
            }else{
                $reData['status'] = 0;
                $reData['msg'] = "该用户名已被注册";
            }

            echo json_encode($reData);


        }
    }

    public function logout(Request $request){
        $this->deleteAllSession($request);
        return redirect('/');
    }

}
