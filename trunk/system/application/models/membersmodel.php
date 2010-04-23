<?php
class Membersmodel extends Model{
	function __construct(){
		parent::Model();		
	}	
	
	/**
	 * 配置参数
	 */
	function save_config(){	
		return array('main'=>array(
			'table_name'=>'members',
			'primary_key'=>'member_id',
		));
	}
	
	/**
	 * 验证器
	 */
	function setConfigRules(){
		return  array(
			array(
				"label"=>"姓名",
				"field"=>"main[member_name]",
				"rules"=>"required",
			),
			array(
				"label"=>"性别",
				"field"=>"main[sex]",
				"rules"=>"required",
			),
		
			array(
				"label"=>"手机",
				"field"=>"main[mobile]",
				"rules"=>"max_length[50]",
			),
		
			array(
				"label"=>"电话",
				"field"=>"main[phone]",
				"rules"=>"max_length[50]",
			),
		
			array(
				"label"=>"qq",
				"field"=>"main[qq]",
				"rules"=>"max_length[50]",
			),
		
			array(
				"label"=>"地址",
				"field"=>"main[mobile]",
				"rules"=>"max_length[50]",
			),
		
			array(
				"label"=>"备注",
				"field"=>"main[remarks]",
				"rules"=>"max_length[250]",
			),
		
		
		);	
		
	}
	
	/**
	 * 会员明细
	 */
	function member_detail($main_id){
		$db_temp =  $this->db->select('*',false)->from('members')->where('member_id',$main_id)->get()->result_array();
		return $db_temp[0];
	} 
	
}

?>