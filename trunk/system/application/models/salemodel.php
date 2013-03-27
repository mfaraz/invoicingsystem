<?php
/*
 * Created on 2010-4-16
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 class Salemodel extends model{
 	function __construct(){
 		parent::__construct();
 	}
 	
 	
 	/**
 	 * 设置验证规则
 	 */
 	
 	function setConfigRules($info){ 		
 		$config = array();
 		array_push($config,
	 		array(
	 			'field'=>'main[insert_date]',
	 			'label'=>'销售日期',
	 			'rules'=>'required', 
	 		   ) ,
	 		   
 			array(
 			'field'=>'main[remarks]',
 			'label'=>'销售备注',
 			'rules'=>'max_length[200]', 
 		   ) 	   		   			
 		);
 		
 		foreach($info['detail'] as $k=>$v){ 			
 			array_push($config, 			
	 				 	
	 			array(
	 				"field"=>"detail[product_name][$k]",
	 				"label"=>"产品名称",
	 				"rules"=>"required",
	 			),
	 			
	 			array(
	 				"field"=>"detail[product_id][$k]",
	 				"label"=>"产品名称",
	 				"rules"=>"required",
	 			),	
	 				 			
	 			array(
	 				"field"=>"detail[quantity][$k]",
	 				"label"=>"产品数量",
	 				"rules"=>"required|numeric",
	 			),
	 			array(
	 				"field"=>"detail[product_price][$k]",
	 				"label"=>"单价",
	 				"rules"=>"required|numeric",
	 			)			
	 		 			
 			);
 		}
 		
 		return $config; 			
 		
 		
 	}
 	
 	/**
 	 * 存储参数配置
 	 */
 	function saveConfig(){ 		
 		return array(
			'main'=>array(
				'table_name'=>'sale_main',
				'primary_key'=>'main_id',			
			),
			'detail'=>array(
				'table_name'=>'sale_detail',
				'primary_key'=>'detail_id',		
				
			),			
		);
 	}
 	
 	
 	
 	
 	/**
 	 * 重新处理
 	 */
 	function reDefine($detail){ 		
 	 		foreach($detail as $k=>&$v){
 	 			unset($v['product_name'],$v['product_real_name']); 	 			
 	 		}	 	 	
 		return $detail;
 	}
 	
 	function sale_detail($main_id){
 		
 		$this->db->select('c.product_price as cost,(detail.product_price*detail.quantity) as sum_price,c.product_name,c.product_real_name,main.insert_date,main.remarks,detail.*',false);
 		$this->db->from('sale_detail as detail');
 		$this->db->join('sale_main as main','main.main_id=detail.main_id','inner');
 		$this->db->join('product as c','c.product_id=detail.product_id','inner');
 		$this->db->where('detail.main_id',$main_id);
		$db_temp = $this->db->get()->result_array();
 		$total_price = 0;
 		foreach($db_temp as $v){
 			$total_price += $v['sum_price']; 			
 		}
 		$data = array('main'=>$db_temp[0],'detail'=>$db_temp,'total'=>array('price'=>$total_price));
 		return $data;
 	}
 	
 }
?>
