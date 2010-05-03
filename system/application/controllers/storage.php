<?php
/*
 * Created on 2010-4-11
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 class Storage extends Controller{
 	function __construct(){
 		parent::__construct();
 		$this->myauth->execute_auth();	//验证是否登陆
 		$this->load->model('Storagemodel');
 	}
 	
 	/**
 	 * 库存统计，可按产品，按截至日期查询
 	 */
 	function storage_stat(){
 		$this->db->select("sum(if(type=1,quantity,0)) as in_quantity,sum(if(type=2,-quantity,0)) as out_quantity,b.product_real_name,b.product_name,b.product_price,a.product_id,sum(a.quantity) as  quantity ",false);
 		$this->db->from('v_storage as a ');
 		$this->db->join('product as b','a.product_id=b.product_id','inner');
 		$product_name = $this->input->get('product_name');
 		$product_id = $this->input->get('product_id');
 		if($product_id>0){
 			$this->db->where("b.product_id",$product_id);
 		}
 		if($product_name>0){
 			$this->db->like("b.product_name",$product_name);
 		}
 		$this->db->group_by('a.product_id');	
 		$this->db->order_by('sum(a.quantity)','asc');	
 		$this->db->order_by('out_quantity','desc');	
 		$this->db->order_by('a.product_id','desc');	
 		$data  =  $this->mydb->getList(); 	
 		$this->mypage->loadview('storage/stat',$data);
 	}
 	
 	/**
 	 * 库存流转明细，反映库存变化情况，数据过大原因，目前只处理单个产品
 	 */
 	function storage_detail(){
 		$this->db->select("b.product_real_name,b.product_name,a.product_id,abs(a.quantity) as quantity,if(a.quantity>0,a.quantity,0) as in_quantity,if(a.quantity<0,a.quantity,0) as out_quantity,if(a.type=1,'进货','销售') as type_name,date(a.insert_date) as insert_date ",false);
 		$this->db->from('v_storage as a ');
 		$this->db->join('product as b','a.product_id=b.product_id','inner');
 		$this->db->order_by('b.product_id','desc');	
 		$this->db->order_by('date(a.insert_date)','asc');	
 		$this->db->order_by('a.type','asc');
 		$product_name = $this->input->get("product_name");
 		if(empty($product_name)) $product_name ="-10000";
 		$this->db->where("b.product_name",$product_name);
 		$data  =  array("list"=>$this->db->get()->result_array());
 		if(empty($data)) return null;
 		$new_data = $data;
 		unset($new_data['list']); 		
 		foreach($data['list'] as $k=>$v){
 			if(isset($new_data['list'][$v['product_id']])) $v['product_name'] = $v['product_real_name'] = null;
 			if(!isset($new_data['list'][$v['product_id']]['stat'])) $new_data['list'][$v['product_id']]['stat'] = 0;
 			$new_data['list'][$v['product_id']]['stat'] += $v['in_quantity']+$v['out_quantity'];
 			$v['stat'] = $new_data['list'][$v['product_id']]['stat'];
 			$new_data['list'][$v['product_id']]['detail'][] = $v;
 		}	
 		$this->mypage->loadview('storage/detail',$new_data);
 		
 	}
 }
 
?>
