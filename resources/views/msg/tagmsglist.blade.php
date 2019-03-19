<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>消息管理-群发</title>
    <link rel="stylesheet" type="text/css" href="css/css.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
<div id="pageAll">

    <div class="page ">
        <!-- 上传广告页面样式 -->
        <div class="banneradd bor">
            <div class="baTopNo">
                <span>标签群发</span>
            </div>
            <div class="baBody">
                <div class="cfD">
                    标签:
                    <select class="tagid">
                        <option value="">请选择</option>
                        @foreach($arr as $k=>$v)
                            <option value="{{$v['id']}}">{{$v['name']}}</option>
                        @endforeach
                    </select>
                <div class="bbD">
                    内容：
                    <div class="btext">
                        <textarea class="text2"></textarea>
                    </div>
                </div>
                <div class="bbD">
                    <p class="bbDP">
                        <button class="btn_ok btn_yes jointags" href="#" name="btn">发送</button>
                        <a class="btn_ok btn_no" href="#">取消</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<script>
    $(function () {
        $(".jointags").click(function () {
            var text2 = $(".text2").val(); //text文本内容
            var tagid = $(".tagid").val(); // 获取下拉菜单
            $.ajax({
                url     :   '/tagmsg',
                type    :   'post',
                data    :   {text:text2,tagid:tagid},
                dataType:   'json',
                success :   function(d){
                    if(d.errcode==0){
                        alert("发送成功")
                    }else{
                        alert(d.errmsg)
                    }
                }
            });

        })
    })

</script>