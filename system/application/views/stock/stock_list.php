<?php
$attr  = array('method'=>'get');
echo form_open("stock/stock_list",$attr);?>
<table  align="center" class="table_search" >
<tr>
	<td>
	产品：
	</td>
	<td>
	<input type="text" name="product_name"  value="<?php echo set_value(null,$_GET['product_name']); ?>"/>
	</td>
	<td>
	真实名称：
	</td>
	<td>
	<input type="text" name="product_real_name" value="<?php echo set_value(null,$_GET['product_real_name']); ?>"  />
	</td>
	<td>
	日期：
	</td>
	<td>
	<input type="text" name="insert_date"  class="datepicker"   value="<?php echo set_value(null,$_GET['insert_date']); ?>">
	</td>
	<td>
		<?php echo form_submit("submit","查询"); ?>
	</td>
</tr>
</table>
<?php echo  form_close();?>
<div class="mytheme1" align="left" >进货列表</div>

<table class="mytable">
	<tr>
		<th>日期</th>
		<th>件数</th>
		<th>金额</th>
		<th>备注</th>
		<th>操作</th>
	</tr>
	<?php foreach($list as  $k=>$v):?>
	<tr class="tr_center">
		<td><?php echo $v['insert_date'];?></td>
		<td><?php echo $v['p_count'];?></td>
		<td><?php echo $v['price'];?></td>
		<td><?php echo $v['remarks'];?></td>		
		<td>
		<?php echo anchor_popup("stock/stock_view/".$v['main_id'],"查看");?>
		<?php echo anchor("stock/stock_add/".$v['main_id'],"修改");?>
		<a href="<?php echo site_url("stock/stock_delete/".$v['main_id']); ?>" onclick="return confirm('确定删除?');">
			删除
		</a>
		</td>
	</tr>	
	<?php endforeach;?>
</table>
<div class="center margin_25">
	<?php echo $page_link;?>
</div>
