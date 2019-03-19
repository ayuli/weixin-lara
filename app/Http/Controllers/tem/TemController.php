<?php

namespace App\Http\Controllers\tem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Common;
use Illuminate\Support\Facades\Redis;

class TemController extends Common
{

    /**
     *获取模板列表
     */
    public function getTem()
    {
        $url = "https://api.weixin.qq.com/cgi-bin/template/get_all_private_template?access_token=".$this->accessToken();
        $obj = new \Url();
        $send = $obj->sendGet($url);
        var_dump($send);
    }

    /**
     *删除模板
     */
    public function delTem()
    {
        $url = "https://api.weixin.qq.com/cgi-bin/template/del_private_template?access_token=".$this->accessToken();
        $data =[
            "template_id" => "WaEISfvsHuuAecpUvlCO1CDCOsbvqPUcaRrVUfcX7vs"
        ];

        $json = json_encode($data,JSON_UNESCAPED_UNICODE);
        $obj = new \Url();
        $send = $obj->sendPost($url,$json);
        var_dump($send);
    }

    /**
     *发送模板
     */
    public function sendTem(Request $request)
    {
        $openid = $request->input('openid');
//        echo $openid;die;
        $name = $request->input('name');
        $price = $request->input('price');
        $template_id = 'YciOOTHrkVyhCcHA0PDb4K6WkeKAsR6X8I2aARj2fqw';
        $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$this->accessToken();
        $data =[
            "touser" => $openid,
            'template_id' => $template_id,
            'data' => [
                'first' => [
                    'value' => '恭喜您购买成功!',
                    "color" => "#173177"
                ],
                'second' => [
                    'value' => $name,
                    "color" => "#173177"
                ],
                'thirdly' => [
                    'value' => $price.'元',
                    "color" => "#173177"
                ],
                'fourthly' => [
                    'value' => '2019年3月19日',
                    "color" => "#173177"
                ],
                'remark' => [
                    'value' => '欢迎再次购买！',
                    "color" => "#173177"
                ],
            ],
        ];

        $json = json_encode($data,JSON_UNESCAPED_UNICODE);
        $obj = new \Url();
        $send = $obj->sendPost($url,$json);

        $str_da = json_decode($send,true);

        if($str_da['errcode']!=0){  //判断是否发送成功 没有直接返回错误
            return $send;
        }
        //查询群发消息发送状态
        $status = $str_da['errmsg'];

        //存缓存
        $data = [
            'content' => '购买了'.$name,
            'type' => '模板',
            'status' => $status,
            'create_time' => time()
        ];
        $this->redisCache($data);

        return $send;
    }

    /**
     * 模板
     */
    public function temList()
    {
        //获取关注列表的openid  然后获取用户基本信息
        $dataInfo = $this->userInfo();
        return view('msg.temlist',$dataInfo);
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
    public function msgList()
    {
        $list_key = "msg_list";
        $list = Redis::lrange($list_key,0,-1);
        $arr =[];
        foreach($list as $v){
            $da = Redis::hgetall($v);
            array_push($arr,$da);
        }
        var_dump($arr);
    }

    /**
     * 获取关注列表的openid  然后获取用户基本信息
     * @return mixed
     */
    public function userInfo(){
        //获取用户信息
        $url_openid = "https://api.weixin.qq.com/cgi-bin/user/get?access_token=".$this->accessToken();
        $obj = new \Url;
        $send = $obj->sendGet($url_openid);
        $arr_openid = json_decode($send,true);

        $openid = $arr_openid['data']['openid'];
        $url_user = "https://api.weixin.qq.com/cgi-bin/user/info/batchget?access_token=".$this->accessToken();
        foreach($openid as $k => $v){
            $d['user_list'][] = [
                "openid"=> $v,
                "lang"=> "zh_CN"
            ];
        }
        $json_user = json_encode($d,JSON_UNESCAPED_UNICODE);
        $send_user = $obj->sendPost($url_user,$json_user);

        $dataInfo = json_decode($send_user,true);
        return $dataInfo;
    }
}


