<?php
/**
 * @Date 2011.1.12
 * @File: CategoryAction.class.php
 * @Author Leyteris
 */
class CategoryAction extends CommonAction {

	/**
	 * 
	 * 入口控制器
	 */
	public function index() {
			
    	$model = D("Category");
        $count = $model->count();

        $listRows = 8;
        import("ORG.Util.Page");
        $p = new Page($count, $listRows);
        $list =  $model->field('id,name,create_time')->order("id desc")->limit($p->firstRow.','.$p->listRows)->select();
        
	    foreach ($list as $key=>$val){
        	$list[$key]['time'] = getTime($val['create_time']);
        }
        $page = $p->show();
        $this->assign("list", $list);
        $this->assign("page", $page);

        parent::showSiteInfo("分类列表");
        
        $this->display();
		
	}
	/**
	 * 
	 * 显示添加分类界面
	 */
   	public function add() {

   		parent::checkRight('c');
   		parent::showSiteInfo("添加分类");
   		$this->assign('isedit',0);
		$this->display();
		
	}
	
	/**
	 * 
	 * 对提交的分类进行保存
	 */
   	public function doAdd() {
   		
   		parent::checkRight('c');
		$cate = D("Category");

		if ($vo = $cate->create()) {
			$list = $cate->add();
			if ($list) {
				$this->assign("jumpUrl",getFlcmsPath()."category/index"); 
				$this->success("添加成功");
			}else {
				$this->error("操作失败");
			}
		}else {
			$this->error($Article->getError());
		}
		
	}
	
	/**
	 * 
	 * 显示编辑页面
	 */
    public function edit() {
    	
    	parent::checkRight('e');
    	parent::showSiteInfo("编辑分类");
    	
    	$Category = D("Category");
        $id = $_REQUEST['id'];
        $cate = $Category->where('id='.$id)->find();

        if($cate) {
            $this->assign('cate',$cate);
             $this->assign('isedit',1);
            $this->display('add');
        }else{
            $this->error("错误参数");
        }
	}
	
	/**
	 * 
	 * 对提交的文章进行保存
	 */
   	public function doEdit() {
   		
   		parent::checkRight('e');
		$Category = D("Category");

		if ($vo = $Category->create()) {

			if ($Category->save($vo)) {
				$this->assign("jumpUrl",getFlcmsPath()."category/index"); 
				$this->success("修改成功");
			}else {
				$this->error("修改失败");
			}
		}else {
			$this->error($Category->getError());
		}
		
	}

    public function delete() {
    	
    	parent::checkRight('d');
        $Cate =  M("Category");
        $id = $_REQUEST['id'];
        if (isset($id)) {
            $condition[$Cate->getPk()] = $id;
            if ($Cate->where($condition)->delete()) {
                $this->assign("jumpUrl",getFlcmsPath()."category/index"); 
				$this->success("分类删除成功");
            }else {
                $this->error($Cate->getError());
            }
        }
        
    }
}
?>