<?php
/*
 * Created on 2010-4-13
 *
 * To change tde template for tdis generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 $attributes = array('id' => 'form1'); 
 echo form_open("product/product_batch",$attributes);
?>

<div id="parent"  style="text-align:right;padding-right:10%;margin-bottom:10px;">

    <?php    
    	echo anchor('product/product_add', '添加产品', array('icon' => 'icon-add','class'=>'easyui-linkbutton'));
    ?>
</div>
<div align="center" class="margin_25" width="80%">
	<div class="mytheme1" align="left" >产品列表</div>
</div>
<table align="center" width="80%" class="mytable">
	<tr>
	<th>产品</th><th>真实名称</th><th>价格</th><th>备注</th>
	<th>添加时间</th><th>修改时间</th>
	<th width="200" >
	<input type="checkbox" id="check_all"  >
	全选
	<button id="btn_update" op_type="update" class="sexybutton sexyorange"><span><span>修改</span></span></button>
	<button id="btn_delete" op_type="delete"  class="sexybutton sexyorange"><span><span>删除</span></span></button>
	</th>
	</tr>
	
	<?php 
	
		foreach($list as $k=>$v):
	?>	
	<tr><td><?php echo $v['product_name'];?></td>
	<td><?php echo $v['product_real_name'];?></td>
	<td><?php echo $v['product_price'];?></td>
	<td><?php echo $v['product_remarks'];?></td>
	<td><?php echo $v['insert_time'];?></td>
	<td><?php echo $v['last_update_time'];?></td>

	
	<td class="center">
		<?php	
		 $input_data = array(
		 	"name"=>"ids[]",
		 	"id"=>"ids",
		 	"value"=>$v['product_id'],
		 	"checked"=>0,
		 );	
		echo form_checkbox($input_data);
		?>
	
	</td>
	
	
	
	</tr>
	<?php
		endforeach;	
	?>

</table>
<input type="hidden" id="op_type" name="op_type" value="" >
<?php
	echo form_close();
?>
<center class="margin_25">
	 <?php echo $page_link;?>
</center>
<div id="dialog" icon="icon-save" class="hide"  style="padding:5px;width:400px;height:100px;"> 
		对不起，您还没有选择操作对象！
</div> 

