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

    <div class="page" style="margin-left: 200px; margin-top: 80px;">
        <!-- banner页面样式 -->
        <div class="connoisseur">
            <!-- banner 表格 显示 -->
            <div class="coo">

                <div class="cfD clone2">
                    <button class="button clone" style="width: 30px;">+</button>
                    <input class="addUser username" type="text" placeholder="输入一级菜单名" />
                    <select class="tagid genre alike">
                        <option value="">请选择类型</option>
                        <option value="click">点击事件</option>
                        <option value="view">跳转事件</option>
                    </select>
                    <div class="cfD url" style="margin-left: 10px;display: none">
                        URL:&nbsp;<input type="text" class="addUser keyurl" style="width: 440px;" />
                    </div>

                    {{--<div class="cfD clone3" style="margin-left: 60px;">--}}
                        {{--<button class="button clone" style="width: 30px;">+</button>--}}
                        {{--<input class="addUser username2" type="text" placeholder="输入二级级菜单名" />--}}
                        {{--<select class="tagid genre2 alike2">--}}
                            {{--<option value="">请选择类型</option>--}}
                            {{--<option value="click">点击事件</option>--}}
                            {{--<option value="view">跳转事件</option>--}}
                        {{--</select>--}}
                        {{--<div class="cfD url" style="margin-left: 10px;display: none">--}}
                            {{--URL:&nbsp;<input type="text" class="addUser keyurl2" style="width: 440px;" />--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}



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
        $(document).on("change",".genre",function () {
            var _select = $(this).val();
            if(_select=="click"){
                $(this).next().html("KEY:&nbsp;<input type='text' class='addUser keyurl' style='width: 440px;' />")
                $(this).next().show();
            }else if(_select=="view"){
                $(this).next().html("URL:&nbsp;<input type='text' class='addUser keyurl' style='width: 440px;' />")
                $(this).next().show();
            }else{
                $(this).next().next().hide();
                $(this).next().hide();
            }
        })


        // $(document).on("change",".genre2",function () {
        //     var _select = $(this).val();
        //     if(_select=="click"){
        //         $(this).next().html("KEY:&nbsp;<input type='text' class='addUser keyurl2' style='width: 440px;' />")
        //         $(this).next().show();
        //     }else if(_select=="view"){
        //         $(this).next().html("URL:&nbsp;<input type='text' class='addUser keyurl2' style='width: 440px;' />")
        //         $(this).next().show();
        //     }else{
        //         $(this).next().next().hide();
        //         $(this).next().hide();
        //     }
        // })
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


            var name = [];
            $(".username").each(function () {
                var _this = $(this);
                name.push(_this.val())
            });
            var arr = [];
            $(".alike").each(function () {
                var _this = $(this);
                arr.push(_this.val())
            });
            var keyurl = [];
            $(".keyurl").each(function () {
                var _this = $(this);
                keyurl.push(_this.val())
            });

            var name2 = [];
            $(".username2").each(function () {
                var _this = $(this);
                name2.push(_this.val())
            });
            var arr2 = [];
            $(".alike2").each(function () {
                var _this = $(this);
                arr2.push(_this.val())
            });
            var keyurl2 = [];
            $(".keyurl2").each(function () {
                var _this = $(this);
                keyurl2.push(_this.val())
            });

            $.ajax({
                url : '/menus/add',
                type: 'post',
                data : {name:name,type:arr,keyurl:keyurl,name2:name2,type2:arr2,keyurl2:keyurl2},
                dataType:   'json',
                success :   function(d){
                    // if(d.errcode==0){
                    //     alert("创建成功");
                    // }
                    console.log(d)
                }

            })


        })

    })

</script>
</html>








{{--<form action="">--}}
    {{--<div class="one_div">--}}
        {{--<h5>一级菜单</h5>--}}
        {{--类型：--}}
        {{--<select name="one_type" class="one_type">--}}
            {{--<option value="view">网页类型</option>--}}
            {{--<option value="click">点击类型</option>--}}
            {{--<option value="miniprogram">小程序类型</option>--}}
        {{--</select>--}}
        {{--名称：--}}
        {{--<input type="text">--}}
        {{--键名--}}
        {{--<input type="text">--}}
        {{--<button ><a href="#" class="one_clone">克隆</a></button>--}}
        {{--<input type="button" class="one_clone" value="克隆">--}}
        {{--<div class="two_div">--}}
            {{--<h5>二级菜单</h5>--}}
            {{--二级菜单类型：--}}
            {{--<select name="two_type" class="two_type">--}}
                {{--<option value="">---请选择---</option>--}}
                {{--<option value="view">网页类型</option>--}}
                {{--<option value="click">点击类型</option>--}}
                {{--<option value="miniprogram">小程序类型</option>--}}
            {{--</select>--}}
            {{--二级菜单名称：--}}
            {{--<input type="text">--}}
            {{--二级菜单键名--}}
            {{--<input type="text">--}}
            {{--<input type="button" class="two_clone" value="克隆">--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</form>--}}
{{--<script src="{{URL::asset('/js/jquery-3.2.1.min.js')}}"></script>--}}
{{--<script>--}}
    {{--$(function () {--}}
        {{--//一级菜单克隆--}}
        {{--$(document).on('click','.one_clone',function () {--}}
            {{--var _this=$(this)--}}
            {{--var _num=$('.one_type').length--}}
            {{--if(_num>2){--}}
                {{--alert('以及菜单最多三个')--}}
                {{--return false--}}
            {{--}--}}
            {{--var _div=$('.one_div').parent().children().first().html();--}}
            {{--var _div="<div class='one_div'>"+_div+"</div>"--}}
            {{--_this.parent().last().after(_div)--}}

        {{--})--}}
        {{--//二级菜单克隆--}}
        {{--$(document).on('click','.two_clone',function () {--}}
            {{--var _this=$(this)--}}
            {{--var _num=_this.parent().siblings('div').length--}}
            {{--if(_num>=4){--}}
                {{--alert('二级菜单最多五个')--}}
                {{--return false--}}
            {{--}--}}
            {{--var two_div=_this.parent().html()--}}
            {{--var _div="<div class='two_div'>"+two_div+"</div>"--}}
            {{--_this.parent().after(_div)--}}
        {{--})--}}
    {{--})--}}
{{--</script>--}}