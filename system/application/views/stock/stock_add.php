<?php
/*
 * Created on 2010-4-15
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 
 echo form_fieldset("添加进货");
 echo form_open("stock/stock_save",array("id"=>"form1"));
  
 ?>
 <center>
	 <table  width="80%" class="mytable"> 
		 <tr>
			 <th>产品</th>
			 <th>真实名称</th>
			 <th>数量</th> 
			 <th>单价</th> 
			 <th width="90">操作</th>  
		 </tr>
		 <?php
		 
		 	foreach($detail as $k=>$v):	 	
		 ?>
		 
		  <tr class="tr_center"><td>
				<input type="hidden" id="product_id"  class="auto_id" name="detail[product_id][<?php echo $k;?>]" value="<?php echo set_value("detail[product_id][$k]",$v['product_id']);?>" onchange="ajax_product($(this));">
				<input  id="product_name" name="<?php echo "detail[product_name][$k]";?>" style="width:200px;"  onfocus="autocomplete_load(this)"  value="<?php echo set_value("detail[product_name][$k]",$v['product_name']);?>" /> 
				<?php echo form_error("detail[product_id][$k]",'<div id="error_span" class="red_font">','</div>'); ?>
				<?php echo form_error("detail[product_name][$k]",'<div id="error_span" class="red_font">','</div>'); ?>
		 </td>
		 <td><input type="text" id="product_real_name" name="<?php echo "detail[product_real_name][$k]";?>"  value="<?php echo set_value("detail[product_real_name][$k]",$v['product_real_name']);?>" ></td>
		 <td>
				<input type="text" id="quantity" name="detail[quantity][<?php echo $k;?>]" value="<?php echo set_value("detail[quantity][$k]",$v['quantity']);?>">
				<?php echo form_error("detail[quantity][$k]",'<div id="error_span" class="red_font">','</div>'); ?>
		 </td>
		 
		   <td>
				<input type="text" id="product_price"  readonly="true" name="detail[product_price][<?php echo $k;?>]" value="<?php echo set_value("detail[product_price][$k]",$v['product_price']);?>">
				<?php echo form_error("detail[product_price][$k]",'<div id="error_span" class="red_font">','</div>'); ?>
		 </td> 
		 
		  <td class="td_op">		
			<input type="hidden" name="detail[main_id][<?php echo $k;?>]" id='detail_main_id' value="<?php echo set_value("detail[main_id][$k]",$v['main_id']); ?>">
			<input type="hidden" name="detail[detail_id][<?php echo $k;?>]" id='detail_id' value="<?php echo set_value("detail[detail_id][$k]",$v['detail_id']); ?>">
			<a href="javascript:;"  target="_self" onclick="core_copy($(this),'#product_id,#quantity,#product_name,#detail_id','copy_extend')" class="red_font">复制</a>
			<a href="javascript:;"  id="delete_link"  class="red_font  <?php if($k==0):?>hide<?php endif;?>"    target="_self" onclick="core_drop($(this))" >删除</a>
	
		 </td> 
		 
		 
		 </tr>
		 
		 <?php
		 	endforeach;
		 ?>
		
		
		 	 
		 
	 </table>
	 <table width="80%">
	 <tr >
	 <td class="right">
	 进货日期：
	 </td>
	 <td class="left">
	  <input type="text" class="datepicker" name="main[insert_date]" value="<?php echo set_value("main[insert_date]",$main['insert_date']);?>" size="8">
	
		 
	 <?php echo form_error("main[insert_date]",'<div id="error_span" class="red_font">','</div>'); ?>
	 </td>
	 <td class="right">
	 进货备注：
	 </td>
	 <td class="left"><textarea cols="40" rows="3" name="main[remarks]" ><?php echo set_value("main[remarks]",$main['remarks']);?></textarea>
			</td>	 
	 	</tr></table>
</center>	
<input type="hidden" id="total_detail" value="<?php echo $total_size;?>" />	
<input type="hidden" name="main[main_id]" value="<?php echo $main['main_id'];?>" />
<input type="hidden" id="form_submit_flag" value="0">	
 <center>
 <?php	 	
	 		echo form_submit("submit","保存");
	 	?>
 
 </center>
<?php 

 echo form_close();
 echo form_fieldset_close();
 ?>

<script language="javascript">
	$(function() {
			$(".datepicker").datepicker({
				pickerClass:"my-picker",
				autoSize:"false",
				
				dateFormat:"yy-mm-dd",monthNames:['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月']
			,
			dayNamesMin:['日', '一', '二', '三', '四', '五', '六']
			
			});
	});
		
	//复制扩展
	function  copy_extend(obj){
		
	} 
	
	 //取产品信息
	function ajax_product(obj){	
		var product_id = $(obj).val();		
		var parent = $(obj).parents("tr:first");		
		if(!product_id) {
			$(parent).find('#product_price,#product_real_name').removeAttr('readonly').val('');
			return false;
		}			;
		var base_url = $('#sys_base_url').html()+'/index.php/common/ajax_product/'+product_id;
		$.getJSON(base_url, function(json){			
		 	parent.find('#product_price').attr('readonly','true').val(json.product_price);
		 	parent.find('#product_real_name').attr('readonly','true').val(json.product_real_name);
		});		 
	}
	
	
	
</script> 

	
	