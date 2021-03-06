<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//    echo phpinfo();exit;
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//微信
Route::get('/test', 'weixin\weixinContorller@test');


//redis 测试
Route::get('/redis/add','weixin\weixinContorller@testAdd');
Route::post('/redis/addo','weixin\weixinContorller@testAddDo');
Route::get('/redis/show','weixin\weixinContorller@testShow');//展示




//微信后台管理
Route::get('/head','weixin\moContorller@head');
Route::get('/left','weixin\moContorller@left');
Route::get('/foot','weixin\moContorller@foot');
Route::get('/main','weixin\moContorller@main');
//标签管理
Route::get('/tags/add','weixin\weixinContorller@tagsAdd');  //创建
Route::post('/tags/addo','weixin\weixinContorller@tagsAdo'); //执行添加
Route::get('/tags/show','weixin\weixinContorller@tagsShow'); //展示
Route::post('/tags/tagsDel','weixin\weixinContorller@tagsDel'); //删除
Route::get('/tags/tagsUpdate','weixin\weixinContorller@tagsUpdate'); //修改
Route::post('/tags/tagsUpdateDo','weixin\weixinContorller@tagsUpdateDo'); //修改执行


//用户管理
Route::any('/userManage','weixin\weixinContorller@userManage'); //修改


//自定义菜单
Route::get('/menus','weixin\weixinContorller@menus'); //添加展示
Route::post('/menus/add','weixin\weixinContorller@menusAdd'); //创建
Route::get('/menus/show','weixin\weixinContorller@menusShow'); //展示列表

//批量拉黑
Route::post('/blacklist','weixin\weixinContorller@blacklist'); //拉黑
Route::get('/blackShow','weixin\weixinContorller@blackShow'); //拉黑列表
Route::get('/offBlack','weixin\weixinContorller@offBlack'); //取消拉黑

Route::post('/joinTags','weixin\weixinContorller@joinTags'); //批量加入标签
Route::get('/examine','weixin\weixinContorller@examine'); //查看标签下的用户
Route::post('/examineOff','weixin\weixinContorller@examineOff'); //批量取消标签下的用户

// 上传临时素材
Route::get('/uploadfile','weixin\weixinContorller@uploadFile');
Route::post('/uploadfiledo','weixin\weixinContorller@uploadFileDo'); //上传临时素材执行
Route::post('/uploadajax','weixin\weixinContorller@uploadAjax'); //无调转显示图片
Route::get('/uploadshow','weixin\weixinContorller@uploadShow'); //无调转显示图片


//群发
Route::get('/tagmsglist','msg\MsgController@tagMsgList'); //根据标签群发
Route::get('/openmsglist','msg\MsgController@openMsgList'); //根据openid群发


Route::get('/msglist','msg\MsgController@msgList'); //消息列表


Route::post('/tagmsg','msg\MsgController@tagMsg'); //根据标签群发
Route::post('/openmsg','msg\MsgController@openMsg'); //根据openid群发
Route::post('/delmsg','msg\MsgController@delMsg'); //删除群发
Route::post('/statusmsg','msg\MsgController@statusMsg'); //查询群发消息发送状态


//模板
Route::get('/temlist','tem\TemController@temList'); //获取模板列表


Route::get('/gettem','tem\TemController@getTem'); //获取模板列表
Route::post('/deltem','tem\TemController@delTem'); //删除模板
Route::post('/sendtem','tem\TemController@sendTem'); //发送模板




//Route::get('/login','weixin\weixinContorller@login'); //登陆

Route::get('/index','weixin\weixinContorller@index'); //首页


//获取accessToken
Route::get('/accessToken','weixin\weixinContorller@accessToken');




