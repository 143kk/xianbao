<?php

namespace App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Facade;
use QL\QueryList;
use Carbon\Carbon;

class Post
{
    protected $data;
    protected $is_cache = 0;
    protected $name;
    public function __get($name)
    {
        // TODO: Implement __get() method.
        return $this->$name;
    }

    public function findOrGet($name,$page,$rules,$area='',$to='UTF-8',$from='GB2312'){
        $this->name=$name;
        if(Cache::has($name)){
            $str = Cache::get($name);
            $this->data=unserialize($str);
            $this->is_cache = 1;
        }else {
            $this->data = QueryList::Query($page, $rules,$area,$to, $from)->data;
            $str = serialize($this->data);
            $expiresAt = Carbon::now()->addMinutes(1);
            Cache::put($name, $str, $expiresAt);
            Cache::put($name.'_update',Carbon::now(),$expiresAt);
        }
        return $this;
    }
    public function getLastUpdateTime(){
        return Cache::get($this->name.'_update');
    }
}
