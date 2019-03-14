<?php 
namespace App\Http\Controllers\weixin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cache;
use App\model\TagsModel;

class weixinContorller extends Controller
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
     * 添加标签
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tagsAdd()
    {
        return view('tags.add');
    }

    /**
     * 执行添加标签
     */
    public function tagsAdo()
    {
        $tagsName = $_POST['tags_name'];
        if(empty($tagsName)){
            exit("2");
        }
        $url = "https://api.weixin.qq.com/cgi-bin/tags/create?access_token=".$this->accessToken();

        $arrTage = [
            'tag' => [
                'name' => $tagsName
            ]
        ];
        $json = json_encode($arrTage,JSON_UNESCAPED_UNICODE);

        $obj = new \Url();
        $bol = $obj->sendPost($url,$json);
        if($bol){
            echo '1';
        }

    }

    /**
     * 展示标签
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tagsShow()
    {
        $obj = new \Url();

        $url = "https://api.weixin.qq.com/cgi-bin/tags/get?access_token=".$this->accessToken();
        $tag_obj = $obj->sendGet($url);
        $tag_arr = json_decode($tag_obj,true);
//        echo'<pre>';print_r($tag_arr);echo '<pre>';exit;
        $data = [
            'arr' =>  $tag_arr['tags'],
        ];
//        var_dump($data);exit;
        return view('tags.show',$data);
    }

    /**
     * 删除标签
     */
    public function tagsDel(Request $request)
    {
        $id = $request->input('id');
//        echo'<pre>';print_r($id);echo '<pre>';exit;
        $url = "https://api.weixin.qq.com/cgi-bin/tags/delete?access_token=".$this->accessToken();
        $data = [
            "tag"=> [
                "id" => $id
            ]
        ];
        $json = json_encode($data);
        $obj = new \Url;
        $send = $obj->sendPost($url,$json);

    }

    /**
     * 修改标签
     */
    public function tagsUpdate(Request $request)
    {
        $id = $request->input('id');
        $data = [
            'id' => $id
        ];
        return view('tags.update',$data);
    }

    /**
     * 修改执行
     * @param Request $request
     */
    public function tagsUpdateDo(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('tags_name');
        //POST
        $url = "https://api.weixin.qq.com/cgi-bin/tags/update?access_token=".$this->accessToken();
        $data = [
            "tag" => [
                "id" => $id,
                "name" => $name
            ]
        ];

        $json = json_encode($data,JSON_UNESCAPED_UNICODE);
        $obj = new \Url;
        $send = $obj->sendPost($url,$json);
        return $send;

    }

    /**
     * 自定义菜单添加展示
     */
    public function menus()
    {
            return view('menus/menus');
    }

    /**
     * 自定义菜单添加执行
     */
    public function menusAdd()
    {
//        $data = $request->input();
//        var_dump($data);die;
//        return view('/menus');
        $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$this->accessToken();
        $data = [
        "button"=>[
            [
                "type"=>"click",
                "name"=>"娃娃",
                'key'=>123456
            ],

            [
                'type'=>'click',
                "name"=>"玩具",
                'key'=>123456
            ],

            [
                'type'=>'view',
                "name"=>"推广",
                'url'=>"https://www.baidu.com/"
            ]

        ]
    ];



        $json = json_encode($data,JSON_UNESCAPED_UNICODE);

        $obj = new \Url();

        $send = $obj->sendPost($url,$json);
//        var_dump($send);die;

        return $send;

    }

    /**
     * 自定义菜单展示列表
     */
    public function menusShow()
    {
        $url = "https://api.weixin.qq.com/cgi-bin/menu/get?access_token=".$this->accessToken();

        $obj = new \Url();
        $send = $obj->sendGet($url);
        $json = json_decode($send,true);
//        echo'<pre>';print_r($json['menu']);echo '<pre>';die;
        return view('menus.menusshow',$json['menu']);
    }

    /**
     * 用户管理
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public  function userManage()
    {
       //获取用户信息
        $url = "https://api.weixin.qq.com/cgi-bin/user/get?access_token=".$this->accessToken();
        $obj = new \Url;
        $send = $obj->sendGet($url);
        $arr = json_decode($send,true);
//        echo'<pre>';print_r($arr->data);echo '<pre>';

        $openid = $arr['data']['openid'];

        $url2 = "https://api.weixin.qq.com/cgi-bin/user/info/batchget?access_token=".$this->accessToken();

        foreach($openid as $k => $v){
            $d['user_list'][] = [
                "openid"=> $v,
                "lang"=> "zh_CN"
            ];
        }
//        echo'<pre>';print_r($d);echo '<pre>';die;

        $json2 = json_encode($d,JSON_UNESCAPED_UNICODE);
        $send2 = $obj->sendPost($url2,$json2);

        $json3 = json_decode($send2,true);




        $url3 = "https://api.weixin.qq.com/cgi-bin/tags/get?access_token=".$this->accessToken();
        $tag_obj = $obj->sendGet($url3);
        $tag_arr = json_decode($tag_obj,true);
        $json3['arr'] = $tag_arr['tags'];

//        echo'<pre>';print_r($json3);echo '<pre>';die;
        return view('user.manage',$json3);

    }

    /**
     * 批量拉黑
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function blacklist(Request $request)
    {
        $openid = $request->input('openid');
        $arr_openid = explode(',',rtrim($openid,','));

        $url = "https://api.weixin.qq.com/cgi-bin/tags/members/batchblacklist?access_token=".$this->accessToken();

        $d['openid_list'] = $arr_openid;
        $json = json_encode($d,JSON_UNESCAPED_UNICODE);

        $obj = new \Url;
        $send = $obj->sendPost($url,$json);

        return $send;

    }

    /**
     * 黑名名单单列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function blackShow()
    {
        $url = "https://api.weixin.qq.com/cgi-bin/tags/members/getblacklist?access_token=".$this->accessToken();

        $data = [
            "begin_openid" => ''
        ];
        $json = json_encode($data,JSON_UNESCAPED_UNICODE);
        $obj = new \Url;
        $send = $obj->sendPost($url,$json);
        $arr = json_decode($send,true);
        // 获取到了黑名单的用户openid

        if(empty($arr['data']['openid'])){
            exit('没有被拉黑的用户');
        }

        //获取基本信息
        $url2 = "https://api.weixin.qq.com/cgi-bin/user/info/batchget?access_token=".$this->accessToken();

        foreach($arr['data']['openid'] as $k => $v){
            $d['user_list'][] = [
                "openid"=> $v,
                "lang"=> "zh_CN"
            ];
        }
        $json2 = json_encode($d,JSON_UNESCAPED_UNICODE);
        $send2 = $obj->sendPost($url2,$json2);

        $json3 = json_decode($send2,true);
//        echo'<pre>';print_r($json3);echo '<pre>';die;
        return view('user.blackshow',$json3);
    }

    /**
     * 取消拉黑
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function offBlack(Request $request)
    {
        $openid = $request->input('openid');
//        echo $openid;
        $url = "https://api.weixin.qq.com/cgi-bin/tags/members/batchunblacklist?access_token=".$this->accessToken();
        $data = [
            "openid_list" => [
                $openid
            ]
        ];
        $json = json_encode($data,JSON_UNESCAPED_UNICODE);
        $obj = new \Url;
        $send = $obj->sendPost($url,$json);

        return redirect('/blackShow'); //重定向跳转

    }

    /**
     * 批量加入标签
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function joinTags(Request $request)
    {
        $openid = $request->input('openid');
        $arr_openid = explode(',',rtrim($openid,','));
        $tagid = $request->input('tagid');

        $url = "https://api.weixin.qq.com/cgi-bin/tags/members/batchtagging?access_token=".$this->accessToken();
        $data['openid_list'] = $arr_openid;
        $data['tagid'] = $tagid;
//        echo'<pre>';print_r($data);echo '<pre>';die;
        $json = json_encode($data,JSON_UNESCAPED_UNICODE);
        $obj = new \Url;
        $send = $obj->sendPost($url,$json);
        return $send;

    }

    /**
     * 查看标签下的用户
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function examine(Request $request)
    {
        $tagid = $request->input('tagid');
//        echo $tagid;die;
        $url = "https://api.weixin.qq.com/cgi-bin/user/tag/get?access_token=".$this->accessToken();
        $data = [
            "tagid" => $tagid,
            "next_openid"=>"" //第一个拉取的OPENID，不填默认从头开始拉取
        ];
        $json = json_encode($data,JSON_UNESCAPED_UNICODE);

        $obj = new \Url;
        $send = $obj->sendPost($url,$json);

        $arr = json_decode($send,true);

        if(empty($arr['data']['openid'])){
            exit('标签下没有用户');
        }
        //获取标签下的用户信息
        $url2 = "https://api.weixin.qq.com/cgi-bin/user/info/batchget?access_token=".$this->accessToken();

        foreach($arr['data']['openid'] as $k => $v){
            $d['user_list'][] = [
                "openid"=> $v,
                "lang"=> "zh_CN"
            ];
        }
//        echo'<pre>';print_r($d);echo '<pre>';die;

        $json2 = json_encode($d,JSON_UNESCAPED_UNICODE);
        $send2 = $obj->sendPost($url2,$json2);

        $json3 = json_decode($send2,true);

        $json3['tagid'] = $tagid;
//        echo'<pre>';print_r($json3);echo '<pre>';die;
        return view('tags.examine',$json3);
    }

    /**
     * 批量取消用户下的标签
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function examineOff(Request $request)
    {
        $openid = $request->input('openid');
        $arr_openid = explode(',',rtrim($openid,','));
        $tagid = $request->input('tagid');
//        echo $openid;echo $tagid;die;
        $url = "https://api.weixin.qq.com/cgi-bin/tags/members/batchuntagging?access_token=".$this->accessToken();

        $data['openid_list'] = $arr_openid;
        $data['tagid'] = $tagid;
        $json = json_encode($data,JSON_UNESCAPED_UNICODE);

        $obj = new \Url;
        $send = $obj->sendPost($url,$json);
        return $send;

    }





    //首页
    public function index()
    {
        return view('weixin.index');
    }





    //登陆
    public function login()
    {
        return view('weixin.login');
    }

}

