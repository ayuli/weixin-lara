<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>话题添加-有点</title>
    <link rel="stylesheet" type="text/css" href="/css/css.css" />
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/ajaxfileupload.js"></script>
    {{--<script type="text/javascript" src="/js/jquery.min.js"></script>--}}
</head>
<body>
<div id="pageAll">

    <div class="page ">
        <!-- 上传广告页面样式 -->
        <div class="banneradd bor">
            <div class="baTopNo">
                <span>临时素材添加</span>
            </div>
            <div class="baBody">
                <div class="bbD">
                    上传图片：
                    <div class="bbDd">
                        <div class="bbDImg">+</div>
                        <input type="file" class="file" id="file" name="file" />
                        {{--<a class="bbDDel" href="#">删除</a>--}}
                    </div>
                </div>

                <div class="bbD">
                    <p class="bbDP">
                        <button class="btn_ok btn_yes delban" >上传</button>
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


    $("#file").change(function(){
        // console.log(1)
        $.ajaxFileUpload({
            type : "post",          //上传类型
            url: '/uploadajax',     //用于文件上传的服务器端请求地址
            secureuri: false,   //是否需要安全协议，一般设置为false
            fileElementId: 'file',  //文件上传域的ID
            dataType: 'json',   //返回值类型 一般设置为json
            success: function (data, status)  //服务器成功响应处理函数
            {
                // $('.bbDImg').empty()
                $('.bbDImg').html("<img src='"+data+"' height=180px'>")
                // $('.bbDImg').append("<input type='hidden' id='path' name='path' value='"+data.path+"'>")

                // console.log(data)
            }

        })
    })



    // $(".delban").click(function () {
    //     var path = $("#path").val();
    //     $.ajax({
    //         url     :   '/uploadfiledo',
    //         type    :   'post',
    //         data    :   {path:path},
    //         // dataType:   'json',
    //         success :   function(d){
    //         console.log(d)
    //
    //         }
    //     });
    // });




});


</script>