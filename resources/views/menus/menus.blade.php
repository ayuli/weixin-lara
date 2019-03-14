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

    <div class="page" style="margin-left: 260px; margin-top: 80px;">
        <!-- banner页面样式 -->
        <div class="connoisseur">
            <!-- banner 表格 显示 -->
            <div class="coo">

                <div class="cfD clone2">
                    <button class="button clone" style="width: 30px;">+</button>
                    <input class="addUser c_name" type="text" placeholder="输入自定义菜单名" />
                    <select class="tagid extend">
                        <option value="">请选择类型</option>
                        <option value="click">点击事件</option>
                        <option value="view">跳转事件</option>
                        {{--<option value="scancode_waitmsg">扫码带提示</option>--}}
                        {{--<option value="scancode_push">扫码推事件</option>--}}
                        {{--<option value="pic_sysphoto">系统拍照发图</option>--}}
                        {{--<option value="pic_photo_or_album">拍照或者相册发图</option>--}}
                        {{--<option value="pic_weixin">微信相册发图</option>--}}
                        {{--<option value="location_select">发送位置</option>--}}
                        {{--<option value="media_id">图片</option>--}}
                        {{--<option value="view_limited">图文消息</option>--}}
                    </select>
                    <div class="cfD url" style="margin-left: 10px;display: none">
                        URL:&nbsp;<input type="text" class="addUser vall" style="width: 440px;" />
                    </div>
                    <div class="cfD key" style="margin-left: 10px;display: none">
                        KEY:&nbsp;<input type="text" class="addUser vall" style="width: 440px;" />
                    </div>
                </div>

            </div>
            <br><br>

        </div>
        <!-- banner页面样式end -->
        <!-- 发布 -->
        <div class="cfD">
            <button class="button publish" style="width: 478px; height: 40px;">发布</button>
        </div>
        <!-- 发布end -->
    </div>

</div>

</body>

<script type="text/javascript">

    $(function () {
        //内容改变事件
        $(document).on("change",".extend",function () {
            var _select = $(this).val();
            if(_select=="click"){
                $(this).next().next().show();
                $(this).next().hide();
            }else if(_select=="view"){
                $(this).next().show();
                $(this).next().next().hide();
            }else{
                $(this).next().next().hide();
                $(this).next().hide();
            }
        })


        //克隆
        $(document).on( "click",".clone",function() {
            if($(".clone2").size()>2){
                alert("自定义菜单不能超过3个");
                return false;
            }
            // console.log($(this).parent().find().first().html());
            var clone = $(this).parent().clone();
            $(this).parent().after(clone);
        });

        //发布
        $(".publish").click(function () {


            // var all = '';
            $(".extend").each(function () {
                var _this = $(this);
                var name = _this.prev().val()+',';
                var type = _this.val()+',';
                if(type=="view"){
                    var url= _this.next().children().val()+','
                }else{
                    var key = _this.next().next().children().val()+','
                }
                // all += name+type+url+key;
                // console.log(name)
                // console.log(type)
                // console.log(url)
                console.log(key)
            })
            // console.log(all)


            // $(".extend").each(function () {
            //     console.log($(this).val())
            // })

            // $(".vall").each(function () {
            //     console.log($(this).val())
            // })

            // var c_name = $(".c_name").val();
            // var extend = $(".extend").val();
            // console.log(c_name)
            // console.log(extend)

        })

    })

</script>
</html>