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
            <?php if($isedit != 1): ?><div id="maintitle">
            	<span id="thistitle">>>撰写文章</span>
            	<a class="floatright" href="<?php echo U('global/logout');?>">注销</a>
	            <span class="floatright">欢迎您！<?php echo $_SESSION["UserName"];?>  </span>
            </div>
            <div id="main">
                <form name="form" id="form" action="<?php echo U('article/doAdd');?>" method="post">
                    <div class="item">
                        <label for="title">
                            	标题：
                        </label>
                        <input type="text" name="title" id="title" class="input" />
                    </div>
                    <div class="item">
                        <label for="cid">
                            	类别：
                        </label>
                        <select name="cid" class="input" id="cid">
                        <?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        <a class="iebo"href="<?php echo U('category/add');?>">新建分类>></a>
                    </div>
                    <div class="item">
                        <label for="editor">
                            	文章：
                        </label>
                        <script type="text/javascript" src="__TMPL__Public/js/KindEditor/kindeditor.js"></script>
						<script type="text/javascript"> KE.show({ id : 'editor'  ,urlType : "relative"});</script>
                        <textarea name="content" id="editor" class="input" tabindex="100">
                        </textarea>
                    </div>
                    <input type="submit" class="inputneedmar" name="submit" id="submit" value="  提 交  " tabindex="120" />
                </form>
            <?php else: ?>
            <div id="maintitle">
            	<span id="thistitle">>>编辑文章</span>
            	<a class="floatright" href="<?php echo U('global/logout');?>">注销</a>
	            <span class="floatright">欢迎您！<?php echo $_SESSION["UserName"];?>  </span>
            </div>
            <div id="main">
                <form name="form" id="form" action="<?php echo U('article/doEdit');?>" method="post">
                    <div class="item">
                        <label for="title">
                            	标题：
                        </label>
                        <input type="text" name="title" id="title" class="input" value="<?php echo ($arti["title"]); ?>" />
                    </div>
                    <div class="item">
                        <label for="cid">
                            	类别：
                        </label>
                        <select name="cid" class="input" id="cid">
                        <?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($vo["id"]); ?>" <?php if($vo["id"] == $arti['cid']): ?>selected=""<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                    <div class="item">
                        <label for="editor">
                            	文章：
                        </label>
                        <script type="text/javascript" src="__TMPL__Public/js/KindEditor/kindeditor.js"></script>
						<script type="text/javascript"> KE.show({ id : 'editor'  ,urlType : "relative"});</script>
                        <textarea name="content" id="editor" class="input" tabindex="100">
							<?php echo ($arti["content"]); ?>
                        </textarea>
                    </div>
                    <input name="id" type="hidden"  value="<?php echo ($arti["id"]); ?>"  />
                    <input type="submit" class="inputneedmar" name="submit" id="submit" value="  提 交  " tabindex="120" />
                </form><?php endif; ?>
            </div>
        </div>
        <div id="footer">
        <?php echo ($site["copyright"]); ?>
        </div>
    </body>
</html>