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
                        <td width="100px" class="tdColor tdC">序号</td>
                        <td width="300px" class="tdColor">内容</td>
                        <td width="140px" class="tdColor">类型</td>
                        <td width="140px" class="tdColor">状态</td>
                        <td width="180px" class="tdColor">添加时间</td>
                        <td width="160px" class="tdColor">操作</td>
                    </tr>
                    @foreach($arr as $k=>$v)
                    <tr>
                        <td>{{$v['id']}}</td>
                        <td>{{$v['content']}}</td>
                        <td>{{$v['type']}}</td>
                        <td>{{$v['status']}}</td>
                        <td>{{date('Y-m-d H:i:s',$v['create_time'])}}</td>
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
            <a href="/msglist?page={{$first}}">首页</a>
            <a href="/msglist?page={{$prev}}">上一页</a>
            <a href="/msglist?page={{$next}}">下一页</a>
            <a href="/msglist?page={{$total}}">尾页</a>
        </div>
        <!-- banner页面样式end -->
    </div>

</div>

</body>

<script type="text/javascript">

</script>
</html>