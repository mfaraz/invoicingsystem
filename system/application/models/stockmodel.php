<?php
/*
 * Created on 2010-4-16
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 class Stockmodel extends model{
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
	 			'label'=>'进货日期',
	 			'rules'=>'required', 
	 		   ) ,
	 		   
 			array(
 			'field'=>'main[remarks]',
 			'label'=>'进货备注',
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
				'table_name'=>'stock_main',
				'primary_key'=>'main_id',			
			),
			'detail'=>array(
				'table_name'=>'stock_detail',
				'primary_key'=>'detail_id',		
				
			),			
		);
 	}
 	
 	/**
 	 * 保存产品
 	 */
 	function save_product($info){ 		
 		foreach($info as $k=>&$v){
 			if(empty($v['product_id'])){
 				$v_product = array(
 					'product_id'=>null,
 					'product_name'=>$v['product_name'],
 					'product_real_name'=>$v['product_real_name'],
 					'product_price'=>$v['product_price'],
 					'insert_time'=>date('Y-m-d H:i:s'), 					
 				); 				 								
				$this->db->insert('product',$v_product); 	
				$v['product_id'] = $this->db->insert_id();		
 			}
 		} 	
 		$this->mydb->createComboxCache(array('table_name'=>'product','fields'=>'product_id,product_name,product_real_name','path'=>'js/cache/product.json'));
	 	$this->mydb->createCache(array('primary_key'=>'product_id','table_name'=>'product','fields'=>'product_id,product_name,product_real_name,product_price','path'=>'cache/product.php'));
 		return $info;
 	}
 	
 	
 	/**
 	 * 重新处理
 	 */
 	function reDefine($detail){ 		
 	 		foreach($detail as $k=>&$v){
 	 			unset($v['product_name'],$v['product_price'],$v['product_real_name']); 	 			
 	 		}	 	 	
 		return $detail;
 	}
 	
 	function stock_detail($main_id){
 		$this->db->where('detail.main_id',$main_id);
 		$this->db->select('(product.product_price*detail.quantity) as sum_price,product.product_price,product.product_name,product.product_real_name,main.insert_date,main.remarks,detail.*');
 		$this->db->from('stock_detail as detail');
 		$this->db->join('stock_main as main','main.main_id=detail.main_id','inner');
 		$this->db->join('product','product.product_id=detail.product_id','inner');
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
