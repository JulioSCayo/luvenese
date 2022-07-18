<a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('modal/popup/influencer_add');?>');" 
    class="btn btn-primary pull-right btn-adding">
        <i class="entypo-user-add"></i>
        <?php echo get_phrase('add_new_influencer');?>
    </a>



<div class="row">

	<div class="col-md-12">
			
		<!-- <ul class="nav nav-tabs bordered">
			<li class="<?php if ($page_name == 'influencer') echo 'active';?>">
				<a href="<?php echo site_url('admin/influencer');?>">
					<span class="visible-xs"><i class="entypo-users"></i></span>
					<span class="hidden-xs"><?php echo get_phrase('influencers');?></span>
				</a>
			</li>
			
		</ul> -->
		
			<br><br>

			<div class="tab-pane <?php if ($page_name == 'influencer') echo 'active';?>" id="">
				
				<div class="main_data ">
					<?php include 'influencer_list.php';?>
				</div>

			</div>			
	</div>

</div>