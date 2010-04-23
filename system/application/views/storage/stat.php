<div align="center" class="margin_25" width="80%">
	<div class="mytheme1" align="left" >库存统计</div>
</div>
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