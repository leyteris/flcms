<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo ($site["title"]); ?></title>
        <link rel="stylesheet" type="text/css" href="__TMPL__Public/css/reset.css" /> 
		<link rel="stylesheet" type="text/css" href="__TMPL__Public/css/fonts.css" />
		<link rel="stylesheet" type="text/css" href="__TMPL__Public/css/css.css" /> 
    </head>
    <body>
        <div id="header">
            <div id="logo">
                <span><a><?php echo ($site["systitle"]); ?><em><?php echo ($site["version"]); ?></em></a></span>
            </div>
            <div id="c-menu">
             	<span><a href="<?php echo U('index/index');?>"> <<返回首页</a></span>
                <span><a href="<?php echo U('article/add');?>">撰写文章</a></span>
                <span><a href="<?php echo U('admin/index');?>">管理文章</a></span>
                <span><a href="<?php echo U('category/index');?>">管理分类</a></span>
                <span><a href="<?php echo U('user/index');?>">管理用户</a></span>
                <span><a href="<?php echo U('role/index');?>">管理权限</a></span>
            </div>
        </div>
        <div id="wrapper">
        	<div id="maintitle">
            	<span id="thistitle">>>增加用户</span>
            	<a class="floatright" href="<?php echo U('global/logout');?>">注销</a>
	            <span class="floatright">欢迎您！<?php echo $_SESSION["UserName"];?>  </span>
            </div>
            <div id="main">
                <form name="form" id="form" action="<?php echo U('user/doAdd');?>" method="post">
                    <div class="item">
                        <label for="name">
                           	 账号：
                        </label>
                        <input type="text" name="name" id="name" class="input" />
                    </div>
                    <div class="item">
                        <label for="password">
                          	  密码：
                        </label>
                        <input type="password" name="password" id="password" class="input" />
                    </div>
                    <div class="item">
                        <label for="repassword">
                           	 重复密码：
                        </label>
                        <input type="password" name="repassword" id="repassword" class="input" />
                    </div>
                    <div class="item">
                        <label for="rid">
                            	账号类别：
                        </label>
                        <select name="rid" class="input" id="rid">
                        <?php if(is_array($rolelist)): $i = 0; $__LIST__ = $rolelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                    <input type="submit" class="inputneedmar" name="submit" id="submit" value="  提 交  " tabindex="120" />
                </form>
            </div>
        </div>
        <div id="footer">
        <?php echo ($site["copyright"]); ?>
        </div>
    </body>
</html>