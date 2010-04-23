	<div class="mytheme1" align="left" >销售按日统计</div>
<table class="mytable">
<tr>
	<th>日期</th>
	<th>产品</th>	
	<th>真实名称</th>
	<th>单价</th>
	<th>销售数量</th>
</tr>
<?php foreach($list as $v):?>
<tr class="tr_center">
	<td><?php echo $v['insert_date'];?></td>
	<td><?php echo $v['product_name'];?></td>
	<td><?php echo $v['product_real_name'];?></td>
	<td><?php echo $v['product_price'];?></td>
	<td><?php echo $v['quantity'];?></td>	
</tr>
<?php endforeach;?>
</table>

<div class="margin_25 center"><?php echo $page_link; ?></div>