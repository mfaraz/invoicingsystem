<?php
class Adminsmodel extends Model{
	function __construct(){
		parent::__construct();
	}
	
	/**
	 * 管理员明细
	 */
	function admins_detail($admin_id){
		$db_temp  = $this->db->select('*')->from('admins')->where('admin_id',1)->get()->result_array();
		return $db_temp[0];
	}
	
	/**
	 * 配置验证规则
	 */
	function setConfigRules(){
		$config = array(
			array(
				'label'=>'旧密码',
				'field'=>'main[old_password]',
				'rules'=>'required|callback_old_password_check',
			),
			array(
				'label'=>'新密码',
				'field'=>'main[new_password]',
				'rules'=>'required',
			),
			array(
				'label'=>'确认密码',
				'field'=>'main[confirm_password]',
				'rules'=>'required|callback_confirm_password_check',
			),
		);
		return $config;
	}
	
	
	/**
	 * 保存管理员参数
	 */
	 function save_cofig(){
	 	return array(
	 		'main'=>array(
	 			'table_name'=>'admins',
	 			'primary_key'=>'admin_id',	 			
	 		),
	 	);
	 }
	
	
}
?>