<?php
/*
 * Created on 2010-4-13
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
echo form_fieldset('产品添加/修改');
?>

<?php
 
 echo form_open("product/product_save");

 
?>
<table width="1000"  align="center" class="mytable center margin_25 ">


	<tr  >
		<th width="150">产品</th><th>真实名称</th><th width="150">单价</th><th width="150">备注</th><th width="90">操作</th>
	</tr>
	
<tbody id="operate_div">
<?php 

 foreach($detail  as $k=>$v): 
?>


	<tr class="tr_center">	
		<td  >	
		
			<?php
					
			
				$data = array(
		              "name"        => "detail[product_name][$k]",
		              "id"          => "product_name",
		              "value"       => set_value("detail[product_name][$k]",$v['product_name']),
		              "maxlength"   => "100",
		              "size"        => "15",
		             
		            );
		
				echo form_input($data);	
				
			
			?>	
						
			<?php echo form_error("detail[product_name][$k]",'<div id="error_span" class="red_font">', '</div>');	?>	
		</td>
		<td>
			<?php
					
			
				$data = array(
		              "name"        => "detail[product_real_name][$k]",
		              "id"          => "product_name",
		              "value"       => set_value("detail[product_real_name][$k]",$v['product_real_name']),
		              "maxlength"   => "100",
		              "size"        => "15",
		             
		            );
		
				echo form_input($data);	
				
			
			?>	
						
			<?php echo form_error("detail[product_real_name][$k]",'<div id="error_span" class="red_font">', '</div>');	?>	
		
		
		</td>
		
		<td >
			<?php
				$data = array(
		              "name"        => "detail[product_price][$k]",
		              "id"          => "product_price",
		              "value"       => set_value("detail[product_price][$k]",$v['product_price']),		            
		              "size"        => "15",
		             
		             
		            );
		
				echo form_input($data);		
			
			?>	
			<?php echo form_error("detail[product_price][$k]",'<div id="error_span" class="red_font">', '</div>');	?>	
		
		</td>		
		<td >
			<input type="hidden" id="product_id" name="detail[product_id][<?php echo $k;?>]" value="<?php echo set_value("detail[product_id][$k]",$v["product_id"]);?>">
			<?php
				$data = array(
		              "name"        => "detail[product_remarks][$k]",
		              "id"          => "product_remarks",
		              "value"       => set_value("detail[product_remarks][$k]",$v['product_remarks']),		            
		              "rows"        => "3",
		              "cols"        => "35",
		             
		            );
		
				echo form_textarea($data);				
			?>	
		
		</td>		
		<td   class="td_op" >	
			
			<a href="javascript:;"  target="_self" onclick="copy($(this))" class="red_font">复制</a>
			
			<a href="javascript:;"  id="delete_link"  class="red_font <?php if ($k==0||$v["product_id"]):?>hide<?php endif;?>"    target="_self" onclick="drop($(this))" >删除</a>
			
		</td>
				
	</tr>
	
<?php endforeach;?>

</tbody>


</table>




<center>
	<input type="hidden" id="total_detail"  name="total_detail" value="<?php echo $total_size;?>" />

	<?php 		
		echo form_submit('mysubmit', '保存',array('class'=>'sexybutton sexyorange'));	
			
       
	?>

</center>

<?php
 echo form_close();
 echo form_fieldset_close();
?>
<script language="javascript">

//添加
function copy(obj){	
	var parents = $(obj).parents("tr");	
	var object_new = $(parents).clone().insertAfter($(parents));	
	$(object_new).find('#delete_link').show();		
	$(object_new).find('#product_id,#product_name,#product_price,#product_remarks').val('');		
	var size = parseInt($('#total_detail').val());	
	size++;
	$('#total_detail').val(size);				
	$(object_new).find("[name^='detail']").each(function(){		
		var name  = $(this).attr("name");	
		var new_name = name.replace(/\[\d.*?\]/,'['+size+']');			
		$(this).attr("name",new_name) ;
		
	})	

}
//删除
function drop(obj){
	$(obj).parents("tr").remove();		
	
}

</script>


