<?php
/**
 * @Date 2011.1.12
 * @File: UserviewModel.class.php
 * @Author Leyteris
 */
class UserviewModel extends ViewModel {
    public $viewFields = array(
       'user'  =>  array('id','name','create_time'),
       'role'  =>  array('id'=>'role_id','name'=>'role_name','delright','editright','creright','issuper','_on'=>'user.rid=role.id')
    );
}
?>
