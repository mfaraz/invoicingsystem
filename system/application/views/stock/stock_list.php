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
    	echo anchor('stock/stock_add', '添加进货', array('icon' => 'icon-add','class'=>'easyui-linkbutton'));
    ?>
</div>
<div align="center" class="margin_25" width="80%">
	<div class="mytheme1" align="left" >进货列表</div>
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
		<?php echo anchor_popup("stock/stock_view/".$v['main_id'],"查看");?>
		<?php echo anchor("stock/stock_add/".$v['main_id'],"修改");?>
		<?php
			$atts = array('onclick'=>'confirm("确定删除?");');
			 echo anchor("stock/stock_delete/".$v['main_id'],"删除",$atts);?>
		
		</td>
	</tr>	
	<?php endforeach;?>
</table>
<div class="center margin_25">
	<?php echo $page_link;?>
</div>
