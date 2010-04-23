<?php
/*
 * Created on 2010-4-15
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 
 
?>

<div id="parent"  style="text-align:right;padding-right:10%;margin-bottom:10px;">

    <?php    
    	echo anchor('sale/sale_add', '添加', array('icon' => 'icon-add','class'=>'easyui-linkbutton'));
    ?>
</div>
<div align="center" class="margin_25" width="80%">
	<div class="mytheme1" align="left" >销售列表</div>
</div>
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
		<?php echo anchor_popup("sale/sale_view/".$v['main_id'],"查看");?>
		<?php echo anchor("sale/sale_add/".$v['main_id'],"修改");?>
		
		<a href="<?php echo site_url("sale/sale_delete/".$v['main_id']); ?>" onclick="return confirm('确定删除?');">
			删除
		</a>
		
		</td>
	</tr>	
	<?php endforeach;?>
</table>
<div class="center margin_25">
	<?php echo $page_link;?>
</div>
