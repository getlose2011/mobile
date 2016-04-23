<!DOCTYPE html> 
<html>
<head>
	<title><?php echo $this->lang->line('html_title');?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	 <script type="text/javascript" src="<?php echo base_url(); ?>Resource/js/function.js"></script>
</head>
<body>
	<div data-role="page" id="page">
		<div data-role="header">
			<a href="#catalog" data-role="button" data-content-theme="b" class="ui-link ui-btn-left ui-btn ui-btn-a ui-shadow ui-corner-all" role="button">
				<?php echo $this->lang->line('left_menu');?>
			</a>
			<h1><?php echo $this->lang->line('title');?></h1>
			<a href="#sub_catalog" rel="external" data-role="button" data-content-theme="b" class="ui-link ui-btn-right ui-btn ui-btn-a ui-shadow ui-corner-all" role="button">
				<?php echo $this->lang->line('right_menu');?>
			</a>
		</div><!-- /header -->