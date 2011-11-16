<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2008 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// $Id: alias.php,v 1.1 2011/01/13 04:43:29 leyteris Exp $

// 导入别名定义
alias_import(array(
    'Model'         =>   THINK_PATH.'/Mode/Thin/Model.class.php',
    'Db'                  =>    THINK_PATH.'/Mode/Thin/Db.class.php',
    'Debug'              =>    THINK_PATH.'/Lib/Think/Util/Debug.class.php',
    'Session'             =>   THINK_PATH.'/Lib/Think/Util/Session.class.php',
    )
);
?>