<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class Common extends Controller
{

    public $appid = 'wxec28b3ff844e2bf3';
    public $appsecret = '25bf2acbd494c6856754eb96580f21f1';

    /**
     * 获取accessToken
     */
    public function accessToken()
    {
        $Cache = Cache('accessToken');

        if(!$Cache){
            $obj = new \Url();
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->appid."&secret=".$this->appsecret;

            $arrInfo = $obj->sendGet($url);

            $data = json_decode($arrInfo,true);

            $access_token = $data['access_token'];
            $expires_in = $data['expires_in'];

            //存进缓存
            Cache(['accessToken'=>$access_token],$expires_in);

        }
        return $Cache;
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
