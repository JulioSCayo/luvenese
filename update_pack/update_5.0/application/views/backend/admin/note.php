
<!-- NOTE CREATION BUTTON-->
<button type="button" class="btn btn-info pull-right btn-adding" id="submit-button" 
    onclick="create_note()">
    <i class="entypo-plus"></i>
    <?php echo get_phrase('create_note'); ?>
</button>

<div style="clear:both; padding: 5px;"></div>

<div class="row">

	<div class="col-md-12">
		<div class="tabs-vertical-env main_data" style="margin-top: 15px;">
			<?php include 'notes_tab_body.php';?>
		</div>	
	</div>

</div>

<script type="text/javascript">
	function create_note() {
		$.ajax({
        	url: '<?php echo site_url('admin/create_note');?>',
        	success: function(response)
        	{
            

            	// reload the notes
            	reload_data('<?php echo site_url('admin/reload_notes_tab_body/');?>' + response);
	      	}
	    });
	}
</script>