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
 	}
 	
	/**
	 * 按日统计
	 */
	function stat_by_date(){
		$this->db->select('a.*,date(b.insert_date) as insert_date,sum(a.quantity*c.product_price) as costs,sum(a.quantity*a.product_price) as sale_price,sum(a.quantity*(a.product_price-c.product_price)) as profits',false);
		$this->db->from('sale_detail as a ');
		$this->db->join('sale_main as b','a.main_id=b.main_id');
		$this->db->join('product as c','c.product_id=a.product_id');
		$this->db->group_by('date(b.insert_date)');
		$this->db->order_by('date(b.insert_date)','desc');
		$this->mypage->loadview('profit/stat_by_date.php',$this->mydb->getlist());	
	} 	
	
	/**
	 * 按年统计
	 */
	function stat_by_year(){		
		$this->db->select('a.*,concat(year(b.insert_date),\'-\',month(b.insert_date)) as year_month_string,sum(a.quantity*c.product_price) as costs,sum(a.quantity*a.product_price) as sale_price,sum(a.quantity*(a.product_price-c.product_price)) as profits',false);
		$this->db->from('sale_detail as a ');
		$this->db->join('sale_main as b','a.main_id=b.main_id');
		$this->db->join('product as c','c.product_id=a.product_id');
		$this->db->group_by('concat(year(b.insert_date),\'-\',month(b.insert_date))');
		$this->db->order_by('concat(year(b.insert_date),\'-\',month(b.insert_date))');
		$this->mypage->loadview('profit/stat_by_year.php',$this->mydb->getlist());	
	}
	
	
 }
?>
