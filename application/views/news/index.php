<div role="main" class="ui-content">
	<?php
		$attributes = array('method' => 'get', 'name' => 'mainform', 'id' => 'mainform');
		$hidden = array('lang_set' => $lang_set);
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