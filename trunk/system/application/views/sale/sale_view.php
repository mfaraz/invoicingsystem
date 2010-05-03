<center>销售单明细</center>
<table align="center" class="margin_25"  width="40%">
	<tr>		
		<td class="right">日期：</td>
		<td class="left"><?php echo $main['insert_date']; ?></td>
		<td class="right">备注：</td>
		<td class="left"><?php echo $main['remarks']; ?></td>
	</tr>
</table>

<table align="center" class="mytable">
	<tr>
		<th>产品</th>
		<th>成本价</th>
		<th>单价</th>
		<th>数量</th>
		<th>金额</th>		
	</tr>
	<?php foreach($detail as $v):?>
	<tr class="tr_center">
		<td><?php echo $v['product_name'];?></td>
		<td><?php echo $v['cost'];?></td>
		<td><?php echo $v['product_price'];?></td>
		<td><?php echo $v['quantity'];?></td>
		<td><?php echo $v['sum_price'];?></td>		
	</tr>
	<?php endforeach;?>
	<tr class="tr_center">
		<td></td>
		<td></td>
		<td></td>
		<td>合计</td>
		<td><?php echo $total['price'];?></td>		
	</tr>
</table>
<div class="margin_25 center">
	<a href="javascript:window.close();">[关闭]</a>
</div>

