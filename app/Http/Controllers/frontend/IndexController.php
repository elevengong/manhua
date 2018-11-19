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
        $isMobile = $this->isMobile();
        if($isMobile){
            return redirect('/m/');
        }
        $attribute = $this->attribute;
        $categories = $this->categories;
        $lastUpdateManhua = Manhua::select('manhua_id','name','cover','last_update_time')->where('status',1)->orderBy('last_update_time','desc')->get()->take(12)->toArray();
        $hotManhua = Manhua::select('manhua_id','name','cover','last_update_time')->where('status',1)->orderBy('views','desc')->get()->take(12)->toArray();

        //-----最后条件要改成完结状态
        $completeManhua = Manhua::select('manhua_id','intro','name','cover','last_update_time')->where('status',1)->orderBy('views','desc')->get()->take(13)->toArray();

        return view('frontend.pc.index',compact('lastUpdateManhua','hotManhua','completeManhua','attribute','categories'))->with('user', session('user'))->with('vip', session('vip'));
    }

    //pc search
    public function search(Request $request,$search){
        $attribute = $this->attribute;
        $categories = $this->categories;
        $manhuaList = Manhua::where('name','like','%'.$search.'%')->where('status',1)->orderBy('views','desc')->paginate(30);
        return view('frontend.pc.search',compact('manhuaList','attribute','categories','search'))->with('user', session('user'))->with('vip', session('vip'));
    }

    //wap search
    public function wapsearchpage(Request $request){
        return view('frontend.mobile.search');
    }

    public function wapsearch(Request $request,$search){
        $attribute = $this->attribute;
        $manhuaList = Manhua::where('name','like','%'.$search.'%')->where('status',1)->orderBy('views','desc')->get()->toArray();
        return view('frontend.mobile.search',compact('attribute','manhuaList'));
    }

    //wap首页
    public function wapindex(){
        $attribute = $this->attribute;
        $lastUpdateManhua = Manhua::select('manhua_id','name','cover')->where('status',1)->orderBy('last_update_time','desc')->get()->take(6)->toArray();
        $hotManhua = Manhua::select('manhua_id','name','cover','last_update_time')->where('status',1)->orderBy('views','desc')->get()->take(6)->toArray();
        return view('frontend.mobile.index',compact('lastUpdateManhua','hotManhua','attribute'))->with('user', session('user'))->with('vip', session('vip'));
    }

    //pc分类列表
    public function manhualist(Request $request,$cid){
        $attribute = $this->attribute;
        $categories = $this->categories;
        $num = 1;
        $manhuaList = Manhua::where('cid',$cid)->where('status',1)->orderBy('manhua_id','desc')->paginate(30);
        return view('frontend.pc.manhualist',compact('manhuaList','attribute','categories','num'))->with('user', session('user'))->with('vip', session('vip'));
    }

    //pc韩漫列表
    public function hanmanlist(Request $request,$finish){
        $attribute = $this->attribute;
        $categories = $this->categories;
        if($finish==0){
            $num = 2;
        }else{
            $num = 3;
        }
        $manhuaList = Manhua::where('cid',1)->where('finish',$finish)->where('status',1)->orderBy('manhua_id','desc')->paginate(30);
        return view('frontend.pc.manhualist',compact('manhuaList','attribute','categories','num'))->with('user', session('user'))->with('vip', session('vip'));
    }

    //pc热门韩漫列表
    public function hanmanhotlist(Request $request){
        $attribute = $this->attribute;
        $categories = $this->categories;
        $num = 4;
        $manhuaList = Manhua::where('cid',1)->where('status',1)->orderBy('views','desc')->paginate(30);
        return view('frontend.pc.manhualist',compact('manhuaList','attribute','categories','num'))->with('user', session('user'))->with('vip', session('vip'));
    }

    //wap韩漫列表by type
    public function waphanmanlist(Request $request,$type){
        $attribute = $this->attribute;
        if($type == 0){
            $manhuaList = Manhua::where('cid',1)->where('status',1)->where('finish',0)->orderBy('manhua_id','desc')->paginate($this->waplistnum);
        }elseif($type == 1){
            $manhuaList = Manhua::where('cid',1)->where('status',1)->where('finish',1)->orderBy('manhua_id','desc')->paginate($this->waplistnum);
        }else{
            $manhuaList = Manhua::where('cid',1)->where('status',1)->orderBy('manhua_id','desc')->paginate($this->waplistnum);
        }
        return view('frontend.mobile.manhualist',compact('attribute','manhuaList','type'))->with('user', session('user'))->with('vip', session('vip'));
    }

    //wap热门韩漫列表
    public function waphanmanhotlist(Request $request){
        $type = 'hot';
        $attribute = $this->attribute;
        $manhuaList = Manhua::where('cid',1)->where('status',1)->orderBy('views','desc')->paginate($this->waplistnum);
        return view('frontend.mobile.manhualist',compact('attribute','manhuaList','type'))->with('user', session('user'))->with('vip', session('vip'));

    }

    //wap列表页get next page
    public function waphanmanlistnext(Request $request){
        $attribute = $this->attribute;
        $type = request()->input('type');
        if($type == 'hot'){
            $manhuaList = Manhua::select('manhua_id','finish','cover','name')->where('cid',1)->where('status',1)->orderBy('views','desc')->paginate($this->waplistnum);
        }elseif($type == 1){
            $manhuaList = Manhua::select('manhua_id','finish','cover','name')->where('cid',1)->where('status',1)->where('finish',1)->orderBy('manhua_id','desc')->paginate($this->waplistnum);
        }elseif($type == 0){
            $manhuaList = Manhua::select('manhua_id','finish','cover','name')->where('cid',1)->where('status',1)->where('finish',0)->orderBy('manhua_id','desc')->paginate($this->waplistnum);
        }else{
            $manhuaList = Manhua::select('manhua_id','finish','cover','name')->where('cid',1)->where('status',1)->orderBy('manhua_id','desc')->paginate($this->waplistnum);
        }

        if(empty($manhuaList)){
            $reData['status'] = 0;
        }else{
            $manhuaArray = $manhuaList->toArray();
            $reData['status'] = 1;
            $reData['list'] = $manhuaArray['data'];
            $reData['url'] = $attribute[1]['value'];
        }
        echo json_encode($reData);
    }

    //wap分类列表
    public function wapmanhualist(Request $request,$cid){
        return view('frontend.mobile.manhualist')->with('user', session('user'))->with('vip', session('vip'));
    }

    //pc漫画信息
    public function manhuaview(Request $request,$manhua_id){
        $categories = $this->categories;
        $attribute = $this->attribute;
        $manhua = Manhua::select('manhua.*', 'category.c_name')
            ->leftJoin('category',function ($join){
                $join->on('category.cid','=','manhua.cid');
            })->where('manhua_id',$manhua_id)->where('manhua.status',1)->get()->toArray();
        if(empty($manhua)){
            return redirect('/');
        }
        $chapterList = ManhuaChapter::select('manhua_id','chapter_id','chapter_name','chapter_cover','vip','coin','created_at')->where('manhua_id',$manhua_id)->where('status',1)->orderBy('priority','asc')->get()->toArray();
        Manhua::where('manhua_id',$manhua_id)->increment('views',1);

        return view('frontend.pc.manhuaview',compact('manhua','chapterList','attribute','categories'))->with('user', session('user'))->with('vip', session('vip'));
    }

    //wap漫画信息
    public function wapmanhuaview(Request $request,$manhua_id,$order){
        $attribute = $this->attribute;
        $manhua = Manhua::select('manhua.*', 'category.c_name')
            ->leftJoin('category',function ($join){
                $join->on('category.cid','=','manhua.cid');
            })->where('manhua_id',$manhua_id)->where('manhua.status',1)->get()->toArray();
        if(empty($manhua)){
            return redirect('/m/');
        }

        if($order == 'asc' or $order == 'desc'){
            $chapterList = ManhuaChapter::select('manhua_id','chapter_id','chapter_name','chapter_cover','vip','coin','created_at')->where('manhua_id',$manhua_id)->where('status',1)->orderBy('priority',$order)->get()->toArray();
        }else{
            $chapterList = ManhuaChapter::select('manhua_id','chapter_id','chapter_name','chapter_cover','vip','coin','created_at')->where('manhua_id',$manhua_id)->where('status',1)->orderBy('priority','asc')->get()->toArray();
        }
        Manhua::where('manhua_id',$manhua_id)->increment('views',1);
        return view('frontend.mobile.manhuaview',compact('manhua','attribute','chapterList','order'))->with('user', session('user'))->with('vip', session('vip'));
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
        Manhua::where('manhua_id',$manhua_id)->increment('views',1);
        //检查当前用户是否有购买当前漫画章节or用户就是vip

        $buyStatus = PayCoinList::where('uid',session('uid'))->where('manhua_id',$manhua_id)->where('chapter_id',$chaper_id)->get()->toArray();
        if($manhuaChapter[0]['vip'] == 0 or $manhuaChapter[0]['coin'] == 0 or session('vip') == 1 or !empty($buyStatus)){
            return view('frontend.pc.manhuachapterview',compact('manhuaPhotos','manhua_id','manhuaChapter','manhua','chapterList','attribute'))->with('user', session('user'))->with('vip', session('vip'));
        }else{
            return view('frontend.pc.manhuavipchapterview',compact('manhuaPhotos','manhua_id','manhuaChapter','manhua','chapterList','attribute'))->with('user', session('user'))->with('vip', session('vip'));
        }
    }

    //wap查看漫画章节
    public function wapmanhuachapterview(Request $request,$manhua_id,$chaper_id){
        $attribute = $this->attribute;
        $manhuaPhotos = ManhuaPhotos::where('chapter_id',$chaper_id)->where('status',1)->orderBy('priority','asc')->get()->toArray();
        if(empty($manhuaPhotos)){
            return redirect('/m/');
        }
        $manhuaChapter = ManhuaChapter::select('chapter_id','chapter_name','vip','pre_chapter_id','next_chapter_id','coin')->where('chapter_id',$chaper_id)->where('status',1)->get()->toArray();
        if(empty($manhuaChapter)){
            return redirect('/m/');
        }
        $manhua = Manhua::where('manhua_id',$manhua_id)->where('status',1)->get()->toArray();
        if(empty($manhua)){
            return redirect('/m/');
        }

        $chapterList = ManhuaChapter::select('manhua_id','chapter_id','chapter_name')->where('manhua_id',$manhua_id)->where('status',1)->orderBy('priority','asc')->get()->toArray();
        ManhuaChapter::where('chapter_id',$chaper_id)->increment('views',1);
        Manhua::where('manhua_id',$manhua_id)->increment('views',1);
        //检查当前用户是否有购买当前漫画章节or用户就是vip

        $buyStatus = PayCoinList::where('uid',session('uid'))->where('manhua_id',$manhua_id)->where('chapter_id',$chaper_id)->get()->toArray();
        if($manhuaChapter[0]['vip'] == 0 or $manhuaChapter[0]['coin'] == 0 or session('vip') == 1 or !empty($buyStatus)){
            return view('frontend.mobile.manhuachapterview',compact('manhuaPhotos','manhua_id','manhuaChapter','manhua','chapterList','attribute'))->with('user', session('user'))->with('vip', session('vip'));
        }else{
            return view('frontend.mobile.manhuavipchapterview',compact('manhuaPhotos','manhua_id','manhuaChapter','manhua','chapterList','attribute'))->with('user', session('user'))->with('vip', session('vip'));
        }
    }

    public function vip(){
        $attribute = $this->attribute;
        $categories = $this->categories;
        return view('frontend.pc.vip',compact('attribute','categories'))->with('user', session('user'))->with('vip', session('vip'));
    }




}
