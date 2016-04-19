<div role="main" class="ui-content">
	<?php
	//var_dump($rsp_list);
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