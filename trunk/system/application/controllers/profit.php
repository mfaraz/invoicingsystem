<?php
/*
 * Created on 2010-4-11
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 class Profit extends Controller{
 	function __construct(){
 		parent::__construct();	
 		$this->myauth->execute_auth();	//验证是否登陆
 		$this->load->model('Profitmodel');
 	}
 	
	/**
	 * 按日统计
	 */
	function stat_by_date(){
		$this->db->select('sum(d.price) as other_cost,a.*,date(b.insert_date) as insert_date,sum(a.quantity*c.product_price) as costs,sum(a.quantity*a.product_price) as sale_price,(sum(a.quantity*(a.product_price-c.product_price))-sum(d.price)) as profits',false);
		$this->db->from('sale_detail as a ');
		$this->db->join('sale_main as b','a.main_id=b.main_id');
		$this->db->join('product as c','c.product_id=a.product_id');
		$this->db->join('v_other_cost as d','date(d.insert_date)=date(b.insert_date)','left');
		$this->db->group_by('date(b.insert_date)');
		$this->db->order_by('date(b.insert_date)','desc');
		$this->mypage->loadview('profit/stat_by_date.php',$this->mydb->getlist());	
	} 	
	
	/**
	 * 按年统计
	 */
	function stat_by_year(){		
		$this->db->select('d.price as other_cost,concat(year(b.insert_date),\'-\',month(b.insert_date)) as year_month_string,sum(a.quantity*c.product_price) as costs,sum(a.quantity*a.product_price) as sale_price,(sum(a.quantity*(a.product_price-c.product_price))-d.price) as profits',false);
		$this->db->from('sale_detail as a ');
		$this->db->join('sale_main as b','a.main_id=b.main_id');
		$this->db->join('product as c','c.product_id=a.product_id');
		$this->db->join('(select insert_date,sum(price) as price from v_other_cost  group by year(insert_date),\'-\',month(insert_date)) as d','concat(year(d.insert_date),\'-\',month(d.insert_date))=concat(year(b.insert_date),\'-\',month(b.insert_date))','left');
		$this->db->group_by('concat(year(b.insert_date),\'-\',month(b.insert_date))');
		$this->db->order_by('concat(year(b.insert_date),\'-\',month(b.insert_date))');
		$this->mypage->loadview('profit/stat_by_year.php',$this->mydb->getlist());	
	}
	
	
	/**
	 * 添加其他成本
	 */
	function other_cost_add(){
		$main_id = $this->uri->segment(3);
		$detail = $data = $this->Profitmodel->other_cost_detail($main_id);
		empty($main_id) && $data = array("detail"=>array_pad($detail,1,0));
		$data['total_size'] = count($data['detail']);		
		$this->mypage->loadview('profit/other_cost_add',$data);
	}
	
	/**
	 * 删除明细
	 */
	function other_cost_delete(){
		try{
			$this->mydb->delete($this->uri->segment(3),$this->Profitmodel->otherCostSaveConfig());
			redirect("profit/other_cost");
		}catch(Exception $e){
			show_error($e->getMessage());
		}
	}
	/**
	 * 其他成本明细
	 */
	function other_cost_view(){
		$data = $this->Profitmodel->other_cost_detail($this->uri->segment(3));
		$this->mypage->loadview("profit/other_cost_view",$data);
	}
	
	/**
	 * 其他成本
	 */
	function other_cost(){
		$this->db->select("main.main_id,sum(detail.price) as price,date(main.insert_date) as insert_date")->from("other_cost_detail as detail")
		->join("other_cost_main as main","main.main_id=detail.main_id","inner")
		->group_by("detail.main_id")->order_by("detail.main_id","desc");			
		$data = $this->mydb->getList();
		$this->mypage->loadview('profit/other_cost_list',$data);
	}
	
	
	
	
	/**
	 * 保存其他成本
	 */
	 function other_cost_save(){	 	
	 	try{ 		
 			$detail = null;
 			$detail = $this->myform->regroupFormData($this->input->post('detail')); 
	 		$main = $this->input->post('main');	 
	 		$form_info = array('main'=>$main,'detail'=>$detail);
	 		$rules=  $this->Profitmodel->setOtherCostConfigRules($form_info);
	 		$this->form_validation->set_rules($rules);
	 		if($this->form_validation->run()==false){		 			
	 			$form_info['total_size'] =  $this->myform->getMaxIndex($this->input->post('detail'));
	 			$this->mypage->loadview('profit/other_cost_add',$form_info);
	 		}else{
	 			$form_info['detail'] = $detail;	
	 			$this->mydb->save($form_info,$this->Profitmodel->otherCostSaveConfig());
	 			redirect("profit/other_cost"); 			
	 		}
	 			
 		}catch(Exception $e){
 			show_error($e->getMessage());
 		}
	 	
	 }
 }
?>
