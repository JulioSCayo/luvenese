<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb bc-3">
			<li>
				<a href="<?php echo site_url('admin/dashboard');?>">
					<i class="entypo-folder"></i>
					<?php echo get_phrase('dashboard');?>
				</a>
			</li>
			<li><a href="<?php echo site_url('admin/project');?>"><?php echo get_phrase('project_list');?></a></li>
			<li><a href="javascript: void(0)" style="opacity: .5;"><?php echo $project_title;?></a></li>
		</ol>
	</div>
</div>
<div class="row">

	<div class="col-md-2">

		<a style="text-align: left;" href="<?php echo site_url('admin/projectroom/dashboard/' . $project_code);?>" 
			class="<?php if ($room_page == 'project_dashboard') 
					echo 'btn btn-primary';
				else 
					echo 'btn btn-default';?> btn-block btn-icon icon-left">
			<?php echo get_phrase('dashboard');?>
			<i class="entypo-gauge"></i>
		</a>

		<a style="text-align: left;" href="<?php echo site_url('admin/projectroom/overview/' . $project_code);?>" 
			class="<?php if ($room_page == 'project_overview') 
								echo 'btn btn-primary';
							else 
								echo 'btn btn-default';?> btn-block btn-icon icon-left">
			<?php echo get_phrase('overview');?>
			<i class="entypo-info"></i>
		</a>
		
		<a style="text-align: left;" href="<?php echo site_url('admin/projectroom/wall/' . $project_code);?>" 
			class="<?php if ($room_page == 'project_wall') 
								echo 'btn btn-primary';
							else 
								echo 'btn btn-default';?> btn-block btn-icon icon-left">
			<?php echo get_phrase('wall');?>
			<i class="entypo-chat"></i>
		</a>

		<a style="text-align: left;" href="<?php echo site_url('admin/projectroom/file/' . $project_code);?>" 
			class="<?php if ($room_page == 'project_file') 
								echo 'btn btn-primary';
							else 
								echo 'btn btn-default';?> btn-block btn-icon icon-left">
			<?php echo get_phrase('files');?>
			<i class="entypo-attach"></i>
		</a>
                <a style="text-align: left;" href="<?php echo site_url('admin/projectroom/task/' . $project_code);?>" 
			class="<?php if ($room_page == 'project_task') 
								echo 'btn btn-primary';
							else 
								echo 'btn btn-default';?> btn-block btn-icon icon-left">
			<?php echo get_phrase('tasks');?>
			<i class="entypo-flow-tree"></i>
		</a>

		<a style="text-align: left;" href="<?php echo site_url('admin/projectroom/bug/' . $project_code);?>" 
			class="<?php if ($room_page == 'project_bug') 
								echo 'btn btn-primary';
							else 
								echo 'btn btn-default';?> btn-block btn-icon icon-left">
			<?php echo get_phrase('bugs/Issues');?>
			<i class="entypo-feather"></i>
		</a>

		<a style="text-align: left;" href="<?php echo site_url('admin/projectroom/timesheet/' . $project_code);?>" 
			class="<?php if ($room_page == 'project_timesheet') 
								echo 'btn btn-primary';
							else 
								echo 'btn btn-default';?> btn-block btn-icon icon-left">
			<?php echo get_phrase('timesheet');?>
			<i class="entypo-clock"></i>
		</a>

		<a style="text-align: left;" href="<?php echo site_url('admin/projectroom/payment/' . $project_code);?>" 
			class="<?php if ($room_page == 'project_payment') 
								echo 'btn btn-primary';
							else 
								echo 'btn btn-default';?> btn-block btn-icon icon-left">
			<?php echo get_phrase('payment');?>
			<i class="entypo-credit-card"></i>
		</a>

		<a style="text-align: left;" href="<?php echo site_url('admin/projectroom/note/' . $project_code);?>" 
			class="<?php if ($room_page == 'project_note') 
								echo 'btn btn-primary';
							else 
								echo 'btn btn-default';?> btn-block btn-icon icon-left">
			<?php echo get_phrase('note');?>
			<i class="entypo-doc-text-inv"></i>
		</a>
            <a style="text-align: left;" href="<?php echo site_url('admin/projectroom/expense/' . $project_code);?>" 
			class="<?php if ($room_page == 'project_expense') 
								echo 'btn btn-primary';
							else 
								echo 'btn btn-default';?> btn-block btn-icon icon-left">
			<?php echo get_phrase('expense');?>
			<i class="entypo-tag"></i>
	    </a>


        <a style="text-align: left;" href="<?php echo site_url('admin/projectroom/edit/' . $project_code);?>" 
			class="<?php if ($room_page == 'project_edit') 
								echo 'btn btn-primary';
							else 
								echo 'btn btn-info';?> btn-block btn-icon icon-left">
			<?php echo get_phrase('edit_this_project');?>
			<i class="entypo-pencil"></i>
		</a>

	</div>

	<div class="main_data">
		
		<?php include $room_page . '.php';?>

	</div>

</div>