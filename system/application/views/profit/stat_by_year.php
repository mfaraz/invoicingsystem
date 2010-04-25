<div class="mytheme1" align="left" >利润年统计</div>
<table class="mytable" width="80%">
	<tr>
		<th>月份</th>
		<th>销售金额</th>
		<th>销售成本</th>		
		<th>其他成本</th>		
		<th>利润</th>
	</tr>	
	<?php
	foreach($list as$v):
	?>
	<tr class="tr_center">
		<td><?php echo $v['year_month_string'];?></td>
		<td><?php echo $v['sale_price'];?></td>
		<td><?php echo $v['costs'];?></td>		
		<td><?php echo $v['other_cost'];?></td>		
		<td><?php echo $v['profits'];?></td>
	
	</tr>
	<?php endforeach;?>	
</table>

<div class="margin_25 center"><?php echo $page_link; ?></div>