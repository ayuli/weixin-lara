<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>头部-有点</title>
    <link rel="stylesheet" type="text/css" href="css/css.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
<div id="pageAll">

    <div class="page ">
        <!-- 上传广告页面样式 -->
        <div class="banneradd bor">
            <div class="baTop">
                <span>OPENID发送</span>
            </div>
            <div class="baBody">
                <div class="bbD">
                    <div>用户：<div>
                            <div class="info" style="width:50%;margin-left:31px;margin-top:-16px">
                                @foreach($user_info_list as $v)
                                    <label>
                                        <input type="checkbox"  value="{{$v['openid']}}" name="user"/>{{$v['nickname']}}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="bbD">
                            内容：
                            <div class="btext">
                                <textarea class="text2"></textarea>
                            </div>
                        </div>
                        <div class="bbD">
                            <p class="bbDP">
                                <button class="btn_ok btn_yes" href="#" name="btn">发送</button>
                                <a class="btn_ok btn_no" href="#">取消</a>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 上传广告页面样式end -->
            </div>
        </div>
</body>
</html>

<script>
    $(document).ready(function(){
       $("button[name=btn]").click(function () {
           var text2 = $(".text2").val();

           var openid = [];
           var data = {};
           $("input[name=user]").each(function () {
               if($(this).is(":checked")){
                   var val = $(this).val();
                   openid.push(val);
               }
           });
           if(openid.length<2){
               alert("群发最少选择2名用户")
               return false;
           };

           data.openid = openid;
           data.text = text2;

           $.ajax({
               url     :   '/openmsg',
               type    :   'post',
               data    :   data,
               dataType:   'json',
               success :   function(d){
                   if(d.errcode==0){
                       alert("发送成功")
                   }
               }
           });
       })
    });
</script>
