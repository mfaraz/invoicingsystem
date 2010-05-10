<?php
	class Assist extends Controller{
		function __construct(){
			parent::__construct();
		}
		
		function calendar(){			
			$this->mypage->loadview("assist/calendar");
		}
		
		
	}
?>