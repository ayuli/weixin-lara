<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>行家-有点</title>
    <link rel="stylesheet" type="text/css" href="/css/css.css" />
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>

<body>
<div id="pageAll">


    <div class="page">
        <!-- banner页面样式 -->
        <div class="connoisseur">
            <div class="conform">
                <form>
                    <div class="cfD">
                        <input class="addUser" type="text" placeholder="输入用户名/ID/手机号/城市" />
                        <button class="button">搜索</button>
                        <a class="addA addA1" href="connoisseuradd.html">添加行家+</a>
                    </div>
                </form>
            </div>
            <!-- banner 表格 显示 -->
            <div class="conShow">
                <table border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="100px" class="tdColor tdC">序号</td>
                        <td width="300px" class="tdColor">菜单名</td>
                        <td width="140px" class="tdColor">类型</td>
                        <td width="200px" class="tdColor">操作</td>
                    </tr>
                    @foreach($button as $k=>$v)
                    <tr>
                        <td></td>

                        <td>{{$v['name']}}</td>
                        <td>
                            @if($v['type']=="click")
                                点击事件
                                @elseif($v['type']=="view")
                                推送事件
                            @endif
                        </td>
                        <td>
                            <a href="/tags/tagsUpdate?id=">
                                <img class="operation update" src="/img/update.png">
                            </a>
                            <img class="operation delban" src="/img/delete.png">
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <!-- banner 表格 显示 end-->
        </div>
        <!-- banner页面样式end -->
    </div>

</div>


<!-- 删除弹出框 -->
<div class="banDel">
    <div class="delete">
        <div class="close">
            <a><img src="/img/shanchu.png" /></a>
        </div>
        <p class="delP1">删除成功</p>
        <p class="delP2">
            <a class="ok no" >确定</a>
        </p>
    </div>
</div>
<!-- 删除弹出框  end-->
</body>

<script type="text/javascript">
    // 广告弹出框
    $(".delban").click(function(){
        var id = $(this).parents('tr').children().first().html();
        // console.log(id)
        $.ajax({
            url     :   '/tags/tagsDel',
            type    :   'post',
            data    :   {id:id},
            // dataType:   'json',
            success :   function(d){
                console.log(d)
            }
        });

        $(".banDel").show();

    });
    // $(".yes").click(function(){
    //
    // });
    $(".close").click(function(){
        $(".banDel").hide();
    });
    $(".no").click(function(){
        $(".banDel").hide();
        location.href="/tags/show";
    });

    // 广告弹出框 end
</script>
</html>