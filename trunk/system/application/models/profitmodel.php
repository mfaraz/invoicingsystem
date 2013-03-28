<?php
class Profitmodel extends model{
	function __construct(){
		parent::__construct();
	}
	
	/**
	 * 其他成本保存参数
	 */
	function otherCostSaveConfig(){
		return array(
			'main'=>array(
				'table_name'=>'other_cost_main',
				'primary_key'=>'main_id',
			),
			
			'detail'=>array(
				'table_name'=>'other_cost_detail',
				'primary_key'=>'detail_id',
			),
			
			
		);
		
	}
	
	/**
	 * 其他成本验证规则
	 */
	 function setOtherCostConfigRules($info){	 	
	 	$config = array();
 		array_push($config,
	 		array(
	 			'field'=>'main[insert_date]',
	 			'label'=>'进货日期',
	 			'rules'=>'required', 
	 		   ) 	   
 		); 		
 		foreach($info['detail'] as $k=>$v){ 			
 			array_push($config, 
	 			array(
	 				"field"=>"detail[price][$k]",
	 				"label"=>"金额",
	 				"rules"=>"required|numeric",
	 			),	 			
	 			array(
	 				"field"=>"detail[remarks][$k]",
	 				"label"=>"备注",
	 				"rules"=>"required|max_length[50]",
	 			)
	 		
 			);
 		}
 		
 		return $config; 			
 		
	 	
	 }
	 
	 
	/**
	 * 其他成本明细
	 */ 
	function other_cost_detail($main_id){
		if(empty($main_id)) return array();
 		
 		$this->db->select('detail.detail_id,detail.main_id,detail.price,detail.remarks,main.insert_date',false);
 		$this->db->from('other_cost_detail as detail');
		$this->db->where('detail.main_id',$main_id);
 		$this->db->join('other_cost_main as main','main.main_id=detail.main_id','inner');
 		$db_temp = $this->db->get()->result_array();
 		$total_price = 0;
 		foreach($db_temp as $v){
 			$total_price += $v['price']; 			
 		}
 		$data = array('main'=>$db_temp[0],'detail'=>$db_temp,'total'=>array('price'=>$total_price));
 		return $data;
 	}
 	
	 
 	
	 
}


?>