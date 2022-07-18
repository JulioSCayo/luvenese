<div class="panel panel-primary" id="charts_env">
	<div class="panel-heading">
		<div class="panel-title">
			<i class="fa fa-list"></i>
			<?php echo get_phrase('project_list');?>
		</div>
	</div>
	<div class="panel-body" >
		
		<ul class="nav nav-tabs bordered"><!-- available classes "bordered", "right-aligned" -->
			<li class="active">
				<a href="#running" data-toggle="tab">
					<span><i class="entypo-home"></i>
					<?php echo get_phrase('running');?></span>
				</a>
			</li>
			<li class="">
				<a href="#archived" data-toggle="tab">
					<span><i class="entypo-archive"></i>
					<?php echo get_phrase('archived');?></span>
				</a>
			</li>
		</ul>
		
		<div class="tab-content">
			<div class="tab-pane active" id="running">
				
				<?php include 'running_project.php';?>
				
			</div>
			<div class="tab-pane" id="archived">
				
				<?php include 'archived_project.php';?>
					
			</div>
		</div>
		
		
	</div>

</div>