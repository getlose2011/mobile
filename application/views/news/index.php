<!-- left panel start -->
<div data-role="panel" data-display="push" data-position="left" data-theme="a" id="catalog" class="ui-panel ui-panel-position-left ui-panel-display-push ui-body-b ui-panel-animate ui-panel-open">
	<div class="ui-panel-inner">
		<ul data-role="listview">
			<li data-icon="delete">
				<a href="#" data-rel="close">
					<?php echo $this->lang->line('close_panel');?>
				</a>
			</li>
    	</ul>
	</div>
</div>
<!-- left panel end-->

<!-- right panel start -->
<div data-role="panel" id="sub_catalog" data-position="right" data-display="push" data-theme="d" class="ui-panel ui-panel-position-right ui-panel-display-push ui-body-b ui-panel-animate ui-panel-closed">
	<div class="ui-panel-inner">
		<ul data-role="listview">
			<!--固定-->
		    <li data-icon="delete">
		    	<a href="#" data-rel="close">
		    		<?php echo $this->lang->line('close_panel');?>
		    	</a>
		    </li>
		    <?php
		    	foreach($rsp_menu_list as $mkey => $mdata)
				{
			?>
		    		<li>
		    			<a class="ui-btn-active" href="javascript:link_para('cat', <?php echo $rsp_menu_list[$mkey]['csn'];?>);">
		    				<?php echo $rsp_menu_list[$mkey]['cname'];?>
		    			</a>
		    		</li>
		    <?php
		    	}
		    ?>
		</ul>
	</div>
</div>
<!-- right panel end-->

<div role="main" class="ui-content">
	<?php
		$attributes = array('method' => 'get', 'name' => 'mainform', 'id' => 'mainform');
		$hidden = array('lang_set' => $lang_set);
		if(!empty($cat))$hidden['cat'] = $cat;
		echo form_open('News/index/', $attributes, $hidden);
		foreach($rsp_list as $key => $data)
		{
	?>
			
			<div data-role="collapsible">
				<h4><?php echo $rsp_list[$key]['title'];?></h4>
				<p><?php echo $rsp_list[$key]['text'];?></p>
			</div>
	<?php
		}
	?>	
</div><!-- /content -->