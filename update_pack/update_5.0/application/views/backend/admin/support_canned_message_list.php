<div class="panel panel-primary" id="charts_env">
	<div class="panel-heading">
		<div class="panel-title">
			<i class="entypo-chart-bar"></i>
			<?php echo get_phrase('');?>
		</div>
	</div>
	<div class="panel-body" >
		<div class="tabs-horizontal-env">
		
			<ul class="nav tabs-vertical" style="width:30%;"><!-- available classes "right-aligned" -->

				<?php 
				$canned_message	=	$this->db->get('support_canned_message')->result_array();
				foreach ($canned_message as $row):
					?>
					<li class="<?php if ($row['support_canned_message_id'] == $current_canned_message_id)echo 'active';?>"><a href="#tab<?php echo $row['support_canned_message_id'];?>"
						data-toggle="tab">
							<i class="entypo-right-dir"></i>
							<?php echo get_phrase($row['title']);?>
								</a></li>
				<?php endforeach;?>
			</ul>
			
			<div class="tab-content" style="width:70%;">

				<?php
				foreach ($canned_message as $row):
					?>
					
					<div class="tab-pane <?php if ($row['support_canned_message_id'] == $current_canned_message_id)echo 'active';?>" 
						id="tab<?php echo $row['support_canned_message_id'];?>">
						<?php echo form_open(site_url('admin/support_canned_message/do_update/' . $row['support_canned_message_id']));?>
							<b><?php echo get_phrase('title');?> :</b>
							<input type="text" class="form-control" name="title" value="<?php echo $row['title'];?>">

							<hr>

							<b><?php echo get_phrase('description');?> :</b>
							<textarea class="form-control email_template_editors" rows="10" name="description" id="post_content<?php echo $row['support_canned_message_id'];?>" 
	                            data-stylesheet-url="<?php echo base_url('assets/css/wysihtml5-color.css');?>"><?php echo $row['description'];?></textarea>
	                		<br>
	                        
	                        <hr>
	                        <center>
		                        <button type="submit" class="btn btn-info btn-icon icon-left">
									<?php echo get_phrase('update');?>
									<i class="entypo-floppy"></i>
								</button>
							</center>
						<?php echo form_close();?>
					</div>
					
				<?php endforeach;?>
			</div>
			
		</div>	
	
	</div>
</div>



