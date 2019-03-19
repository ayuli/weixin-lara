<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>首页左侧导航</title>
    <link rel="stylesheet" type="text/css" href="css/public.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/public.js"></script>
    <head></head>

<body id="bg">
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
                <img class="icon1" src="../img/coin03.png" />
                <img class="icon2" src="../img/coin04.png" /> 网站管理
                <img class="icon3" src="../img/coin19.png" />
                <img class="icon4"
                     src="../img/coin20.png" />
            </dt>
            <dd>
                <img class="coin11" src="../img/coin111.png" />
                <img class="coin22" src="../img/coin222.png" />
                <a class="cks" href="../user.html" target="main">管理员管理</a>
                <img class="icon5" src="../img/coin21.png" />
            </dd>
        </dl>
        <dl class="system_log">
            <dt>
                <img class="icon1" src="../img/coin05.png" />
                <img class="icon2" src="../img/coin06.png" />
                标签管理
                <img class="icon3" src="../img/coin19.png" />
                <img class="icon4" src="../img/coin20.png" />
            </dt>
            <dd>
                <img class="coin11" src="../img/coin111.png" />
                <img class="coin22" src="../img/coin222.png" />
                <a class="cks" href="/tags/add" target="main">添加标签</a>
                <img class="icon5" src="../img/coin21.png" />
            </dd>
            <dd>
                <img class="coin11" src="../img/coin111.png" />
                <img class="coin22" src="../img/coin222.png" />
                <a class="cks" href="tags/show" target="main">标签列表</a>
                <img class="icon5" src="../img/coin21.png" />
            </dd>
        </dl>
        <dl class="system_log">
            <dt>
                <img class="icon1" src="../img/coin07.png" />
                <img class="icon2" src="../img/coin08.png" />
                用户管理
                <img class="icon3" src="../img/coin19.png" />
                <img class="icon4" src="../img/coin20.png" />
            </dt>
            <dd>
                <img class="coin11" src="../img/coin111.png" />
                <img class="coin22" src="../img/coin222.png" />
                <a href="/userManage" target="main" class="cks">
                    用户展示</a>
                <img class="icon5" src="../img/coin21.png" />
            </dd>
            <dd>
                <img class="coin11" src="../img/coin111.png" />
                <img class="coin22" src="../img/coin222.png" />
                <a class="cks" href="/blackShow" target="main">黑名单列表</a>
                <img class="icon5" src="../img/coin21.png" />
            </dd>
        </dl>
        <dl class="system_log">
            <dt>
                <img class="icon1" src="../img/coin10.png" />
                <img class="icon2" src="../img/coin09.png" />
                行家管理
                <img class="icon3" src="../img/coin19.png" />
                <img class="icon4" src="../img/coin20.png" />
            </dt>
            <dd>
                <img class="coin11" src="../img/coin111.png" />
                <img class="coin22" src="../img/coin222.png" />
                <a href="../connoisseur.html" target="main" class="cks">
                    行家管理</a>
                <img class="icon5" src="../img/coin21.png" />
            </dd>
        </dl>
        <dl class="system_log">
            <dt>
                <img class="icon1" src="../img/coin11.png" />
                <img class="icon2" src="../img/coin12.png" />
                群发
                <img class="icon3" src="../img/coin19.png" />
                <img class="icon4" src="../img/coin20.png" />
            </dt>
            <dd>
                <img class="coin11" src="../img/coin111.png" />
                <img class="coin22" src="../img/coin222.png" />
                <a href="/tagmsglist" target="main" class="cks">
                    标签群发
                </a>
                <img class="icon5" src="../img/coin21.png" />
            </dd>
            <dd>
                <img class="coin11" src="../img/coin111.png" />
                <img class="coin22" src="../img/coin222.png" />
                <a href="/openmsglist" target="main" class="cks">
                    openid群发
                </a>
                <img class="icon5" src="../img/coin21.png" />
            </dd>
            <dd>
                <img class="coin11" src="../img/coin111.png" />
                <img class="coin22" src="../img/coin222.png" />
                <a href="/temlist" target="main" class="cks">
                    模板发送
                </a>
                <img class="icon5" src="../img/coin21.png" />
            </dd>
            <dd>
                <img class="coin11" src="../img/coin111.png" />
                <img class="coin22" src="../img/coin222.png" />
                <a href="/msglist" target="main" class="cks">
                    消息列表
                </a>
                <img class="icon5" src="../img/coin21.png" />
            </dd>
        </dl>
        <dl class="system_log">
            <dt>
                <img class="icon1" src="../img/coin14.png" />
                <img class="icon2" src="../img/coin13.png" /> 自定义菜单管理
                <img class="icon3" src="../img/coin19.png" />
                <img class="icon4" src="../img/coin20.png" />
            </dt>
            <dd>
                <img class="coin11" src="../img/coin111.png" />
                <img class="coin22" src="../img/coin222.png" />
                <a href="/menus" target="main" class="cks">
                    增加自定义菜单
                </a>
                <img class="icon5" src="../img/coin21.png" />
            </dd>
            <dd>
                <img class="coin11" src="../img/coin111.png" />
                <img class="coin22" src="../img/coin222.png" />
                <a href="menus/show" target="main" class="cks">
                    展示自定义菜单
                </a>
                <img class="icon5" src="../img/coin21.png" />
            </dd>
        </dl>
        <dl class="system_log">
            <dt>
                <img class="icon1" src="../img/coin15.png" />
                <img class="icon2" src="../img/coin16.png" />
                素材管理<img class="icon3" src="../img/coin19.png" />
                <img class="icon4" src="../img/coin20.png" />
            </dt>
            <dd>
                <img class="coin11" src="../img/coin111.png" />
                <img class="coin22" src="../img/coin222.png" />
                <a href="/uploadfile" target="main" class="cks">
                    上传素材
                </a>
                <img class="icon5" src="../img/coin21.png" />
            </dd>
            <dd>
                <img class="coin11" src="../img/coin111.png" />
                <img class="coin22" src="../img/coin222.png" />
                <a href="/uploadshow" target="main" class="cks">
                    素材列表
                </a>
                <img class="icon5" src="../img/coin21.png" />
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
</body>
</html>
