	<div class="mytheme1" align="left" >库存流转明细</div>
<table class="mytable" width="80%">
	<tr>
		<th>产品</th>	
		<th>日期</th>	
		
		<th>真实名称</th>
	
		
		<th>数量</th>
	</tr>	
	<?php
	foreach($list as $k=>$v):
	foreach($v['detail'] as $k1=>$v1):
	?>
	<tr class="tr_center">	
		<td><?php echo $v1['product_name'];?></td>
		<td><?php echo $v1['insert_date'];?></td>	
		
		<td><?php echo $v1['product_real_name'];?></td>		
		<td><?php echo $v1['org_quantity'];?></td>
	
	</tr>
	<?php	endforeach;?>	
	<tr >		
		<td ></td>
		<td></td>
		<td  class="right"><span class="red_font">合计：</span></td>
		<td class="center"><?php echo $v['stat']?></td>
	
	</tr>
	<?php	endforeach;?>	
</table>

<div class="margin_25 center"><?php echo $page_link; ?></div>