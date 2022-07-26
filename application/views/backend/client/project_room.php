<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb bc-3">
			<li>
				<a href="<?php echo site_url('client/dashboard');?>">
					<i class="entypo-folder"></i>
					<?php echo get_phrase('dashboard');?>
				</a>
			</li>
			<li><a href="<?php echo site_url('client/project');?>"><?php echo get_phrase('project_list');?></a></li>
		</ol>
	</div>
</div>
<div class="row">

	<div class="col-md-3">

		<a style="text-align: left;" href="<?php echo site_url('client/projectroom/overview/' . $project_code);?>" 
			class="<?php if ($room_page == 'project_overview') 
								echo 'btn btn-primary';
							else 
								echo 'btn btn-default';?> btn-block btn-icon icon-left">
			<?php echo get_phrase('overview');?>
			<i class="entypo-info"></i>
		</a>
		
		<a style="text-align: left;" href="<?php echo site_url('client/projectroom/wall/' . $project_code);?>" 
			class="<?php if ($room_page == 'project_wall') 
								echo 'btn btn-primary';
							else 
								echo 'btn btn-default';?> btn-block btn-icon icon-left">
			<?php echo get_phrase('wall');?>
			<i class="entypo-chat"></i>
		</a>

		<a style="text-align: left;" href="<?php echo site_url('client/projectroom/file/' . $project_code);?>" 
			class="<?php if ($room_page == 'project_file') 
								echo 'btn btn-primary';
							else 
								echo 'btn btn-default';?> btn-block btn-icon icon-left">
			<?php echo get_phrase('files');?>
			<i class="entypo-attach"></i>
		</a>
                
            <a style="text-align: left;" href="<?php echo site_url('client/projectroom/bug/' . $project_code);?>" 
			class="<?php if ($room_page == 'project_bug') 
								echo 'btn btn-primary';
							else 
								echo 'btn btn-default';?> btn-block btn-icon icon-left">
			<?php echo get_phrase('bugs/Issues');?>
			<i class="entypo-feather"></i>
		</a>
		<a style="text-align: left;" href="<?php echo site_url('client/projectroom/timesheet/' . $project_code);?>" 
			class="<?php if ($room_page == 'project_timesheet') 
								echo 'btn btn-primary';
							else 
								echo 'btn btn-default';?> btn-block btn-icon icon-left">
			<?php echo get_phrase('timesheet');?>
			<i class="entypo-clock"></i>
		</a>

		<a style="text-align: left;" href="<?php echo site_url('client/projectroom/payment/' . $project_code);?>" 
			class="<?php if ($room_page == 'project_payment') 
								echo 'btn btn-primary';
							else 
								echo 'btn btn-default';?> btn-block btn-icon icon-left">
			<?php echo get_phrase('payment');?>
			<i class="entypo-credit-card"></i>
		</a>

	</div>

	<div class="main_data">
		
		<?php include $room_page . '.php';?>

	</div>

</div>