<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($site["title"]); ?></title>
<link rel="stylesheet" type="text/css" href="__TMPL__Public/css/reset.css" /> 
<link rel="stylesheet" type="text/css" href="__TMPL__Public/css/fonts.css" />
<link rel="stylesheet" type="text/css" href="__TMPL__Public/css/style.css" /> 
</head>
<body>
<div id="layout">
	<div id="header">
    	<div id="logo">FLCMS <?php echo ($site["version"]); ?></div>
    </div>
    <div id="wrapper">
    	<div id="headline">
        	<a href="<?php echo U('index/index');?>">首页</a>
        	<a href="<?php echo U('article/add');?>">撰写文章</a>
            <a href="<?php echo U('admin/index');?>">管理界面</a>
        </div>
    	<div id="side">
       		<div class="r-pro">
                <h1>分类列表</h1>
                <ul>
                	<?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li><a href="<?php echo U('index/showCate');?>?id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="r-pro">
                <h1>版本信息</h1>
                <ul>
                    <li>FLCMS v1.2 内容管理系统</li>
                    <li>基于thinkphp框架实现</li>
                    <li>更新日志：</li>
                    <li>1、增加前台用户界面，实现前后台分离</li>
                    <li>2、修正后台权限部分添加错误的BUG</li>
                    <li>3、修正登陆部分密码MD5验证的BUG</li>
                    <li>4、修正撰写文章部分分类选项排序的BUG</li>
                    <li>5、将时间改为日期</li>
                    <li>6、修正超时登陆跳转提示问题</li>
                </ul>
            </div>
        </div>
        <div id="main">
            <div class="artBody">
            	<h2><?php echo ($list["title"]); ?></h2>
                <div class="dots"></div>
                <span class="details">
               		 发布于<?php echo ($list["time"]); ?> By <?php echo ($list["name"]); ?>  分类: <a href="#" title="asd" rel="category"><?php echo ($list["category_name"]); ?></a>
                </span>
                <div class="p"><?php echo ($list["content"]); ?></div>
            </div>
        </volist>
        </div>
    </div>
    <div id="footer">
    	<p><?php echo ($site["copyright"]); ?></p>
    </div>
</div>
</body>
</html>