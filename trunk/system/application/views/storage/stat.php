<div class="mytheme1" align="left" >库存统计</div>	
<?php
$attr  = array('method'=>'get');
echo form_open("storage/storage_stat",$attr);?>
<table  align="center" class="table_search" >
<tr>
	<td>
	请输入产品编号：
	</td>
	<td>
	<input type="hidden" name="product_id"  class="auto_id" value="<?php echo $_GET['product_id']; ?>" />
	<input type="text" name="product_name" onfocus="autocomplete_load(this)"   value="<?php echo set_value(null,$_GET['product_name']); ?>"/>
	</td>	
	<td>
		<?php echo form_submit("submit","查询"); ?>
	</td>
</tr>
</table>
<?php echo  form_close();?>
<table class="mytable">
<tr>
	<th>产品</th>
	<th>真实名称</th>
	<th>单价</th>
	<th>进货</th>
	<th>销售</th>
	<th>库存</th>
</tr>
<?php foreach($list as $v):?>
<tr class="tr_center">
	<td><?php echo $v['product_name'];?></td>
	<td><?php echo $v['product_real_name'];?></td>
	<td><?php echo $v['product_price'];?></td>
	<td><?php echo $v['in_quantity'];?></td>
	<td><?php echo $v['out_quantity'];?></td>
	<td><?php echo $v['quantity'];?></td>
	
</tr>
<?php endforeach;?>
</table>

<div class="margin_25 center"><?php echo $page_link; ?></div>