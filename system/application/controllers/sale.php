<?php
/*
 * Created on 2010-4-11
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 class Sale extends Controller{
 	function __construct(){
 		parent::__construct();
 		$this->myauth->execute_auth();	//验证是否登陆
 		$this->load->model('Salemodel');
 	}
 	
 	/**
 	 * 添加进货
 	 */
 	function sale_add(){ 		 			
 		$data = null;
 		$main_id = $this->uri->segment(3);
 		if($main_id>0){
 			$data = $this->Salemodel->sale_detail($main_id);
 			$data['total_size'] = count($data['detail']);
 		}else{
 			$data = array(
				'main'=>array('insert_date'=>'','remarks'=>'','main_id'=>''),
				'detail'=>array_fill(0,1,array('quantity'=>'','p_id'=>'','product_name'=>'','product_real_name'=>'','product_price'=>'','product_id'=>'','main_id'=>'','detail_id'=>'')));
				$data['total_size'] = 1;
	 	}	 	
 		$this->mypage->loadview('sale/sale_add',$data);
 	}
 	
 	/**
 	 * 保存进货
 	 */
 	function sale_save(){ 	
 		try{
 			$this->load->model('Productmodel');
 			$detail = null;
 			$detail = $this->myform->regroupFormData($this->input->post('detail')); 
	 		$main = $this->input->post('main');	 
	 		$form_info = array('main'=>$main,'detail'=>$detail);
	 		$rules=  $this->Salemodel->setConfigRules($form_info);
	 		$this->form_validation->set_rules($rules);
	 		if($this->form_validation->run()==false){		 			
	 			$form_info['total_size'] =  $this->myform->getMaxIndex($this->input->post('detail'));
	 			$this->mypage->loadview('sale/sale_add',$form_info);
	 		}else{	 		
	 			$detail = $this->Salemodel->reDefine($detail);	 			
	 			$form_info['detail'] = $detail;	
	 			$this->mydb->save($form_info,$this->Salemodel->saveConfig());
	 			redirect("sale/sale_list"); 			
	 		}
	 			
 		}catch(Exception $e){
 			show_error($e->getMessage());
 		}	
 		
 		
 	}
 	
 	/**
 	 * 进货列表
 	 */
 	function sale_list(){ 		
 		$data = null;
 		if($this->input->get('insert_date'))	$this->db->where('sale_main.insert_date',$this->input->get('insert_date'));
 		$this->db->like('product.product_name',$this->input->get('product_name'));
 		$this->db->like('product.product_real_name',$this->input->get('product_real_name'));
 		$this->db->select('sale_detail.main_id,sum(sale_detail.quantity*sale_detail.product_price) as price,sum(sale_detail.quantity*(sale_detail.product_price-product.product_price)) as profit,count(distinct sale_detail.product_id) as p_count,date(sale_main.insert_date) as insert_date,sale_main.remarks')
 		->from('sale_detail') 
 		->join('sale_main','sale_main.main_id=sale_detail.main_id','inner') 
 		->join('product','sale_detail.product_id=product.product_id','inner')
 		->group_by('sale_detail.main_id')
 		->order_by('sale_detail.main_id','desc');
 		$data  =  $this->mydb->getList(); 	
 		$this->mypage->loadview('sale/sale_list',$data);
 	}
 	
 	/**
 	 * 查看进货 
 	 */
 	function sale_view(){
 		$data = null;
 		$data = $this->Salemodel->sale_detail($this->uri->segment(3));
 		$this->mypage->loadview('sale/sale_view',$data);
 	}
 	/**
 	 * 删除进货
 	 */
 	function sale_delete(){
 		try{
 			$id = $this->uri->segment(3);
 			$this->mydb->delete($id,$this->Salemodel->saveConfig());
 			redirect("sale/sale_list");
 		}catch(Exception $e){
 			show_error($e->getMessage());
 		}	
 	}	
 	
 	
 	/**
 	 * 销售按日统计
 	 */
 	function stat_by_date(){
 		$this->db->select('c.product_price,date(b.insert_date) as insert_date,sum(a.quantity) as quantity,c.product_name,c.product_real_name',false);
 		$this->db->from("sale_detail as a");
 		$this->db->join("sale_main as b","b.main_id=a.main_id","inner");
 		$this->db->join("product as c","c.product_id=a.product_id","inner");
 		$this->db->group_by('date(b.insert_date),a.product_id');
 		$this->db->order_by("date(b.insert_date)","asc");
 		$this->db->order_by("sum(a.quantity)","desc");
 		$this->db->order_by("a.product_id","desc");
 		$data = $this->mydb->getList();
 		$sort_array = array();
 		foreach($data['list'] as $k=>&$v){
 			if(isset($sort_array[$v["insert_date"]])){
 				$v['insert_date'] = null;
 			}else{
 				$sort_array[$v['insert_date']] = "1";
 			}
 			
 		}
 		$this->mypage->loadview('sale/stat_by_date',$data);
 	}
 	
 	/**
 	 * 销售按年统计
 	 */
 	function stat_by_year(){ 		
 		$this->db->select('c.product_price,concat(year(b.insert_date),\'-\',month(b.insert_date)) as insert_date,sum(a.quantity) as quantity,c.product_name,c.product_real_name',false);
 		$this->db->from("sale_detail as a");
 		$this->db->join("sale_main as b","b.main_id=a.main_id","inner");
 		$this->db->join("product as c","c.product_id=a.product_id","inner");
 		$this->db->group_by('concat(year(b.insert_date),\'-\',month(b.insert_date)),a.product_id');
 		$this->db->order_by("concat(year(b.insert_date),'',month(b.insert_date))","asc");
 		$this->db->order_by("sum(a.quantity)","desc");
 		$this->db->order_by("a.product_id","desc");
 		$data = $this->mydb->getList();
 		$sort_array = array();
 		foreach($data['list'] as $k=>&$v){
 			if(isset($sort_array[$v["insert_date"]])){
 				$v['insert_date'] = null;
 			}else{
 				$sort_array[$v['insert_date']] = "1";
 			}
 			
 		}
 		$this->mypage->loadview('sale/stat_by_year',$data);
 	}
 
 }
 
?>
