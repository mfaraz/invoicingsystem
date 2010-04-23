
<?php
$attr  = array('method'=>'get');
echo form_open("storage/storage_detail",$attr);?>
<table  align="center" class="table_search" >
<tr>
	<td>
	请输入产品编号：
	</td>
	<td>
	<input type="text" name="product_name"  value="<?php echo set_value(null,$_GET['product_name']); ?>"/>
	</td>	
	<td>
		<?php echo form_submit("submit","查询"); ?>
	</td>
</tr>
</table>
<?php echo  form_close();?>
<?php if($list):?>
<div class="mytheme1" align="left" >库存流转明细</div>
<table class="mytable" width="80%">
	<tr>
		<th>产品</th>	
		<th>真实名称</th>
		<th>日期</th>					
		<th>进货</th>
		<th>销售</th>
		<th>库存</th>
	</tr>	
	<?php
	foreach((array)$list as $k=>$v):
	foreach((array)$v['detail'] as $k1=>$v1):
	?>
	<tr class="tr_center">	
		<td><?php echo $v1['product_name'];?></td>
		<td><?php echo $v1['product_real_name'];?></td>	
		<td><?php echo $v1['insert_date'];?></td>		
		<td><?php echo $v1['in_quantity'];?></td>
		<td><?php echo $v1['out_quantity'];?></td>
		<td><?php echo $v1['stat']?></td>
	
	</tr>
	<?php	endforeach;?>	
	<tr >		
		<td ></td>
		<td></td>
		<td></td>
		<td></td>
		<td  class="right"><span class="red_font"></span></td>
		<td class="center"><?php echo $v['stat']?></td>
	
	</tr>
	<?php	endforeach;?>	
</table>
<?php endif;?>
