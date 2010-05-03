<center>其他成本明细</center>
<div class="right width_pct_80 center margin_25 " >
		日期：<?php echo $main["insert_date"];?>
		
		
</div>	
<table class="mytable" >
<tr>
	<th>金额</th>
	<th>备注</th>
</tr>

<?foreach($detail as $k=>$v):?>
<tr class="tr_center">

	<td>
		<?php echo $v['price'];?>
	</td>
	<td>
		<?php echo $v['remarks'];?>
	</td>
	 
</tr>
<?php 
	endforeach;
?>
</table>
<div class="margin_25 center">
	<a href="javascript:window.close();">[关闭]</a>
</div>

