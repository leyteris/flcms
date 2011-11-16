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
            	<span id="thistitle">>>管理文章</span>
            	<a class="floatright" href="<?php echo U('global/logout');?>">注销</a>
	            <span class="floatright">欢迎您！<?php echo $_SESSION["UserName"];?>  </span>
            </div>
            <div id="main">
              <table id="listtable" width="100%" border="1" align="center" cellpadding="0"  cellspacing="0">
                <tr>
                  <th width="9%" scope="col">编号</th>
                  <th width="30%" scope="col">标题</th>
                  <th width="15%" scope="col">类别名</th>
                  <th width="19%" scope="col">创建时间</th>
                  <th width="9%" scope="col">用户</th>
                  <th width="17%" scope="col">操作</th>
                </tr>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><tr>
                  <td><?php echo ($vo["id"]); ?></td>
                  <td><?php echo ($vo["title"]); ?></td>
                  <td><?php echo ($vo["category_name"]); ?></td>
                  <td><?php echo ($vo["time"]); ?></td>
                  <td><?php echo ($vo["name"]); ?></td>
                  <td><a href="<?php echo U('article/edit');?>?id=<?php echo ($vo["id"]); ?>">编辑</a>/<a href="<?php echo U('article/delete');?>?id=<?php echo ($vo["id"]); ?>">删除</a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
              </table>
              <div class="left"><a href="<?php echo U('article/add');?>">撰写文章</a></div>
              <div id="page"><?php echo ($page); ?></div>
          </div>
        </div>
        <div id="footer">
        <?php echo ($site["copyright"]); ?>
        </div>
    </body>
</html>