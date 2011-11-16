<?php
/**
 * @Date 2011.1.12
 * @File: ArticleAction.class.php
 * @Author Leyteris
 */
class ArticleAction extends CommonAction {
	
	/**
	 * 
	 * 初始化
	 */
	function _initialize(){
		
		parent::_initialize();
		header("Content-Type:text/html; charset=utf-8");
		
		$cate = M("Category");
		$catelist = $cate->order('id desc')->select();
		$this->assign('catelist',$catelist);
		
    }

	/**
	 * 
	 * 显示撰写文章界面
	 */
   	public function add() {
   		
		parent::checkRight('c');
   		parent::showSiteInfo("撰写文章");
   		$this->assign('isedit',0);
		$this->display();
		
	}
	
	/**
	 * 
	 * 对提交的文章进行保存
	 */
   	public function doAdd() {
   		
   		parent::checkRight('c');
		$Article = D("Article");

		if ($vo = $Article->create()) {
			$list = $Article->add();
			if ($list) {
				$this->assign("jumpUrl",getFlcmsPath()."admin/index"); 
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
    	parent::showSiteInfo("撰写文章");
    	$Article = D("Article");
        $id = $_REQUEST['id'];
        $arti = $Article->where('id='.$id)->find();

        if($arti) {
            $this->assign('arti',$arti);
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
		$Article = D("Article");

		if ($vo = $Article->create()){

			if ($Article->save($vo)) {
				$this->assign("jumpUrl",getFlcmsPath()."admin/index"); 
				$this->success("修改成功");
			}else {
				$this->error("修改失败");
			}
		}else {
			$this->error($Article->getError());
		}

	}

    public function delete() {
    	
    	parent::checkRight('d');
        $arti =  M("Article");
        $id = $_REQUEST['id'];
        if (isset($id)) {
            $condition[$arti->getPk()] = $id;
            if ($arti->where($condition)->delete()) {
            	$this->assign("jumpUrl",getFlcmsPath()."admin/index"); 
				$this->success("文章删除成功！");
            }else {
                $this->error($arti->getError());
            }
        }
        
    }
}
?>