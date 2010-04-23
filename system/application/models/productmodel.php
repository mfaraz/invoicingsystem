<?php
/*
 * Created on 2010-4-14
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 class Productmodel extends Model{
 	function __construct(){
 		parent::Model();
 	}
 	
 	/**
 	 * 配置验证规则
 	 */
 	function setConfigRules($detail){ 	
 		$config = array();   		
	 		foreach($detail as $k=>$v){	
	 			$encrypt_name = $this->mypage->myEncrypt("detail[product_name][$k]",'ENCODE'); 						 			 				
	 			array_push($config,
		 			array(
		 					"field"=>"detail[product_name][$k]",	
		 					"label"=>"产品名称",	
		 					"rules"=>"required|max_length[50]|callback_product_name_check[_decode$encrypt_name]",	
		 			
		 			),
		 			
		 			array(
		 					"field"=>"detail[product_real_name][$k]",	
		 					"label"=>"真实名称",	
		 					"rules"=>"max_length[50]",	
		 			
		 			),
		 			
		 			array(
		 					"field"=>"detail[product_price][$k]",	
		 					"label"=>"产品价格",	
		 					"rules"=>"required|numeric",	
		 			
		 			),
		 			array(
		 					"field"=>"detail[product_remarks][$k]",	
		 					"label"=>"备注",	
		 					"rules"=>"max_length[250]",			 			
		 			),		 		
		 			array(
		 					"field"=>"detail[product_id][$k]",	
		 					"label"=>"产品id",	
		 					"rules"=>"max_length[250]",			 			
		 			)	 		
	 			);	 					
	 		} 
	 	return $config;	
 		
 	}
 	
 	/**
 	 * 产品列表
 	 */
 	function products($params){ 	 
 			if(!isset($params['limit_from'])) $params['limit_from'] = 0;					
 			$sql_count =  $this->db->select('*')->from("product")->_compile_select();
			$this->db->limit($params['limit_to'],$params['limit_from'])->order_by('product_id','desc');
			$sql = $this->db->_compile_select();			
			$data = array(
				'count' => $this->db->count_all("($sql_count)as t "),
				'list' => $this->db->query($sql)->result_array(),
			
			);		
 			return $data; 		
 	}
 	
 	/**
 	 * 产品简单查询
 	 */
 	function simpleProducts($params){ 	  			
 			$data = $this->db->select("*")->from('product')->where_in('product_id',$params['ids'])->order_by('product_id','desc')->get()->result_array();
 			return $data; 		
 	}
 	
 	
 	
 	
 	/**
 	 * 保存产品
 	 */
 	function save($detail){  		
 		foreach($detail as $k=>&$v){	
			$key_value = $v['product_id'];
 			if($key_value>0){  				       
		        $this->db->where("product_id",$key_value);	
				$this->db->update('product',$v); 
				$new_v[] = $v['product_id'];
 			}else{ 			 				
 				$v['insert_time'] = date('Y-m-d H:i:s');		 								
				$this->db->insert('product',$v); 
				$new_v[]  = $this->db->insert_id();		 				
 				
 			}
	 	}
	 	return $new_v;
 		
 	}
 	
 	/**
 	 * 删除产品
 	 */
 	function deleteproduct($ids){
 		$this->db->where_in('product_id',$ids);
 		$this->db->delete("product"); 
 	}
 	
 	/**
 	 * 生成缓存
 	 */
 	function createCaches(){ 		
 		$this->mydb->createComboxCache(array('table_name'=>'product','fields'=>'product_id,product_name,product_real_name','path'=>'js/cache/product.json'));
	 	$this->mydb->createCache(array('primary_key'=>'product_id','table_name'=>'product','fields'=>'product_id,product_name,product_real_name,product_price','path'=>'cache/product.php'));
 	}
 	
 	
 }
?>
