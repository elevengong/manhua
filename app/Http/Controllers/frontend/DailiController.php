<?php

namespace App\Http\Controllers\frontend;

use App\Model\Statistics;
use Illuminate\Http\Request;
use App\Http\Requests;

class DailiController extends FrontendController
{
    public function dailientrance(Request $request,$daili_id){
        //$isMobile = $this->isMobile();
        $ip = $request->getClientIp();
        @$coming_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '浏览器输入网址';
        @$str = file_get_contents('http://pv.sohu.com/cityjson?ie=utf-8');
        if(!empty($str)){
            $str1= explode('"cname": "',$str);
            $str2=(explode('"};',$str1['1']));
            $area = $str2['0'];
        }else{
            $area = '未知';
        }
        $input = array(
            'daili_id' => $daili_id,
            'ip' => $ip,
            'coming_url' => $coming_url,
            'area' => $area,
            'created_at' => date('Y-m-d h:i:s',time())
        );
        $result = Statistics::create($input);

        session(['daili_id'=>$daili_id]);
        return redirect('/');
    }
}
