<?php
/**
 * @Date 2011.1.12
 * @File: CommonAction.class.php
 * @Author Leyteris
 */
class CommonAction extends Action {
	
	/**
	 * 
	 * 初始化
	 */
	function _initialize(){
		
		header("Content-Type:text/html; charset=utf-8");
		$this->open();
		
    }
    
    /**
     * 
     * 访问网站是否需要登陆
     */
	public function open(){
		
		load('extend');
		
		if(!$this->isLoginBool()){
			$this->redirect('global/login');
		}
		
	}
	
	/**
	 * 
	 * 判断登陆
	 * @return boolean
	 */
	public function isLoginBool(){
		
		if(!Session::is_set(C('USER_AUTH_KEY'))){
			return false;
		}else{
			return true;
		}
		
	}

	/**
	 * 
	 * 普通提示
	 */
	public function isLogin(){
		
		if(!Session::is_set(C('USER_AUTH_KEY'))){
			$this->assign("jumpUrl",getFlcmsPath()."global/login"); 
			$this->error('您还没有登陆或者登陆已经超时，请重新登陆系统！');
			exit;
		}
		
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
	
	/**
	 * 
	 * 检查权限
	 */
	function checkRight($op){
		
		$uid = getUID();
		
		$model = D("Userview");
		
		$ulist = $model->where("user.id='".$uid."'")->select();
		
		if(!isset($op)){
			exit;
		}else{
			
			switch($op){
				case 's':
					if($ulist[0]['issuper'] != '1'){
						$this->error('您还不是超级管理员，无法操作此模块');
					}
					break;
				case 'c':
					if($ulist[0]['creright'] != '1'){
						$this->error('您没有创建权限，请联系超级管理员');
					}
					break;
				case 'e':
					if($ulist[0]['editright'] != '1'){
						$this->error('您没有编辑权限，请联系超级管理员');
					}
					break;
				case 'd':
					if($ulist[0]['delright'] != '1'){
						$this->error('您没有删除权限，请联系超级管理员');
					}
					break;
				default:
					$this->error('您还没有登陆或者登陆已经超时，请重新登陆系统！');
			}
			
		}
		
	}
    
}