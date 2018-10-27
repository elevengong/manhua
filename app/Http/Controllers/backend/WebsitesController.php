<?php

namespace App\Http\Controllers\backend;

use App\Model\Websites;
use Illuminate\Http\Request;
use App\Http\Controllers\MyController;
use App\Http\Requests;

class WebsitesController extends MyController
{
    //站长网站审核列表
    public function verifylist(Request $request){
        if($request->isMethod('post'))
        {
            $member = request()->input('member');
            $WebsitesArray = Websites::select('websites.*','member.name')
                ->leftJoin('member',function ($join){
                    $join->on('member.member_id','=','websites.member_id');
                })
                ->where('member.name','like',$member . '%')
                ->orderBy('websites.created_at', 'desc')->paginate($this->backendPageNum);

        }else{
            $WebsitesArray = Websites::select('websites.*','member.name')
                ->leftJoin('member',function ($join){
                    $join->on('member.member_id','=','websites.member_id');
                })
                ->orderBy('websites.created_at', 'desc')->paginate($this->backendPageNum);
        }
        //print_r($WebsitesArray);exit;

        return view('backend.verifywebsitelist', compact('WebsitesArray'))->with('admin', session('admin'));
    }

    //审核站长网站
    public function verifyweb(Request $request,$web_id){
        if($request->isMethod('post'))
        {
            $status = request()->input('status');
            $result = Websites::where('web_id', $web_id)->update(['status' => $status]);
            if ($result) {
                $data['status'] = 1;
                $data['msg'] = "修改成功";
            } else {
                $data['status'] = 0;
                $data['msg'] = "修改失败";
            }
            echo json_encode($data);
        }else{
            $WebsiteDetail = Websites::select('websites.*','member.name')
                ->leftJoin('member',function ($join){
                    $join->on('member.member_id','=','websites.member_id');
                })
                ->where('websites.web_id',$web_id)->get()->toArray();
            return view('backend.viewverifywebsite', compact('WebsiteDetail'));
        }

  }
}
