<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>行家-有点</title>
    <link rel="stylesheet" type="text/css" href="css/css.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>

<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
                        href="#">公共管理</a>&nbsp;-</span>&nbsp;意见管理
        </div>
    </div>

    <div class="page">
        <!-- banner页面样式 -->
        <div class="connoisseur">
            <div class="conform">
                <form>
                    <div class="cfD">
                        工作年限：
                        <select>
                            <option>1年以内</option>
                        </select> 审核状态：
                        <label><input
                                    type="radio" checked="checked" name="styleshoice1" />&nbsp;未审核</label> <label><input
                                    type="radio" name="styleshoice1" />&nbsp;已通过</label> <label class="lar"><input
                                    type="radio" name="styleshoice1" />&nbsp;不通过</label> 推荐状态：<label><input
                                    type="radio" checked="checked" name="styleshoice2" />&nbsp;是</label><label><input
                                    type="radio" name="styleshoice2" />&nbsp;否</label>
                    </div>
                    <div class="cfD">
                        <input class="addUser" type="text" placeholder="输入用户名/ID/手机号/城市" />
                        <button class="button">搜索</button>
                        <a class="addA addA1" href="connoisseuradd.html">添加行家+</a>
                    </div>
                </form>
            </div>
            <!-- banner 表格 显示 -->
            <br class="conShow">
                <table border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="66px" class="tdColor tdC">序号</td>
                        <td width="170px" class="tdColor">头像</td>
                        <td width="135px" class="tdColor">用户名</td>
                        <td width="100px" class="tdColor">性别</td>
                        <td width="140px" class="tdColor">所在城市</td>
                        <td width="140px" class="tdColor">所在省</td>
                        <td width="175px" class="tdColor">添加时间</td>
                        <td width="150px" class="tdColor">操作</td>
                    </tr>
                    @foreach($user_info_list as $v)
                    <tr>
                        <td><input type="checkbox" openid="{{$v['openid']}}"></td>
                        <td><div class="onsImg">
                                <img src="{{$v['headimgurl']}}">
                            </div></td>
                        <td>{{$v['nickname']}}</td>
                        <td>
                            @if($v['sex']==1)
                                男
                            @else
                                女
                            @endif
                        </td>
                        <td>{{$v['city']}}</td>
                        <td>{{$v['province']}}</td>
                        <td>
                            {{date("Y-m-d H:i:s",$v['subscribe_time'])}}
                        </td>
                        <td><a href="connoisseuradd.html">
                                <img class="operation" src="img/update.png"></a>
                            <img class="operation delban" src="img/delete.png">
                        </td>
                    </tr>
                    @endforeach
                </table>

            <div class="cfD">
                <select class="tagid">
                    <option value="">请选择</option>
                    @foreach($arr as $k=>$v)
                    <option value="{{$v['id']}}">{{$v['name']}}</option>
                    @endforeach
                </select>
                <button class="button jointags" >批量加入标签</button>
                <button class="button blacklist" >批量拉黑</button>
            </div>

            </div>
            <!-- banner 表格 显示 end-->
        </div>
        <!-- banner页面样式end -->
    </div>

</div>


</body>

<script type="text/javascript">
    //加入黑名单

    $(".blacklist").click(function () {
        //g获取所有复选框
        var checkboxAll = $("[type='checkbox']");

        var openid = '';
        checkboxAll.each(function(){
            if($(this).prop('checked')==true){
                openid += $(this).attr('openid')+','
            }
        });
        // console.log(openid)
        $.ajax({
            url     :   '/blacklist',
            type    :   'post',
            data    :   {openid:openid},
            dataType:   'json',
            success :   function(d){
                if(d.errcode==0){
                    alert("以加入黑名单");
                }else{
                    alert("操作有误");
                }
            }
        });

    })

    //批量加入标签

    $(".jointags").click(function () {
        //获取所有复选框
        var checkboxAll = $("[type='checkbox']");
        var openid = '';
        // 获取下拉菜单
        var tagid = $(".tagid").val();
        // console.log(tagid)

        checkboxAll.each(function(){

            if($(this).prop('checked')==true){
                openid += $(this).attr('openid')+','
            }

        });
        // console.log(openid)
        $.ajax({
            url     :   '/joinTags',
            type    :   'post',
            data    :   {openid:openid,tagid:tagid},
            dataType:   'json',
            success :   function(d){
                if(d.errcode==0){
                    alert("已将用户批量加入标签");
                }else{
                    alert("操作有误");
                }
            }
        });

    })


</script>
</html>