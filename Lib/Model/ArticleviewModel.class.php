<?php
/**
 * @Date 2011.1.12
 * @File: ArticleviewModel.class.php
 * @Author Leyteris
 */
class ArticleviewModel extends ViewModel {
    public $viewFields = array(
       'article'=>array('id','title','create_time','cid','uid','content','status'),
       'category'  =>  array('id'=>'category_id','name'=>'category_name', '_on'=>'article.cid=category.id'),
       'user'  =>  array('name', '_on'=>'article.uid=user.id')
    );
}
?>
