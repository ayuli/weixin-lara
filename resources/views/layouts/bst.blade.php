<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>@yield('title') -有点</title>

    <link rel="stylesheet" type="text/css" href="css/public.css" />
    <link rel="stylesheet" type="text/css" href="css/page.css" />

	<script src="js/jquery.min.js"></script>
    <script src="js/public.js"></script>

</head>
<body>

	<!-- 头部 -->
	<div class="head">
		<div class="headL">
			<img class="headLogo" src="{{URL::asset('/sucai/img/headLogo.png')}}" />
		</div>
		<div class="headR">
			<p class="p1">
				欢迎，
				<?php echo cookie('name')?>
			</p>
			<p class="p2">
				<a href="#" class="resetPWD">重置密码</a>&nbsp;&nbsp;<a
					href="{:U('Admin/Index/exit')}" class="goOut">退出</a>
			</p>
		</div>
		<!-- onclick="{if(confirm(&quot;确定退出吗&quot;)){return true;}return false;}" -->
	</div>

	<div class="closeOut">
		<div class="coDiv">
			<p class="p1">
				<span>X</span>
			</p>
			<p class="p2">确定退出当前用户？</p>
			<P class="p3">
				<a class="ok yes" href="#">确定</a><a class="ok no" href="#">取消</a>
			</p>
		</div>
	</div>
	@section('left')
		<!-- 左边节点 -->
		<div class="container">

			<div class="leftsidebar_box">
				<a href="../main.html" target="main"><div class="line">
						<img src="../img/coin01.png" />&nbsp;&nbsp;首页
					</div></a>
				<!-- <dl class="system_log">
                <dt><img class="icon1" src="../img/coin01.png" /><img class="icon2"src="../img/coin02.png" />
                    首页<img class="icon3" src="../img/coin19.png" /><img class="icon4" src="../img/coin20.png" /></dt>
            </dl> -->
				<dl class="system_log">
					<dt>
						<img class="icon1" src="../img/coin03.png" /><img class="icon2"
																		  src="../img/coin04.png" /> 网站管理<img class="icon3"
																											  src="../img/coin19.png" /><img class="icon4"
																																			 src="../img/coin20.png" />
					</dt>
					<dd>
						<img class="coin11" src="../img/coin111.png" /><img class="coin22"
																			src="../img/coin222.png" /><a class="cks" href="../user.html"
																										  target="main">管理员管理</a><img class="icon5" src="../img/coin21.png" />
					</dd>
				</dl>
				<dl class="system_log">
					<dt>
						<img class="icon1" src="../img/coin05.png" /><img class="icon2"
																		  src="../img/coin06.png" /> 公共管理<img class="icon3"
																											  src="../img/coin19.png" /><img class="icon4"
																																			 src="../img/coin20.png" />
					</dt>
					<dd>
						<img class="coin11" src="../img/coin111.png" /><img class="coin22"
																			src="../img/coin222.png" /><a class="cks" href="../banner.html"
																										  target="main">广告管理</a><img class="icon5" src="../img/coin21.png" />
					</dd>
					<dd>
						<img class="coin11" src="../img/coin111.png" /><img class="coin22"
																			src="../img/coin222.png" /><a class="cks" href="../opinion.html"
																										  target="main">意见管理</a><img class="icon5" src="../img/coin21.png" />
					</dd>
				</dl>
				<dl class="system_log">
					<dt>
						<img class="icon1" src="../img/coin07.png" /><img class="icon2"
																		  src="../img/coin08.png" /> 会员管理<img class="icon3"
																											  src="../img/coin19.png" /><img class="icon4"
																																			 src="../img/coin20.png" />
					</dt>
					<dd>
						<img class="coin11" src="../img/coin111.png" /><img class="coin22"
																			src="../img/coin222.png" /><a href="../vip.html" target="main"
																										  class="cks">会员管理</a><img class="icon5" src="../img/coin21.png" />
					</dd>
				</dl>
				<dl class="system_log">
					<dt>
						<img class="icon1" src="../img/coin10.png" /><img class="icon2"
																		  src="../img/coin09.png" /> 行家管理<img class="icon3"
																											  src="../img/coin19.png" /><img class="icon4"
																																			 src="../img/coin20.png" />
					</dt>
					<dd>
						<img class="coin11" src="../img/coin111.png" /><img class="coin22"
																			src="../img/coin222.png" /><a href="../connoisseur.html"
																										  target="main" class="cks">行家管理</a><img class="icon5"
																																				 src="../img/coin21.png" />
					</dd>
				</dl>
				<dl class="system_log">
					<dt>
						<img class="icon1" src="../img/coin11.png" /><img class="icon2"
																		  src="../img/coin12.png" /> 话题管理<img class="icon3"
																											  src="../img/coin19.png" /><img class="icon4"
																																			 src="../img/coin20.png" />
					</dt>
					<dd>
						<img class="coin11" src="../img/coin111.png" /><img class="coin22"
																			src="../img/coin222.png" /><a href="../topic.html" target="main"
																										  class="cks">话题管理</a><img class="icon5" src="../img/coin21.png" />
					</dd>
				</dl>
				<dl class="system_log">
					<dt>
						<img class="icon1" src="../img/coin14.png" /><img class="icon2"
																		  src="../img/coin13.png" /> 心愿管理<img class="icon3"
																											  src="../img/coin19.png" /><img class="icon4"
																																			 src="../img/coin20.png" />
					</dt>
					<dd>
						<img class="coin11" src="../img/coin111.png" /><img class="coin22"
																			src="../img/coin222.png" /><a href="../wish.html" target="main"
																										  class="cks">心愿管理</a><img class="icon5" src="../img/coin21.png" />
					</dd>
				</dl>
				<dl class="system_log">
					<dt>
						<img class="icon1" src="../img/coin15.png" /><img class="icon2"
																		  src="../img/coin16.png" /> 约见管理<img class="icon3"
																											  src="../img/coin19.png" /><img class="icon4"
																																			 src="../img/coin20.png" />
					</dt>
					<dd>
						<img class="coin11" src="../img/coin111.png" /><img class="coin22"
																			src="../img/coin222.png" /><a href="../appointment.html"
																										  target="main" class="cks">约见管理</a><img class="icon5"
																																				 src="../img/coin21.png" />
					</dd>
				</dl>
				<dl class="system_log">
					<dt>
						<img class="icon1" src="../img/coin17.png" /><img class="icon2"
																		  src="../img/coin18.png" /> 收支管理<img class="icon3"
																											  src="../img/coin19.png" /><img class="icon4"
																																			 src="../img/coin20.png" />
					</dt>
					<dd>
						<img class="coin11" src="../img/coin111.png" /><img class="coin22"
																			src="../img/coin222.png" /><a href="../balance.html"
																										  target="main" class="cks">收支管理</a><img class="icon5"
																																				 src="../img/coin21.png" />
					</dd>
				</dl>
				<dl class="system_log">
					<dt>
						<img class="icon1" src="../img/coinL1.png" /><img class="icon2"
																		  src="../img/coinL2.png" /> 系统管理<img class="icon3"
																											  src="../img/coin19.png" /><img class="icon4"
																																			 src="../img/coin20.png" />
					</dt>
					<dd>
						<img class="coin11" src="../img/coin111.png" /><img class="coin22"
																			src="../img/coin222.png" /><a href="../changepwd.html"
																										  target="main" class="cks">修改密码</a><img class="icon5"
																																				 src="../img/coin21.png" />
					</dd>
					<dd>
						<img class="coin11" src="../img/coin111.png" /><img class="coin22"
																			src="../img/coin222.png" /><a class="cks">退出</a><img
								class="icon5" src="../img/coin21.png" />
					</dd>
				</dl>

			</div>

		</div>
	@show

    @yield('content')

	{{--@section('foot')--}}

		{{--<!-- 登录页面头部 -->--}}
		{{--<div class="logHead">--}}
			{{--<img src="img/logLOGO.png" />--}}
		{{--</div>--}}
		{{--<!-- 登录页面头部结束 -->--}}

		{{--<!-- 登录body -->--}}
		{{--<div class="logDiv">--}}
			{{--<img class="logBanner" src="img/logBanner.png" />--}}
			{{--<div class="logGet">--}}
				{{--<!-- 头部提示信息 -->--}}
				{{--<div class="logD logDtip">--}}
					{{--<p class="p1">登录</p>--}}
					{{--<p class="p2">有点人员登录</p>--}}
				{{--</div>--}}
				{{--<!-- 输入框 -->--}}
				{{--<div class="lgD">--}}
					{{--<img class="img1" src="img/logName.png" /><input type="text"--}}
																	 {{--placeholder="输入用户名" />--}}
				{{--</div>--}}
				{{--<div class="lgD">--}}
					{{--<img class="img1" src="img/logPwd.png" /><input type="text"--}}
																	{{--placeholder="输入用户密码" />--}}
				{{--</div>--}}
				{{--<div class="lgD logD2">--}}
					{{--<input class="getYZM" type="text" />--}}
					{{--<div class="logYZM">--}}
						{{--<img class="yzm" src="img/logYZM.png" />--}}
					{{--</div>--}}
				{{--</div>--}}
				{{--<div class="logC">--}}
					{{--<button>登 录</button>--}}
				{{--</div>--}}
			{{--</div>--}}
		{{--</div>--}}
		{{--<!-- 登录body  end -->--}}

		{{--<!-- 登录页面底部 -->--}}
		{{--<div class="logFoot">--}}
			{{--<p class="p1">版权所有：南京设易网络科技有限公司</p>--}}
			{{--<p class="p2">南京设易网络科技有限公司 登记序号：苏ICP备11003578号-2</p>--}}
		{{--</div>--}}
		{{--<!-- 登录页面底部end -->--}}
	{{--@show--}}


</body>
</html>