<?php
 if (!defined('BASEPATH')) show_error('No direct script access allowed'); 
class Mypage{	
	private static $instance;

	public function __construct()
	{
		self::$instance =& $this;
		$this->header_html=array('js'=>null,'css'=>null);
		$config = &get_config();	
		$this->getHeaderJs($config['default_js']);
		$this->getHeaderCss($config['default_css']);
		$this->config = $config;
		
	}


	
	function loadview($tpl,$data=null){	
			$CI = & get_instance();					
			$data['header_html'] = $this->header_html;		
			$CI->load->view('top.php',$data);				
			$tpl_arr = explode(',',$tpl);
			if(is_array($tpl_arr)){
				foreach($tpl_arr as $v){
					$CI->load->view($v,$data);
				}
			}else{
				$CI->load->view($tpl,$data);
				
			}
			$CI->load->view('foot.php',$data);	
	}	
	
	
	/**
	 * 加载js
	 */
	function getHeaderJs($js){									
			if(empty($js)) return '';
			if(is_array($js)){	
				foreach($js as $value){				
							
					$this->header_html['js']  .= '<script language="JavaScript" type="text/javascript" src="' 
					. base_url() . 'js/'.$value.'.js"></script>'.chr(13);
													
				}		
			}else{
				
					$this->header_html['js']  .= '<script language="JavaScript" type="text/javascript" src="' 
					. base_url() . 'js/'.$js.'.js"></script>'.chr(13);
			}			
		
	}
	
	/**
	 * 加载样式
	 */
	function getHeaderCss($css){		
		if(empty($css)) return '';
		if(is_array($css)){
			foreach($css as $value){
				$this->header_html['css'] .= "<link href=\"".base_url()."css/".$value.".css\" rel=stylesheet > ".chr(13);
			}
		}else{
			$this->header_html['css'] .= "<link href=\"".base_url()."css/".$css.".css\" rel=stylesheet > ".chr(13);
		}		
		
	}
	
	
	
	 	
	 function myEncrypt($string, $operation) { 
	 	if(empty($string)) throw Exception('未传值');
	 	if(empty($operation)) throw Exception('加密类型未设置');
	 	$key  = $this->config['encryption_key'];	 	
		$keylength = strlen($key);
		$string = $operation == 'DECODE' ? base64_decode($string) : $string;
		$coded = '';		
		for($i = 0; $i < strlen($string); $i += $keylength) {
		
			$coded .= substr($string, $i, $keylength) ^ $key;
			//substr 类似于.net中substring
		}	
		
		$coded = $operation == 'ENCODE' ? str_replace('=', '', base64_encode($coded)) : $coded;
		return $coded;
	 		
	}
		
		
		
	public static function &get_mypage()
	{
		return self::$instance;
	}	
	
	/**
	 * 跳转
	 */
	function redirectWithInfo($url,$msg){		
		$data = array('url'=>$url,'msg'=>$msg);
		$this->loadview('mypage/redirect_info',$data);			
	}
	
	/**
	 * 数组转成url
	 */
	function arrayToUrl($array){			
		$link='?1=1';
		$split ='&';
		if(empty($array)) return '?1=1';				
		foreach($array as $k=>$v){
			if(in_array($k,array('1','per_page'))) continue;
			$link .= $split.$k.'='.$v;				
		}
		return $link;
	}
	
}




function &get_mypage()
{
	return Mypage::get_mypage();
}





