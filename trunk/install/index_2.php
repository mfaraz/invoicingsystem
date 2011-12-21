<?php

		/*--------------------------------------------------
		  Restore data 
		  Email: conqweal@163.com
		  Author: conqweal		
		  --------------------------------------------------*/
		@set_time_limit(300);
		extract($_POST);		
        header("Content-Type:text/html;charset=UTF-8");
		define('CFG_DB_HOST',$db_host);				
		define('CFG_DB_USER',$db_user);        			
		define('CFG_DB_PASSWORD',$db_password);  			
		define('CFG_DB_ADAPTER','mysql');    			
		define('CFG_DB_NAME','guo_logstics');				
		define('DEFAULT_SQL_LOCATION','../database/guo_logstics.sql');		
        try{
		
				$connect = mysql_connect(CFG_DB_HOST,CFG_DB_USER,CFG_DB_PASSWORD)	;
				mysql_select_db(CFG_DB_NAME);
				mysql_query("set names 'utf8' ");
				//mysql_query("DROP DATABASE  guo_logstics");
				mysql_query("drop database if exists guo_logstics; CREATE DATABASE `guo_logstics` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci; ");				
				$query = mysql_query('show tables from '.CFG_DB_NAME,$connect); 
				while($row = mysql_fetch_array($query)&&substr($row[0],0,2) != 'v_') {	
					mysql_query("TRUNCATE TABLE `".$row[0]."`;") ;	
				}				
				if ($str = remove_remarks(file_get_contents(DEFAULT_SQL_LOCATION))) { 	
					$split_str = split_sql_file($str,";");
					$split_str_count=count($split_str);
					for($i = 0;$i <$split_str_count ;$i++) {
							$cmd_txt = $split_str[$i];			
							@mysql_query($cmd_txt,$connect) ;					
											
					 }		     
			   }   
			   echo "install ok.";
			   rename("../install","../install_ok");
          }catch (Exception $e){
	            throw  new Exception($e->getMessage());
	       }

		/*--------------------------------------------------
		  remove_remarks()
		  Remove # type remarks from large sql files
		  --------------------------------------------------*/
		function remove_remarks($sql) {
			$i = 0;
			while ($i < strlen($sql)) {
				if (($sql[$i] == "-"||$sql[$i] == "#") and ($i==0 or $sql[$i-1] == "\n")) { 
					$j=1;
					while ($sql[$i+$j] != "\n") {
						$j++;
						if ($j+$i > strlen($sql)) break;
					}
					$sql = substr($sql,0,$i) . substr($sql,$i+$j);
				}
				$i++;
			}
			return($sql);
		}

		/*--------------------------------------------------
		  split_sql_file()
		  Split up a large sql file into individual queries
		  --------------------------------------------------*/
		function split_sql_file($sql, $delimiter) {
			$sql = trim($sql);
			$char = "";
			$last_char = "";
			$ret = array();
			$in_string = true;
			for($i=0; $i<strlen($sql); $i++) {
				$char = $sql[$i];				
				/* if delimiter found, add the parsed part to the returned array */
				if($char == $delimiter && !$in_string) {
					$ret[] = substr($sql, 0, $i);
					$sql = substr($sql, $i + 1);
					$i = 0;
					$last_char = "";
				}				
				if($last_char == $in_string && $char == ")")  $in_string = false;
				if($char == $in_string && $last_char != "\\") $in_string = false;
				elseif(!$in_string && ($char == "\"" || $char == "'") && ($last_char != "\\")) $in_string = $char;
				$last_char = $char;
			}			
			if (!empty($sql)) $ret[] = $sql;
			return($ret);
		}      
?>
