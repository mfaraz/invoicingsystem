<?php
class Product extends Controller { 		
 	function __construct(){ 		
 		parent::Controller();
 		$this->myauth->execute_auth();	//验证是否登陆 	
 		$this->load->model('Productmodel');	 
 	}
 	
 	/**
 	 * 添加产品
 	 */
 	function product_add(){ 
 		$this->mypage->getHeaderCss('sexybuttons');
 		$data = array();  		 		
 		$data['detail'] = array_fill(0,5,array(
 			'product_id'=>'',
 			'product_name'=>'',
 			'product_real_name'=>'',
 			'product_price'=>'',
 			'product_remarks'=>'',
 		));	
 		$data['total_size'] = 5;		
 		$this->mypage->loadview('product/product_add',$data);
 		
 			 		
 	} 	

	/**
	 * 修改产品
	 */
 	function product_list(){   	
 		$url_array = $this->uri->uri_to_assoc(1,array());
		unset($url_array['page']);		
		$str = $this->uri->assoc_to_uri($url_array);	
		$config['base_url'] = 		site_url($str.'/page/');	
 		$config['uri_segment'] = $this->uri->total_segments();	 		
 		$params = array( 		
 			'limit_to'=>$this->config->item('per_page'),
 			'limit_from'=>$this->uri->segment($this->uri->total_segments()),
 		);
 		$data = $this->Productmodel->products($params);  		
 		$config['per_page'] = $this->config->item('per_page'); 			
 		$config['total_rows'] = $data['count'];  		
 		$this->pagination->initialize($config); 
 		$data['page_link'] = $this->pagination->create_links(); 
 		$this->mypage->getHeaderCss('sexybuttons');
 		$this->mypage->getHeaderJs('/item/product_list');
 		$this->mypage->loadview('product/product_list',$data);
 		
 	}
 	
 	/**
 	 * 保存产品
 	 */
 	function product_save(){
 		try{	
	 		
	 	
	 		$detail = null;  				
	 		$detail =  $this->myform->regroupFormData($this->input->post("detail"));
	 		$config = $this->Productmodel->setConfigRules($detail);
	 		if(empty($detail)){ 			
	 			throw new Exception('发生异常，请联系管理员');
	 		}	 
	 				
	 		$this->form_validation->set_rules($config);	 
	 		if($this->form_validation->run()==false){	 		
	 			$data = array('detail'=>$detail);	
	 			$data['total_size'] = $this->myform->getMaxIndex($this->input->post('detail')); 
	 			$this->mypage->getHeaderCss('sexybuttons');								
	 			$this->mypage->loadview('product/product_add',$data);
	 			
	 		}else{ 			
	 			$this->Productmodel->save($detail);
	 			$this->Productmodel->createCaches();//生成缓存
	 			redirect('/product/product_list/', 'refresh');
		
	 			
	 		}	
 		}catch(Exception $e){
 			show_error($e->getMessage()); 		
 		}	
 		
 	}	
 	
 	/**
 	 * 验证产品类
 	 */
 	function product_name_check($str,$param){ 
 		if(empty($str)) return true;	
 		$detail = $this->input->post('detail');
 		$key = str_replace(array('detail[product_name][',']'),array('',''),$param);
 		$product_id = $detail['product_id'][$key]; 	
 		$sql = 'select count(1) as flag from product where product_id!=? and product_name=?';
 		$row = $this->db->query($sql,array($product_id,trim($str)))->row_array();
 		if($row['flag']>0){ 	 			
 			$this->form_validation->set_message('product_name_check','对不起,%s已经存在');
 			return false;
 		}else{
 			return true;
 		}
 	}
 	
 	
 	/**
 	 * 产品批处理
 	 */
 	function product_batch(){
 		$this->mypage->getHeaderCss(array('sexybuttons'));
 		$flag  = $this->input->post('op_type');
 		$param  = array("ids"=>$this->input->post('ids')); 
 		$data = array('detail'=>$this->Productmodel->simpleProducts($param)); 
 		if($flag=='update'){	
 			$data['total_size'] = count($data['detail']);
 			$this->mypage->loadview('product/product_add',$data);	
 		}else{
 			$this->mypage->getHeaderCss(array('sexybuttons'));
 			$this->mypage->loadview('product/product_delete',$data);
 		}
 		
 	}
	
	/**
	 * 删除产品
	 */
	function product_delete(){
		try{
			$this->Productmodel->deleteproduct($this->input->post('ids'));
			$this->Productmodel->createCaches();//生成缓存
			redirect("product/product_list");
		}catch(Exception $e){			
			show_error($e->getMessage());
		}
	}
 			
 			
 			
 	
 }
