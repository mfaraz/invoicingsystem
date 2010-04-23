<?php
/*
 * Created on 2010-4-15
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 class Members extends Controller{
 	function __construct(){
 		parent::__construct();
 		$this->myauth->execute_auth();	//验证是否登陆
 		$this->load->model('Membersmodel'); 	
 	}
 	
 	/**
 	 * 会员添加
 	 */
 	function member_add(){
 		$main_id = $this->uri->segment(3);
 		if($main_id){
 			$main  = $this->Membersmodel->member_detail($main_id);
 			$data = array("main"=>$main, 'sex_select'=>array(1=>$main['sex']==1?true:false,2=>$main['sex']==2?true:false));
 		}else{
 			$data = array('main'=>array(
								'member_name'=>'',
								'mobile'=>'',								
								'qq'=>'',
								'phone'=>'',
								'address'=>'', 		
								'remarks'=>'', 
								'member_id'=>'', 
					  			
				 		),
				 	
				 	 'sex_select'=>array(1=>false,2=>true),		
 			); 	 			
 		}
 		
 		$this->mypage->loadview("members/member_add",$data);
 	}
 	
 	/**
 	 * 保存会员
 	 */
 	function member_save(){ 	
 		try{
 			$main = $this->input->post('main');
 			$data = array('main'=>$main, 
				'sex_select'=>array("1"=>$main['sex']==1?true:false,"2"=>$main['sex']==2?true:false),	
				); 
			$this->form_validation->set_rules($this->Membersmodel->setConfigRules());
 			if($this->form_validation->run()==true){
 				$this->mydb->save($data,$this->Membersmodel->save_config());
 				redirect('members/member_list');
 			}else{ 				
 				$this->mypage->loadview("members/member_add",$data);
 			}
 			 			
 		}catch(Exception $e){
 			show_error($e->getMessage());
 		}	
 		
 	}
 	
 	
 	
 	
 	/**
 	 * 会员列表
 	 */
 	function member_list(){
 		$this->db->select('*,if(sex=1,\'男\',\'女\') as sex_str',false);
 		$this->db->from('members');
 		$data = $this->mydb->getList();
 		$this->mypage->loadview('members/members_list',$data);	
 	}
 	
 	
 	/**
 	 * 删除会员
 	 */
 	function member_delete(){
 		try{
 			$this->mydb->delete($this->uri->segment(3),$this->Membersmodel->save_config());
 			redirect("members/member_list");
 		}catch(Exception $e){
 			show_error($e->getMessage());
 		}	
 		
 	}
 	
 }
?>
