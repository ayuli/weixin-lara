<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>话题添加-有点</title>
    <link rel="stylesheet" type="text/css" href="/css/css.css" />
    <script type="text/javascript" src="/js/jquery.min.js"></script>
</head>
<body>
<div id="pageAll">

    <div class="page">
        <!-- 上传广告页面样式 -->
        <div class="banneradd bor">
            <div class="baTopNo">
                <span>标签添加</span>
            </div>
            <div class="baBody">
                <div class="bbD">
                    <input type="hidden" class ="input34" value="{{$id}}" name="id">
                    标签名：<input type="text" class="input3" name="tagsName" />
                </div>

                <div class="bbD">
                    <p class="bbDP">
                        <button class="btn_ok btn_yes delban" >提交</button>
                        <a class="btn_ok btn_no" href="#">取消</a>
                    </p>
                </div>
            </div>
        </div>

        <!-- 上传广告页面样式end -->
    </div>
</div>

    <div class="banDel">
        <div class="delete">
            <div class="close">
                <a><img src="/img/shanchu.png" /></a>
            </div>
            <p class="delP1">添加成功</p>
            <p class="delP2">
                <a class="ok no">确定</a>
            </p>
        </div>
    </div>
</body>
</html>

<script>

$(function () {
    $(".btn_yes").click(function () {
        var tags_name = $(".input3").val();
        var id = $(".input34").val();
        // console.log(id)
        // console.log(tags_name);
        $.ajax({
            url     :   '/tags/tagsUpdateDo',
            type    :   'post',
            data    :   {tags_name:tags_name,id:id},
            dataType:   'json',
            success :   function(d){
                // console.log(d)
                if(d.errcode==0){
                    location.href="/tags/show"
                }

            }
        });
    });




});


</script>