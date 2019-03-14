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
Route::get('/weixin', 'weixin\weixinContorller@test');



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







//Route::get('/login','weixin\weixinContorller@login'); //登陆

Route::get('/index','weixin\weixinContorller@index'); //首页


//获取accessToken
Route::get('/accessToken','weixin\weixinContorller@accessToken');




