		<div data-role="footer">
			<div data-role="header" data-position="inline">
				<?php
					$go_page_pre = ($page == 1)?'':($page-1);
					$go_page_next = ($page == $total_pages)?'':($page+1);
				?>
				<a href="javascript:setPageSubmit(<?php echo $go_page_pre?>);" data-icon="arrow-l" style="<?php echo empty($go_page_pre)?' display: none;':''?>"><?php echo $this->lang->line('page_pre');?></a>
				<a href="javascript:setPageSubmit(<?php echo $go_page_next?>);" data-icon="arrow-r" style="<?php echo empty($go_page_next)?' display: none;':''?>"><?php echo $this->lang->line('page_next');?></a>
			</div>
			<h4>
				
			</h4>
		</div><!-- /footer -->
	</div><!-- /page -->
	<script>
	var total_pages = <?php echo $total_pages?>,
		page = <?php echo $page?>,
		go_page = '';
	$(document).on('pageinit', '#page', function () {

		  $(document).on("swiperight", function () {        //往右滑的動作
		   	 	go_page = (page == 1)?total_pages:(page-1);
		   	 	setPageSubmit(go_page);
		  });

		  $(document).on("swipeleft", function () {         //往左滑的動作
				go_page = (page == total_pages)?1:(page+1);
		  		setPageSubmit(go_page);
		  });

		});
	</script>
</body>
</html>