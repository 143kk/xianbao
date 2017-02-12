<?php

namespace App\Http\Controllers;

use Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getFromZuanke8(){
        $page = "http://www.zuanke8.com/forum.php?mod=forumdisplay&fid=19&filter=author&orderby=dateline";
        $rules = array(
            'title' => array('.s.xst', 'text'),
            'link' => array('.s.xst', 'href'),
            'published_at' => array('.by>em>span', 'text'),
            'look_count' => array('.num em', 'text'),
        );
        $title="赚客吧最新线报";
        $p=Post::findOrGet('zuanke8',$page,$rules);
        return view('list',compact("p","title"));
    }
    public function getFromXianbao5(){
        $page="http://www.xianbao5.com/forum.php?mod=guide&view=newthread";
        $rules=array(
            'title'=>array('.comeing_channel_threadlist_sub h3 a','text'),
            'link'=>array('.comeing_channel_threadlist_sub h3 a','href'),
            'published_at'=>array('.comeing_channel_threadlist_sub p','text','-a -span'),
            'look_count'=>array('.comeing_channel_threadlist_info p span:last-child','text'),
        );
        $p=Post::findOrGet('xianbao5',$page,$rules);
        $title="线报屋最新线报";
        return view('list',compact("p","title"));
    }
    public function getFromYueyun(){
        $page="http://www.6yyw.com/forum.php?mod=forumdisplay&fid=80&filter=author&orderby=dateline";
        $rules=array(
            'title'=>array('.s.xst','text'),
            'link'=>array('.s.xst','href'),
            'published_at'=>array('.by>em>span','text'),
            'look_count'=>array('.num em','text'),
        );
        $p=Post::findOrGet('yueyun',$page,$rules);
        $title="月云网最新线报";
        return view('list',compact("p","title"));
    }
    public function getFromAiq(){
        $page="http://www.iqshw.com/";
        $rules=array(
            'title'=>array('a','text'),
            'link'=>array('a','href','',function ($content){
                return 'http://www.iqshw.com'.$content;
            }),
            'published_at'=>array('em','text'),
        );
        $area=".cat-container .news-comm-wrap ul li";
        $p=Post::findOrGet('aiq',$page,$rules,$area);
        $title="爱Q生活网最新线报";
        return view('list',compact("p","title"));
    }
    public function getFromXunbaoge(){
        $page="http://www.xunbaoge.com/";
        $rules=array(
            'title'=>array('.first-posts-title span,.span6.column2.first-column ul .other-news a','text'),
            'link'=>array('.first-posts-title,.span6.column2.first-column ul .other-news a','href'),
            'published_at'=>array('p.post-meta:nth-child(4) > span:nth-child(1) > span:nth-child(2),.span6.column2.first-column ul .other-news span','text'),
        );
        $p=Post::findOrGet('xunbaoge',$page,$rules,null,null,null);
        $title="寻宝阁最新线报";
        return view('list',compact("p","title"));
    }
}
