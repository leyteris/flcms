<?php
/**
 * @Date 2011.1.13
 * @File: IndexAction.class.php
 * @Author Leyteris
 */
class IndexAction extends Action{
	
	/**
	 * 
	 * 初始化
	 */
	function _initialize(){
		
		header("Content-Type:text/html; charset=utf-8");
		
		$this->showSiteInfo();
		$cate = M("Category");
		$catelist = $cate->select();
		$this->assign('catelist',$catelist);
		
    }
    
    /**
     * 
     * 入口控制器
     */
	public function index() {
		
    	$model = D("Articleview");
        $count = $model->where("status=1")->count();

        $listRows = 8;
        import("ORG.Util.Page");
        $p = new Page($count, $listRows);
        $list =  $model->field('id,category_id,name,title,category_name,create_time,content')->where("status=1")->order("id desc")->limit($p->firstRow.','.$p->listRows)->select();
        foreach ($list as $key=>$val){
        	$list[$key]['time'] = getTime($val['create_time']);
        }

        $page = $p->show();
        $this->assign("list", $list);
        $this->assign("page", $page);

        $this->display();
        
	}
	
    /**
     * 
     * 显示Article页面
     */
	public function showArti(){
		
		$id=$_GET['id'];
		if(!isset($id)){
			$this->error("异常参数");
			exit;
		}
    	$model = D("Articleview");
        $list = $model->field('id,category_id,name,title,category_name,create_time,content')->where("article.id=".$id)->find();

        $list['time'] = getTime($list['create_time']);

        $this->assign("list", $list);
        $this->assign("page", $page);

        $this->display();
        
	}
	
    /**
     * 
     * 显示Category页面
     */
	public function showCate() {
		
		$id=$_REQUEST['id'];
		if(!isset($id)){
			$this->error("异常参数");
			exit;
		}
    	$model = D("Articleview");
    	$count = $model->where("category.id=".$id)->count();

        $listRows = 8;
        import("ORG.Util.Page");
        $p = new Page($count, $listRows);
        $list = $model->field('id,category_id,name,title,category_name,create_time,content')->where("category.id=".$id)->select();

        foreach ($list as $key=>$val){
        	$list[$key]['time'] = getTime($val['create_time']);
        }

        $page = $p->show();
        $this->assign("list", $list);
        $this->assign("page", $page);

        $this->display('index');
        
	}
	
	/**
	 * 
	 * 显示网站信息
	 * @param String $title
	 */
	protected function showSiteInfo($title=""){
		
		$sep=' - ';
		$data['systitle']=C('SYSTITL');
		$data['title']=$title?$title.$sep.C('SYSTITL'):C('SYSTITL');
		$data['version']=C('FLCMS_VERSION');
		$data['copyright']=C('COPYRIGHT');
		$this->assign('site',$data);
		
	}

}
?>