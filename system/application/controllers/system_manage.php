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
 	
 	/**
 	 * 备份数据库
 	 */
 	function db_backup(){
 		try{
 			$this->load->dbutil();
 			$backup = $this->dbutil->backup();
 			$this->load->helper('file');
 			$file_name = 'ci_app_db'.date("Y-m-d-H-i-s").'.gz';
			write_file(BASEPATH.'../backup/'.$file_name, $backup); 	
			//发往email
			$this->load->library('email');
			$this->email->from('conqweal@163.com');		
			$this->email->to('sadan5204@163.com,conqweal@163.com');		
			$this->email->subject("数据备份".$file_name);
			$this->email->message("数据备份".$file_name);
			$this->email->attach(BASEPATH.'../backup/'.$file_name);
			$this->email->send();			
			$this->email->clear();
			$this->mypage->jsRedirect("备份成功，已将文件发往邮箱",site_url("stock/stock_list"));
			//直接下载
 			//$this->load->helper('download');
			//force_download($file_name, $backup); 
 		}catch(Exception $e){
 			show_error($e->getMessage());
 		}	
 		
 	}	
 	
 	
 	
 	

	
}
 
?>
