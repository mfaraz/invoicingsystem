<?php
/*
 * Created on 2010-4-13
 *
 * To change tde template for tdis generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 $attributes = array('id' => 'form1'); 
 echo form_open("product/product_delete");
?>

<div id="parent"  style="color:#ff0000;padding-left:10%;text-align:left;margin-bottom:10px;">
	你选择了删除以下产品：   
</div>
<table align="center" width="80%" class="mytable">
	<tr><th>产品名称</th><th>价格</th><th>备注</th>
	
	
	</tr>
	
	<?php 
	
		foreach($detail as $k=>$v):
	?>	
	<tr><td><?php echo $v['product_name'];?></td>
	<td><?php echo $v['product_price'];?></td>
	<td><?php echo $v['product_remarks'];?></td>

	
	<?php 	
		echo form_hidden("ids[]", $v["product_id"]);	
	?>
	</td>

	
	
	
	</tr>
	<?php
		endforeach;	
	?>

</table>

	<center class="margin_25">
		
		<?php
			echo form_submit("submit","确认并删除");
			echo anchor('product/product_list', '<span><span>返回</span></span>', array('class' => 'sexybutton sexyorange'));
			
		?>
		
	</center>
<?php
	echo form_close();
?>
