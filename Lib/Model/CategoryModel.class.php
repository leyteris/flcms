<?php
/**
 * @Date 2011.1.12
 * @File: CategoryModel.class.php
 * @Author Leyteris
 */
class CategoryModel extends Model {

    protected $_validate = array(
        array('name', 'require', '分类名称不能为空！')
    );
    
    protected $_auto = array(
        array('create_time', 'time', 1, 'function')
    );
}
?>