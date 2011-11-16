<?php
/**
 * @Date 2011.1.13
 * @File: AdminAction.class.php
 * @Author Leyteris
 */
class AdminAction extends CommonAction{
	
	public function index() {
		
    	$model = D("Articleview");
        $count = $model->where("status=1")->count();

        $listRows = 8;
        import("ORG.Util.Page");
        $p = new Page($count, $listRows);
        $list =  $model->field('id,name,title,category_name,create_time')->where("status=1")->order("id desc")->limit($p->firstRow.','.$p->listRows)->select();
        foreach ($list as $key=>$val){
        	$list[$key]['time'] = getTime($val['create_time']);
        }
        //dump($list);
        $page = $p->show();
        $this->assign("list", $list);
        $this->assign("page", $page);
        
		parent::showSiteInfo("文章列表");
		
        $this->display();
        
	}

}
?>