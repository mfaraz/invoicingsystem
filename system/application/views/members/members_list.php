
<div id="parent"  style="text-align:right;padding-right:10%;margin-bottom:10px;">

    <?php    
    	echo anchor('members/member_add', '添加会员', array('icon' => 'icon-add','class'=>'easyui-linkbutton'));
    ?>
</div>
<div align="center" class="margin_25" width="80%">
	<div class="mytheme1" align="left" >会员管理</div>
</div>
<table class="mytable">
	<tr>
		<th>姓名</th>
		<th>性别</th>
		<th>手机</th>
		<th>QQ</th>
		<th>备注</th>
		<th>操作</th>
	</tr>
	<?php foreach($list as $v):?>
	<tr class="tr_center">
		<td><?php echo $v['member_name']; ?></td>
		<td><?php echo $v['sex_str']; ?></td>
		<td><?php echo $v['mobile']; ?></td>
		<td><?php echo $v['qq']; ?></td>
		<td><?php echo $v['remarks']; ?></td>
		<td>
			<?php echo anchor('members/member_add/'.$v['member_id'],'修改'); ?>
			<a href="<?php echo site_url("members/member_delete/".$v['member_id']."");?>" onclick="return confirm('确认删除?');">删除</a>
			
		</td>
	
	</tr>
	<?php endforeach;?>
</table>
<div class="margin_25 center">
	<?php echo $page_link;?>
</div>