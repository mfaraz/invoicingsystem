<?php
/*
 * Created on 2010-4-11
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 class Stock extends Controller{
 	function __construct(){
 		parent::__construct();
 		$this->myauth->execute_auth();	//验证是否登陆
 		$this->load->model('Stockmodel');
 	}
 	
 	
 	/**
 	 * 添加进货
 	 */
 	function stock_add(){ 		 			
 		$data = null;
 		$main_id = $this->uri->segment(3);
 		if($main_id>0){
 			$data = $this->Stockmodel->stock_detail($main_id);
 			$data['total_size'] = count($data['detail']);
 		}else{
 			$data = array(
				'main'=>array('insert_date'=>'','remarks'=>'','main_id'=>''),
				'detail'=>array_fill(0,1,array('quantity'=>'','p_id'=>'','product_name'=>'','product_real_name'=>'','product_price'=>'','product_id'=>'','main_id'=>'','detail_id'=>'')));
				$data['total_size'] = 1;
	 	}	 	
 		$this->mypage->loadview('stock/stock_add',$data);
 	}
 	
 	/**
 	 * 保存进货
 	 */
 	function stock_save(){ 	
 		try{
 			$this->load->model('Productmodel');
 			$detail = null;
 			$detail = $this->myform->regroupFormData($this->input->post('detail')); 
	 		$main = $this->input->post('main');	 
	 		$form_info = array('main'=>$main,'detail'=>$detail);
	 		$rules=  $this->Stockmodel->setConfigRules($form_info);
	 		$this->form_validation->set_rules($rules);
	 		if($this->form_validation->run()==false){		 			
	 			$form_info['total_size'] =  $this->myform->getMaxIndex($this->input->post('detail'));
	 			$this->mypage->loadview('stock/stock_add',$form_info);
	 		}else{
	 			$detail = $this->Stockmodel->save_product($detail); //保存产品
	 			$detail = $this->Stockmodel->reDefine($detail);	 			
	 			$form_info['detail'] = $detail;	
	 			$this->mydb->save($form_info,$this->Stockmodel->saveConfig());
	 			$this->mypage->jsRedirect("保存成功",site_url("stock/stock_list"));		
	 		}
	 			
 		}catch(Exception $e){
 			show_error($e->getMessage());
 		}	
 		
 		
 	}
 	
 	/**
 	 * 进货列表
 	 */
 	function stock_list(){ 		
 		$data = null;
 		
 		$this->db->select('a.main_id,sum(a.quantity*c.product_price) as price,count(distinct a.product_id) as p_count,date(b.insert_date) as insert_date,b.remarks',false)
 		->from('stock_detail as a') 
 		->join('stock_main as b','b.main_id=a.main_id','inner') 
 		->join('product as c','a.product_id=c.product_id','inner')
 		->group_by('a.main_id')
 		->order_by('a.main_id','desc');
		if($this->input->get('insert_date')) $this->db->where('b.insert_date',$this->input->get('insert_date'));
 		$this->db->like('c.product_name',$this->input->get('product_name'));
 		$this->db->like('c.product_real_name',$this->input->get('product_real_name'));
 		$data  =  $this->mydb->getList(); 	
 		$this->mypage->loadview('stock/stock_list',$data);
 	}
 	
 	/**
 	 * 查看进货 
 	 */
 	function stock_view(){
 		$data = null;
 		$data = $this->Stockmodel->stock_detail($this->uri->segment(3));
 		$this->mypage->loadview('stock/stock_view',$data);
 	}
 	/**
 	 * 删除进货
 	 */
 	function stock_delete(){
 		try{
 			$id = $this->uri->segment(3);
 			$this->mydb->delete($id,$this->Stockmodel->saveConfig());
 			$this->mypage->jsRedirect("保存成功",site_url("stock/stock_list"));			
 		}catch(Exception $e){
 			show_error($e->getMessage());
 		}	
 	}	
 	
 	/**
 	 * 进货按日统计
 	 */
 	function stat_by_date(){
 		$this->db->select('c.product_price,date(b.insert_date) as insert_date,sum(a.quantity) as quantity,c.product_name,c.product_real_name',false);
 		$this->db->from("stock_detail as a");
 		$this->db->join("stock_main as b","b.main_id=a.main_id","inner");
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
 		$this->mypage->loadview('stock/stat_by_date',$data);
 	}
 	
 	/**
 	 * 进货按年统计
 	 */
 	function stat_by_year(){ 		
 		$this->db->select('c.product_price,concat(year(b.insert_date),\'-\',month(b.insert_date)) as insert_date,sum(a.quantity) as quantity,c.product_name,c.product_real_name',false);
 		$this->db->from("stock_detail as a");
 		$this->db->join("stock_main as b","b.main_id=a.main_id","inner");
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
 		$this->mypage->loadview('stock/stat_by_year',$data);
 	}
 }
 
?>
