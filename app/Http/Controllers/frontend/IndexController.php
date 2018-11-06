<?php

namespace App\Http\Controllers\frontend;

use App\Model\Manhua;
use App\Model\ManhuaChapter;
use App\Model\ManhuaPhotos;
use App\Model\PayCoinList;
use Illuminate\Http\Request;
use App\Http\Requests;

class IndexController extends FrontendController
{

    //pc首页
    public function index(Request $request){
        //$isMobile = $this->isMobile();
        $attribute = $this->attribute;
        $categories = $this->categories;
        $lastUpdateManhua = Manhua::select('manhua_id','name','cover','last_update_time')->where('status',1)->orderBy('last_update_time','desc')->get()->take(12)->toArray();
        $hotManhua = Manhua::select('manhua_id','name','cover','last_update_time')->where('status',1)->orderBy('views','desc')->get()->take(12)->toArray();

        //-----最后条件要改成完结状态
        $completeManhua = Manhua::select('manhua_id','name','cover','last_update_time')->where('status',1)->orderBy('views','desc')->get()->take(8)->toArray();

        return view('frontend.pc.index',compact('lastUpdateManhua','hotManhua','completeManhua','attribute','categories'))->with('user', session('user'))->with('vip', session('vip'));
    }




    //wap首页
    public function wapindex(){
        return view('frontend.mobile.index')->with('user', session('user'))->with('vip', session('vip'));
    }

    //pc分类列表
    public function manhualist(Request $request,$cid){
        $attribute = $this->attribute;
        $categories = $this->categories;
        $manhuaList = Manhua::where('cid',$cid)->where('status',1)->orderBy('manhua_id','desc')->paginate(30);

        return view('frontend.pc.manhualist',compact('manhuaList','attribute','categories'))->with('user', session('user'))->with('vip', session('vip'));
    }

    //wap分类列表
    public function wapmanhualist(Request $request,$cid){
        return view('frontend.mobile.manhualist')->with('user', session('user'))->with('vip', session('vip'));
    }

    //pc漫画信息
    public function manhuaview(Request $request,$manhua_id){
        $categories = $this->categories;
        $manhua = Manhua::select('manhua.*', 'category.c_name')
            ->leftJoin('category',function ($join){
                $join->on('category.cid','=','manhua.cid');
            })->where('manhua_id',$manhua_id)->where('manhua.status',1)->get()->toArray();
        if(empty($manhua)){
            return redirect('/');
        }
        $chapterList = ManhuaChapter::select('manhua_id','chapter_id','chapter_name','chapter_cover','vip','coin','created_at')->where('manhua_id',$manhua_id)->where('status',1)->orderBy('priority','asc')->get()->toArray();

        Manhua::where('manhua_id',$manhua_id)->increment('views',1);
        $attribute = $this->attribute;
        return view('frontend.pc.manhuaview',compact('manhua','chapterList','attribute','categories'))->with('user', session('user'))->with('vip', session('vip'));
    }

    //wap漫画信息
    public function wapmanhuaview(Request $request,$manhua_id){
        return view('frontend.mobile.manhuaview')->with('user', session('user'))->with('vip', session('vip'));
    }

    //pc查看漫画章节
    public function manhuachapterview(Request $request,$manhua_id,$chaper_id){

        $attribute = $this->attribute;
        $manhuaPhotos = ManhuaPhotos::where('chapter_id',$chaper_id)->where('status',1)->orderBy('priority','asc')->get()->toArray();
        if(empty($manhuaPhotos)){
            return redirect('/');
        }
        $manhuaChapter = ManhuaChapter::select('chapter_id','chapter_name','vip','pre_chapter_id','next_chapter_id','coin')->where('chapter_id',$chaper_id)->where('status',1)->get()->toArray();
        if(empty($manhuaChapter)){
            return redirect('/');
        }
        $manhua = Manhua::where('manhua_id',$manhua_id)->where('status',1)->get()->toArray();
        if(empty($manhua)){
            return redirect('/');
        }
        //检查当前漫画章节是否免费

        $chapterList = ManhuaChapter::select('manhua_id','chapter_id','chapter_name')->where('manhua_id',$manhua_id)->where('status',1)->orderBy('priority','asc')->get()->toArray();
        ManhuaChapter::where('chapter_id',$chaper_id)->increment('views',1);
        //检查当前用户是否有购买当前漫画章节or用户就是vip

        $buyStatus = PayCoinList::where('uid',session('uid'))->where('manhua_id',$manhua_id)->where('chapter_id',$chaper_id)->get()->toArray();
        if($manhuaChapter[0]['vip'] == 0 or $manhuaChapter[0]['coin'] == 0 or session('vip') == 1 or !empty($buyStatus)){
            return view('frontend.pc.manhuachapterview',compact('manhuaPhotos','manhua_id','manhuaChapter','manhua','chapterList','attribute'))->with('user', session('user'))->with('vip', session('vip'));
        }else{
            return view('frontend.pc.manhuavipchapterview',compact('manhuaPhotos','manhua_id','manhuaChapter','manhua','chapterList','attribute'))->with('user', session('user'))->with('vip', session('vip'));
        }


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
