<?php
/**
 * @Date 2011.1.12
 * @File: ArticleModel.class.php
 * @Author Leyteris
 */
class ArticleModel extends Model {

    protected $_validate = array(
        array("title", "require", "标题必须！"),
        array('cid', 'require', "类别必须！"),
        array('content', 'require', "内容必须！")
    );

    protected $_auto = array(
     	array('uid', 'getUID', 1, 'function'),
        array('status', 1),
        array('create_time', 'time', 1, 'function')
    );
    
}
?>