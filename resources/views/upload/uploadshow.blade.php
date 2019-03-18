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

            <!-- banner 表格 显示 -->
            <div class="conShow">
                <table>
                    <tr>
                        <td width="100px" class="tdColor tdC">序号</td>
                        <td width="300px" class="tdColor">头像</td>
                        <td width="140px" class="tdColor">media_id</td>
                        <td width="200px" class="tdColor">添加时间</td>
                        <td width="200px" class="tdColor">过期时间</td>
                    </tr>
                    @foreach($arr as $v)
                        <tr>
                            <td>{{$v['id']}}</td>
                            <td>
                                <img src="{{$v['path']}}" height="100px" width="100px">
                            </td>
                            <td>{{$v['media_id']}}</td>
                            <td>{{date('Y-m-d H:i:s',$v['created_at'])}}</td>
                            <td>{{date('Y-m-d H:i:s',$v['end_time'])}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <!-- banner 表格 显示 end-->
        </div>
        <!-- banner页面样式end -->
    </div>
    <div class="paging">
        <a href="/uploadshow?page={{$first}}">首页</a>
        <a href="/uploadshow?page={{$prev}}">上一页</a>
        <a href="/uploadshow?page={{$next}}">下一页</a>
        <a href="/uploadshow?page={{$total}}">尾页</a>
    </div>
</div>

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