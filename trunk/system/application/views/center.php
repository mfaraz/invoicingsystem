


<script language="javascript">	
	$(document).ready(function(){	
		if($('.easyui-tabs').size()>0){
			$('.easyui-tabs').tabs();	
		}		
	})		
</script>

<div class="easyui-layout" style="width:100%;height:768px;">

<div region="north" title="Easy Sale Helper v1.1" split="true" style="height:100px;padding:10px;">

		<h5>
		<?php
			echo anchor('login/center', '当前版本v1.1,建议使用google浏览器使用本系统，如有商业需要，请联系QQ:150672834', array('title' => '点击返回主菜单'));
		?>
		<h5>

</div>


	<div region="west" split="true" title="菜单" style="width:150px;">
			<div class="easyui-accordion" fit="true" border="false">
				<div title="产品"   icon="icon-product" style="padding:10px;">
					<p>
					<?php  echo anchor('product/product_add', '添加', array('title' => '添加产品','target'=>'__myframe',));?>
					&nbsp;</p>
					<p><?php  echo anchor('product/product_list', '管理', array('title' => '管理产品','target'=>'__myframe',));?>&nbsp;</p>
					
				</div>	
				<div title="采购" selected="true" icon="icon-stock" style="padding:10px;">
					<p><?php  echo anchor('stock/stock_add', '添加', array('title' => '添加进货','target'=>'__myframe',));?>&nbsp;</p>
					<p><?php  echo anchor('stock/stock_list', '列表', array('title' => '进货管理','target'=>'__myframe',));?>&nbsp;</p>
					<p><?php  echo anchor('stock/stat_by_date', '进货按日统计', array('title' => '进货按日统计','target'=>'__myframe',));?>&nbsp;</p>
					<p><?php  echo anchor('stock/stat_by_year', '进货按年统计', array('title' => '进货按年统计','target'=>'__myframe',));?>&nbsp;</p>
				</div>	
				<div title="销售"  icon="icon-sale" style="padding:10px;">
					<p><?php  echo anchor('sale/sale_add', '添加', array('title' => '添加销售','target'=>'__myframe',));?>&nbsp;</p>
					<p><?php  echo anchor('sale/sale_list', '列表', array('title' => '销售管理','target'=>'__myframe',));?>&nbsp;</p>
					<p><?php  echo anchor('sale/stat_by_date', '销售按日统计', array('title' => '销售按日统计','target'=>'__myframe',));?>&nbsp;</p>
					<p><?php  echo anchor('sale/stat_by_year', '销售按年统计', array('title' => '销售按年统计','target'=>'__myframe',));?>&nbsp;</p>
				</div>
				<div title="库存"  icon="icon-storage" style="padding:10px;">
					<p><?php  echo anchor('storage/storage_stat', '统计', array('title' => '统计','target'=>'__myframe',));?>&nbsp;</p>
					<p><?php  echo anchor('storage/storage_detail', '流转明细', array('title' => '流转明细','target'=>'__myframe',));?>&nbsp;</p>		
				</div>
				<div title="利润"  icon="icon-profit" style="padding:10px;">
					<p><?php  echo anchor('profit/stat_by_date', '日统计', array('title' => '日统计','target'=>'__myframe',));?>&nbsp;</p>
					<p><?php  echo anchor('profit/stat_by_year', '年统计', array('title' => '年统计','target'=>'__myframe',));?>&nbsp;</p>
				</div>
				<div title="VIP会员"  icon="icon-uesrs" style="padding:10px;">
					<p><?php  echo anchor('members/member_add', '添加会员', array('title' => '添加会员','target'=>'__myframe',));?>&nbsp;</p>
					<p><?php  echo anchor('members/member_list', '管理会员', array('title' => '管理会员','target'=>'__myframe',));?>&nbsp;</p>
				</div>
				<div title="系统设置"  icon="icon-system" style="padding:10px;">
					<p><?php  echo anchor('system_manage/change_password', '修改密码', array('title' => '修改密码','target'=>'__myframe',));?>&nbsp;</p>
					<p><?php  echo anchor('system_manage/exit_system', '退出系统', array('title' => '退出系统','target'=>'_parent'));?>&nbsp;</p>
				</div>	
			</div>
		</div>
		<div region="center"    title="主窗口" style="background:#ffffff;" border="false" >
				<iframe src="<?php echo site_url("stock/stock_list");?>" name="__myframe" width="100%" height="640" frameborder="0" scrolling="auto"></iframe>
		
		</div>

</div>