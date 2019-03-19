<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>话题添加-有点</title>
    <link rel="stylesheet" type="text/css" href="css/css.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
<div id="pageAll">
    <div class="page ">
        <!-- 上传广告页面样式 -->
        <div class="banneradd bor">
            <div class="baTopNo">
                <span>模板群发</span>
            </div>
            <div class="baBody">
                <div class="cfD">
                    用户:
                    <select name="" id="">
                        <option value="">请选择</option>
                    @foreach($user_info_list as $key => $value)
                        <option value="{{$value['openid']}}">{{$value['nickname']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="bbD">
                    商品名称：<input type="text" id="name" class="input3" />
                </div>
                <div class="bbD">
                    商品价格：<input type="text" id="price" class="input3" />
                </div>
                <div class="bbD">
                    <p class="bbDP">
                        <button class="btn_ok btn_yes"  href="#">提交</button>
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
    $(".btn_yes").click(function(){
        var id = $("[name='user']").val();
        var data ={};

        data.id = id;
        data.name = $('#name').val();
        data.price = $("#price").val();
        // console.log(data);
        $.ajax({
            type:"post",
            data:data,
            url :'/sendtem',
            dataType : 'json',
            success : function(d){
                if(d.errcode==0){
                    alert("发送成功")
                }

            }
        })

    })
</script>