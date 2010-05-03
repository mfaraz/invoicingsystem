<div class="mytheme1" align="left" >其他成本</div>
<table class="mytable">
<tr>
	<th>日期</th>
	<th>总金额</th>	
	<th width="100">操作</th>
</tr>
<?php foreach($list as $k=>$v):?>
<tr class="tr_center">
	<td><?php echo $v['insert_date'];?></td>
	<td><?php echo $v['price'];?></td>
	<td>
	<?php 
			$attrs = array(
				'class'=>'link_view',
			);
			echo anchor_popup("profit/other_cost_view/".$v['main_id'],"&nbsp;",$attrs);
			
			$attrs = array(
				'class'=>'link_mod',
			);
			echo anchor("profit/other_cost_add/".$v['main_id'],"&nbsp;",$attrs);
		?>
		<a href="<?php echo site_url("profit/other_cost_delete/".$v['main_id']); ?>" onclick="return confirm('确定删除?');" class="link_del">
			&nbsp;
		</a>
	
	</td>
</tr>
<?php endforeach;?>
</table>
<div class="center margin_25"><?php echo $page_link;?></div>