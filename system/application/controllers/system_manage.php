<?php
/*
 * Created on 2010-4-15
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
class System_manage extends Controller{
	function __construct(){		
		parent::__construct();
		$this->myauth->execute_auth();	//验证是否登陆
		$this->load->model('Adminsmodel');
		$this->load->library('encrypt');	
	}
	
	/**
	 * 修改密码
	 */
	function change_password(){
		$data = array('main'=>$this->Adminsmodel->admins_detail(1));
		$this->mypage->loadview('admins/change_password',$data);
	}
	
	/**
	 *退出系统
	 */
	function exit_system(){		
		$this->myauth->process_out(array("user_name"=>""));		
	}
	
	
	/**
	 * 修改密码
	 */
	function save_pass(){		
		$rules = $this->Adminsmodel->setConfigRules();
		$this->form_validation->set_rules($rules);
		$data = array('main'=>$this->input->post('main'));
		if($this->form_validation->run()==false){			
			$this->mypage->loadview('admins/change_password',$data);
		}else{
			$save_data = array('main'=>array(
				'admin_pass'=>$this->encrypt->encode($data['main']['new_password']),
				'admin_id'=>$data['main']['admin_id'],
			));			
			$this->mydb->save($save_data,$this->Adminsmodel->save_cofig());
			$this->mypage->redirectWithInfo('system_manage/exit_system','修改成功，需要重新登陆系统');
		}
	}
	
	/**
 	 *检查密码是否一致 
 	 */
 	function confirm_password_check($str){
 		$main  = $this->input->post('main');
 		if($main['confirm_password']!=$main['new_password']){
 			$this->form_validation->set_message("confirm_password_check","两次输入的密码不一致！");
 			return false;
 		}else{
 			return true;
 		}
 	}
 	
 	/**
 	 *检查旧密码输入是否正确 
 	 */
 	function old_password_check($str){
 		$main_form  = $this->input->post('main');
 		$main_db = $this->Adminsmodel->admins_detail($main_form['admin_id']);
 		$db_pass = $this->encrypt->decode($main_db['admin_pass']);
 		if($db_pass != $main_form['old_password']){
 			$this->form_validation->set_message("old_password_check","旧密码输入不正确!");
 			return false;
 		}else{
 			return true;
 		}
 	}
 	
 	
	
}
 
?>
