<?php

namespace App\Http\Controllers\msg;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Common;
use Illuminate\Support\Facades\Redis;

class MsgController extends Common
{
    /**
     * 标签
     */
    public function tagMsgList()
    {
        $obj = new \Url();
        $url = "https://api.weixin.qq.com/cgi-bin/tags/get?access_token=".$this->accessToken();
        $tag_obj = $obj->sendGet($url);
        $tag_arr = json_decode($tag_obj,true);

        $json['arr'] = $tag_arr['tags'];
        return view('msg.tagmsglist',$json);
    }

    /**
     *根据标签群发
     */
    public function tagMsg(Request $request)
    {

        $text = $request->input('text');
        $tagid = $request->input('tagid');
        $url = "https://api.weixin.qq.com/cgi-bin/message/mass/sendall?access_token=".$this->accessToken();
        $data = [
            "filter"=>[
                "is_to_all"=>false,
                "tag_id"=>$tagid
            ],
           "text"=>[
                "content"=>$text
           ],
            "msgtype"=>"text"
        ];
        $json = json_encode($data,JSON_UNESCAPED_UNICODE);
        $obj = new \Url();
        $send = $obj->sendPost($url,$json);

        $str_da = json_decode($send,true);

        if($str_da['errcode']!=0){  //判断不成功不走缓存
            return $send;
        }
        //查询群发消息发送状态
        $status = $this->statusMsg($str_da['msg_id']);

        //存缓存
        $data = [
            'content' => $text,
            'type' => '标签',
            'status' => $status,
            'create_time' => time()
         ];
        $this->redisCache($data); //缓存的方法

        return $send;
    }

    /**
     * openid群发
     */
    public function openMsgList()
    {
        //获取关注列表的openid  然后获取用户基本信息
        $dataInfo = $this->userInfo();
        return view('msg.openmsglist',$dataInfo);
    }

    /**
     *根据openid群发
     */
    public function openMsg(Request $request)
    {
        $openid = $request->input('openid');
        $text = $request->input('text');
        $url = "https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token=".$this->accessToken();
        $data = [
            "touser"=>$openid,
            "text"=>[
                "content"=>$text
            ],
            "msgtype"=>"text"
        ];
        $json = json_encode($data,JSON_UNESCAPED_UNICODE);
        $obj = new \Url();
        $send = $obj->sendPost($url,$json);

        $str_da = json_decode($send,true);

        if($str_da['errcode']!=0){ //判断不成功不走缓存
            return $send;
        }

        //查询群发消息发送状态
        $status = $this->statusMsg($str_da['msg_id']);

        //存缓存
        $data = [
            'content' => $text,
            'type' => 'openid',
            'status' => $status,
            'create_time' => time()
        ];
        $this->redisCache($data);  //缓存的方法

        return $send;
    }

    /**
     * 删除群发
     */
    public function delMsg()
    {
        $url = "https://api.weixin.qq.com/cgi-bin/message/mass/delete?access_token=".$this->accessToken();
        $data = [
            "msg_id"=>1000000005
        ];
        $json = json_encode($data,JSON_UNESCAPED_UNICODE);
        $obj = new \Url();
        $send = $obj->sendPost($url,$json);
        var_dump($send);


    }

    /**
     * 查询群发消息发送状态
     */
    public function statusMsg()
    {
        $url = "https://api.weixin.qq.com/cgi-bin/message/mass/get?access_token=".$this->accessToken();
        $data = [
            "msg_id"=>1000000005
        ];
        $json = json_encode($data,JSON_UNESCAPED_UNICODE);
        $obj = new \Url();
        $send = $obj->sendPost($url,$json);
        $arr_msg = json_decode($send,true);
        return $arr_msg['msg_status'];
    }

    /**
     * redisCache 缓存
     */
    public function redisCache($data)
    {
        //哈希
        $id = Redis::incr('id'); //自增id
        $hash_key = 'msg_id_'.$id;

        Redis::hset($hash_key,'id',$id);
        Redis::hset($hash_key,'content',$data['content']);
        Redis::hset($hash_key,'type',$data['type']);
        Redis::hset($hash_key,'status',$data['status']);
        Redis::hset($hash_key,'create_time',$data['create_time']);
        //队列
        $list_key = "msg_list";
        Redis::rpush($list_key,$hash_key);

    }

    /**
     * 消息列表
     */
    public function msgList(Request $request)
    {
        $list_key = "msg_list";

        $page = $request->input('page',1);
        $page_num = 3;
        $start = ($page-1)*$page_num;
        $end = $start+$page_num-1;
        $total = ceil(Redis::llen($list_key)/$page_num);

        $list = Redis::lrange($list_key,$start,$end);
        $arr =[];
        foreach($list as $v){
            $da = Redis::hgetall($v);
            array_push($arr,$da);
        }
        //处理分页
        $prev = $page-1<1?1:$page-1;
        $next = $page+1>$total?$total:$page+1;

        $data = [
            'arr'=> $arr,
            'first' =>1,
            'prev' => $prev,
            'next' => $next,
            'total' => $total
        ];
        return view('msg.msgshow',$data);
    }

}
