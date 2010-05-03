<?php
 
 echo form_fieldset("添加/修改其他成本");
 echo form_open("profit/other_cost_save",array("id"=>"form1"));
?>
<div class="right width_pct_80 center" >
		款项发生日期： <input type="text" name="main[insert_date]" class="datepicker" value="<?php echo set_value("main[insert_date]",$main["insert_date"]); ?>" >
		<?php echo form_error("main[insert_date]","<div id='error_span' class='red_font'>","</div>");  ?>
		<br><br>
		
</div>	
<table class="mytable" >
<tr>
	<th>金额</th>
	<th>备注</th>
	<th width="80">操作</th>
</tr>

<?foreach($detail as $k=>$v):?>
<tr class="tr_center">

	<td>
		<input type="text" id="price" name="detail[price][<?php echo $k;?>]" value="<?php echo set_value("detail[price][$k]",$v['price']);?>">
		
		<?php echo form_error("detail[price][$k]","<div id='error_span' class='red_font'>","</div>"); ?>
	</td>
	<td>
		<textarea id="remarks" name="detail[remarks][<?php echo $k;?>]"><?php echo set_value("detail[remarks][$k]",$v['remarks']);?></textarea>
		<?php echo form_error("detail[remarks][$k]","<div id='error_span' class='red_font'>","</div>"); ?>
	</td>
	  <td class="td_op">		
				<input type="hidden" name="detail[main_id][<?php echo $k;?>]" id='detail_main_id' value="<?php echo set_value("detail[main_id][$k]",$v['main_id']); ?>">
				<input type="hidden" name="detail[detail_id][<?php echo $k;?>]" id='detail_id' value="<?php echo set_value("detail[detail_id][$k]",$v['detail_id']); ?>">
				<a href="javascript:;"  target="_self" onclick="core_copy($(this),'#detail_id,#price,#remarks')" class="link_add">&nbsp;</a>
				<a href="javascript:;"  id="delete_link"  class="link_del  <?php if($k==0):?>hide<?php endif;?>"    target="_self" onclick="core_drop($(this))" >&nbsp;</a>
		
	 </td> 
</tr>
<?php 
	endforeach;
?>
</table>

<input type="hidden" id="total_detail" value="<?php echo $total_size;?>" />
 <center>
 <?php	 	
	 		echo form_submit("submit","保存");
	 	?>
 
 </center>
<input type="hidden" name="main[main_id]" value="<?php echo $main['main_id'];?>" />	
<?php 
 echo form_close();
 echo form_fieldset_close();
 ?>