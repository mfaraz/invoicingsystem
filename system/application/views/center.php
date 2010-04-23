<center>
<div  class="easyui-tabs" style="width:1000px;">
		<div title="产品" closable="false" icon="icon-product" style="padding:10px;display:none;">
			<ul>
				<li>
				<?php  echo anchor('product/product_add', '添加', array('title' => '添加产品','target'=>'__myframe',));?>
				&nbsp;</li>
				<li><?php  echo anchor('product/product_list', '管理', array('title' => '管理产品','target'=>'__myframe',));?>&nbsp;</li>
			
			</ul>
		</div>	
		<div title="采购" closable="false" icon="icon-stock" style="padding:10px;display:none;">
			<ul>
				<li><?php  echo anchor('stock/stock_add', '添加', array('title' => '添加进货','target'=>'__myframe',));?>&nbsp;</li>
				<li><?php  echo anchor('stock/stock_list', '列表', array('title' => '进货管理','target'=>'__myframe',));?>&nbsp;</li>
				<li><?php  echo anchor('stock/stat_by_date', '进货按日统计', array('title' => '进货按日统计','target'=>'__myframe',));?>&nbsp;</li>
				<li><?php  echo anchor('stock/stat_by_year', '进货按年统计', array('title' => '进货按年统计','target'=>'__myframe',));?>&nbsp;</li>
			</ul>
		</div>	
		<div title="销售" closable="false" icon="icon-sale" style="padding:10px;display:none;">
			<ul>
				<li><?php  echo anchor('sale/sale_add', '添加', array('title' => '添加销售','target'=>'__myframe',));?>&nbsp;</li>
				<li><?php  echo anchor('sale/sale_list', '列表', array('title' => '销售管理','target'=>'__myframe',));?>&nbsp;</li>
				<li><?php  echo anchor('sale/stat_by_date', '销售按日统计', array('title' => '销售按日统计','target'=>'__myframe',));?>&nbsp;</li>
				<li><?php  echo anchor('sale/stat_by_year', '销售按年统计', array('title' => '销售按年统计','target'=>'__myframe',));?>&nbsp;</li>
			</ul>
		</div>
		<div title="库存" closable="false" icon="icon-storage" style="padding:10px;display:none;">
			<ul>
				<li><?php  echo anchor('storage/storage_stat', '统计', array('title' => '统计','target'=>'__myframe',));?>&nbsp;</li>
				<li><?php  echo anchor('storage/storage_detail', '流转明细', array('title' => '流转明细','target'=>'__myframe',));?>&nbsp;</li>		
			</ul>	
		</div>
		<div title="利润" closable="false" icon="icon-profit" style="padding:10px;display:none;">
			<ul>
				<li><?php  echo anchor('profit/stat_by_date', '日统计', array('title' => '日统计','target'=>'__myframe',));?>&nbsp;</li>
				<li><?php  echo anchor('profit/stat_by_year', '年统计', array('title' => '年统计','target'=>'__myframe',));?>&nbsp;</li>
			</ul>
		</div>
		
		<div title="VIP会员" closable="false" icon="icon-uesrs" style="padding:10px;display:none;">
			<ul>
				<li><?php  echo anchor('members/member_add', '添加会员', array('title' => '添加会员','target'=>'__myframe',));?>&nbsp;</li>
				<li><?php  echo anchor('members/member_list', '管理会员', array('title' => '管理会员','target'=>'__myframe',));?>&nbsp;</li>
			</ul>
		</div>
		
		<div title="系统设置" closable="false" icon="icon-system" style="padding:10px;display:none;">
			<ul>
				<li><?php  echo anchor('system_manage/change_password', '修改密码', array('title' => '修改密码','target'=>'__myframe',));?>&nbsp;</li>
				<li><?php  echo anchor('system_manage/exit_system', '退出系统', array('title' => '退出系统','target'=>'parent'));?>&nbsp;</li>
			</ul>
		</div>
		
</div>	

</center>


<script language="javascript">	
	$(document).ready(function(){	
		$('.easyui-tabs').tabs();	
		$.messager.show({
					title:'温馨提示',
					msg:'您已成功登陆本系统.现在时间：<?php echo date('m/d H:i:s');?>',
					timeout:5000,
					showType:'slide'
				});
		
		
	})	
	
</script>
<iframe src="" name="__myframe" width="100%" height="600" frameborder="0" scrolling="auto"></iframe>