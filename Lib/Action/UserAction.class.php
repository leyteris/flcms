<?php
/**
 * @Date 2011.1.12
 * @File: UserAction.class.php
 * @Author Leyteris
 */
class UserAction extends CommonAction {

	/**
	 * 
	 * 初始化
	 */
	function _initialize(){
		
		parent::_initialize();
		header("Content-Type:text/html; charset=utf-8");
		
		parent::checkRight('s');
		$role = M("Role");
		$rolelist = $role->select();
		$this->assign('rolelist',$rolelist);
		
    }
    
	/**
	 * 
	 * 入口控制器
	 */
	public function index() {
		
		parent::showSiteInfo("用户列表");
    	$model = D("Userview");
        $count = $model->count();

        $listRows = 8;
        import("ORG.Util.Page");
        $p = new Page($count, $listRows);
        $list =  $model->field('id,role_name,name,create_time')->order("id desc")->limit($p->firstRow.','.$p->listRows)->select();
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
	 * 显示添加用户界面
	 */
   	public function add() {

   		parent::showSiteInfo("添加用户");
   		$this->assign('isedit',0);
		$this->display();
		
	}
	
	/**
	 * 
	 * 对提交的用户进行保存
	 */
   	public function doAdd() {
   		
		$user = D("User");
		
		if ($vo = $user->create()) {
			$list = $user->add();
			if ($list) {
				$this->assign("jumpUrl",getFlcmsPath()."user/index"); 
				$this->success("添加成功");
			}else {
				$this->error("操作失败");
			}
		}else {
			$this->error($user->getError());
		}
		
	}

	/**
	 * 
	 * 显示设置密码页面
	 */
    public function setPass() {
    	
    	parent::showSiteInfo("设置密码");
    	$user = D("User");
    	
        $id = $_REQUEST['id'];
        $u = $user->where('id='.$id)->find();

        if($u) {
            $this->assign('u',$u);
            $this->display();
        }else{
            $this->error("错误参数");
        }
        
	}
	
	/**
	 * 
	 * 处理提交数据
	 */
    public function doSetPass() {
    	
    	$user = D("User");

		if ($vo = $user->create()) {
			if ($user->save($vo)){
				$this->assign("jumpUrl",getFlcmsPath()."user/index"); 
				$this->success("修改成功");
			}else {
				$this->error("修改失败");
			}
		}else {
			$this->error($user->getError());
		}
        
	}
	
	/**
	 * 
	 * 显示设置权限页面
	 */
    public function setRole() {
    	
    	parent::showSiteInfo("设置权限");
    	$user = D("User");
    	
        $id = $_REQUEST['id'];
        $u = $user->where('id='.$id)->find();

        if($u) {
            $this->assign('u',$u);
            $this->display();
        }else{
            $this->error("错误参数");
        }
	}
	
	/**
	 * 
	 * 处理提交数据
	 */
    public function doSetRole() {
    	
    	$user = D("User");

		if ($vo = $user->create()) {
			if ($user->save($vo)){
				$this->assign("jumpUrl",getFlcmsPath()."user/index"); 
				$this->success("修改成功");
			}else {
				$this->error("修改失败");
			}
		}else {
			$this->error($user->getError());
		}
        
	}
	
	/**
	 * 
	 * 删除用户
	 */
    public function delete() {
    	
        $user = M("User");
        $id = $_REQUEST['id'];
        if (isset($id)) {
            $condition[$user->getPk()] = $id;
            if ($user->where($condition)->delete()) {
                $this->assign("jumpUrl",getFlcmsPath()."user/index"); 
				$this->success("删除成功");
            }else {
                $this->error($user->getError());
            }
        }
        
    }
}
?>