<a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('modal/popup/client_add');?>');" 
    class="btn btn-primary pull-right btn-adding">
        <i class="entypo-user-add"></i>
        <?php echo get_phrase('add_new_client');?>
    </a>



<div class="row">

	<div class="col-md-12">
			
		<!-- <ul class="nav nav-tabs bordered">
			<li class="<?php if ($page_name == 'client') echo 'active';?>">
				<a href="<?php echo site_url('staff/client');?>">
					<span class="visible-xs"><i class="entypo-users"></i></span>
					<span class="hidden-xs"><?php echo get_phrase('clients');?></span>
				</a>
			</li>
			<li class="<?php if ($page_name == 'pending_client') echo 'active';?>">
				<a href="<?php echo site_url('staff/pending_client');?>">
					<span class="visible-xs"><i class="entypo-bell"></i></span>
					<span class="hidden-xs"><?php echo get_phrase('pending_clients');?></span>
				</a>
			</li>
		</ul> -->
		
		<br><br>

			<div class="tab-pane <?php if ($page_name == 'client') echo 'active';?>" id="">
				
				
				<div class="main_data">
					<?php include 'client_list.php';?>
				</div>

			</div>


			
			
	</div>

</div>