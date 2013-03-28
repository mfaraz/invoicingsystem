
<center>
<div region="north" title="Easy Sale Helper v1.1" split="true" style="height:50px;padding:10px;">
		<image src="<?php echo base_url();?>/images/logo.gif" >
</div>
<div  class="easyui-tabs" style="width:1000px;">
		<div title="产品" closable="false" icon="icon-product" style="padding:10px;display:none;">
			<ul>
				<li>
				<?php  echo anchor('product/product_add?TB_iframe=true&height=400&width=800', '添加', array('class'=>'thickbox','title' => '添加产品','target'=>'__myframe',));?>
				&nbsp;</li>
				<li><?php  echo anchor('product/product_list?TB_iframe=true&height=400&width=800', '管理', array('class'=>'thickbox','title' => '管理产品','target'=>'__myframe',));?>&nbsp;</li>
			
			</ul>
		</div>	
		<div title="采购" closable="false" icon="icon-stock" style="padding:10px;display:none;">
			<ul>
				<li><?php  echo anchor('stock/stock_add?TB_iframe=true&height=400&width=800', '添加', array('class'=>'thickbox','title' => '添加进货','target'=>'__myframe',));?>&nbsp;</li>
				<li><?php  echo anchor('stock/stock_list?TB_iframe=true&height=400&width=800', '列表', array('class'=>'thickbox','title' => '进货管理','target'=>'__myframe',));?>&nbsp;</li>
				<li><?php  echo anchor('stock/stat_by_date?TB_iframe=true&height=400&width=800', '进货按日统计', array('class'=>'thickbox','title' => '进货按日统计','target'=>'__myframe',));?>&nbsp;</li>
				<li><?php  echo anchor('stock/stat_by_year?TB_iframe=true&height=400&width=800', '进货按年统计', array('class'=>'thickbox','title' => '进货按年统计','target'=>'__myframe',));?>&nbsp;</li>
			</ul>
		</div>	
		<div title="销售" closable="false" icon="icon-sale" style="padding:10px;display:none;">
			<ul>
				<li><?php  echo anchor('sale/sale_add?TB_iframe=true&height=400&width=800', '添加', array('class'=>'thickbox','title' => '添加销售','target'=>'__myframe',));?>&nbsp;</li>
				<li><?php  echo anchor('sale/sale_list?TB_iframe=true&height=400&width=800', '列表', array('class'=>'thickbox','title' => '销售管理','target'=>'__myframe',));?>&nbsp;</li>
				<li><?php  echo anchor('sale/stat_by_date?TB_iframe=true&height=400&width=800', '销售按日统计', array('class'=>'thickbox','title' => '销售按日统计','target'=>'__myframe',));?>&nbsp;</li>
				<li><?php  echo anchor('sale/stat_by_year?TB_iframe=true&height=400&width=800', '销售按年统计', array('class'=>'thickbox','title' => '销售按年统计','target'=>'__myframe',));?>&nbsp;</li>
			</ul>
		</div>
		<div title="库存" closable="false" icon="icon-storage" style="padding:10px;display:none;">
			<ul>
				<li><?php  echo anchor('storage/storage_stat?TB_iframe=true&height=400&width=800', '统计', array('class'=>'thickbox','title' => '统计','target'=>'__myframe',));?>&nbsp;</li>
				<li><?php  echo anchor('storage/storage_detail?TB_iframe=true&height=400&width=800', '流转明细', array('class'=>'thickbox','title' => '流转明细','target'=>'__myframe',));?>&nbsp;</li>		
			</ul>	
		</div>
		<div title="利润" closable="false" icon="icon-profit" style="padding:10px;display:none;">

			<ul>
				<li><?php  echo anchor('profit/other_cost_add?TB_iframe=true&height=400&width=800', '添加其他成本', array('class'=>'thickbox','title' => '添加其他成本','target'=>'__myframe',));?>&nbsp;</li>
				<li><?php  echo anchor('profit/other_cost?TB_iframe=true&height=400&width=800', '其他成本列表', array('class'=>'thickbox','title' => '其他成本列表','target'=>'__myframe',));?>&nbsp;</li>
				<li><?php  echo anchor('profit/stat_by_date?TB_iframe=true&height=400&width=800', '日统计', array('class'=>'thickbox','title' => '日统计','target'=>'__myframe',));?>&nbsp;</li>
				<li><?php  echo anchor('profit/stat_by_year?TB_iframe=true&height=400&width=800', '年统计', array('class'=>'thickbox','title' => '年统计','target'=>'__myframe',));?>&nbsp;</li>
			</ul>
		</div>
		
		<div title="VIP会员" closable="false" icon="icon-uesrs" style="padding:10px;display:none;">
			<ul>
				<li><?php  echo anchor('members/member_add?TB_iframe=true&height=400&width=800', '添加会员', array('class'=>'thickbox','title' => '添加会员','target'=>'__myframe',));?>&nbsp;</li>
				<li><?php  echo anchor('members/member_list?TB_iframe=true&height=400&width=800', '管理会员', array('class'=>'thickbox','title' => '管理会员','target'=>'__myframe',));?>&nbsp;</li>
			</ul>
		</div>
		
		<div title="系统设置" closable="false" icon="icon-system" style="padding:10px;display:none;">
			<ul>
				<li><?php  echo anchor('system_manage/change_password?TB_iframe=true&height=400&width=800', '修改密码', array('class'=>'thickbox','title' => '修改密码','target'=>'__myframe',));?>&nbsp;</li>
				<li><?php  echo anchor('system_manage/exit_system?TB_iframe=true&height=400&width=800', '退出系统', array('class'=>'thickbox','title' => '退出系统','target'=>'parent'));?>&nbsp;</li>
			</ul>
		</div>
		
</div>	
<div style="height:50px;padding-top:20px;color:#cccccc">版权所有@conqweal 2010-2013 version 1.2</div>

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
	
	//open dialog
	function openDialog(url){
		
		reval  = "";
		reval += "<iframe id=\"__myframe\" src=\""+url+"\" name=\"__myframe\" width=\"100%\" height=\"600\" frameborder=\"0\" scrolling=\"auto\"></iframe>";
		
	}
	
	
	
</script>
