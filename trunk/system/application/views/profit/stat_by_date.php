<div align="center" class="margin_25" width="80%">
	<div class="mytheme1" align="left" >利润日统计</div>
</div>
<table class="mytable" width="80%">
	<tr>
		<th>销售日期</th>
		<th>销售成本</th>
		<th>销售金额</th>
		<th>利润</th>
	</tr>	
	<?php
	foreach($list as$v):
	?>
	<tr class="tr_center">
		<td><?php echo $v['insert_date'];?></td>
		<td><?php echo $v['costs'];?></td>
		<td><?php echo $v['sale_price'];?></td>
		<td><?php echo $v['profits'];?></td>
	
	</tr>
	<?php endforeach;?>	
</table>

<div class="margin_25 center"><?php echo $page_link; ?></div>