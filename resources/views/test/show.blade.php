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
            </div>
            <!-- banner 表格 显示 -->
            <div class="conShow">
                <table border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="100px" class="tdColor tdC">ID</td>
                        <td width="300px" class="tdColor">姓名</td>
                        <td width="200px" class="tdColor">年龄</td>
                    </tr>
                    @foreach($data as $v)
                    <tr>
                       <td>{{$v['id']}}</td>
                       <td>{{$v['name']}}</td>
                       <td>{{$v['age']}}</td>
                    </tr>
                    @endforeach
                </table>
                <div style="margin-left: 240px;margin-top: 20px;">
                    <a href="/redis/show?page={{$arrPage['first']}}">首页</a>
                    <a href="/redis/show?page={{$arrPage['prev']}}">上一页</a>
                    <a href="/redis/show?page={{$arrPage['next']}}">下一页</a>
                    <a href="/redis/show?page={{$arrPage['total']}}">尾页</a>
                </div>
            </div>
            <!-- banner 表格 显示 end-->
        </div>
        <!-- banner页面样式end -->
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
        location.href="/tags/show";
    });
    // $(".yes").click(function(){
    //
    // });
    $(".close").click(function(){
        $(".banDel").hide();
    });
    $(".no").click(function(){
        $(".banDel").hide();
    });
    $(".update").click(function(){
        location.href="/tags/tagsUpdate";
    });
    // 广告弹出框 end
</script>
</html>