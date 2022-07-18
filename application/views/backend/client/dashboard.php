
<div class="row" style=" margin:100px 0px 200px;">

	<div class="col-md-6" style="text-align:center;">
    	<img src="<?php echo $this->crud_model->get_image_url($this->session->userdata('login_type') ,
							$this->session->userdata('login_user_id'));?>" alt="" class="img-circle" style="height:60px;">
    	<h1 style="font-weight:100;margin:0px;">
    		<?php echo $this->db->get_where($this->session->userdata('login_type'),
											array( 		$this->session->userdata('login_type').'_id' =>
														$this->session->userdata('login_user_id')))->row()->name;?>
    	</h1>
	</div>

	<div class="col-md-6" style="text-align:center;">

	        <a type="button" class="btn btn-default btn-icon icon-left col-md-5 col-xs-12"  style="margin:5px;"
				href="<?php echo site_url('client/project');?>">
	        		<?php echo get_phrase('projects');?>
	        			<i class="entypo-paper-plane"></i>
	        </a>



	        <a type="button" class="btn btn-default btn-icon icon-left col-md-5 col-xs-12"  style="margin:5px;"
				href="<?php echo site_url('client/payment_history');?>">
	        		<?php echo get_phrase('payment_history');?>
	        			<i class="entypo-credit-card"></i>
	        </a>

	        <a type="button" class="btn btn-default btn-icon icon-left col-md-5 col-xs-12"  style="margin:5px;"
				href="<?php echo site_url('client/project_quote');?>">
	        		<?php echo get_phrase('submit_project_quote');?>
	        			<i class="entypo-plus"></i>
	        </a>

	        <a type="button" class="btn btn-default btn-icon icon-left col-md-5 col-xs-12"  style="margin:5px;"
				href="<?php echo site_url('client/support_ticket_create');?>">
	        		<?php echo get_phrase('submit_support_ticket');?>
	        			<i class="entypo-lifebuoy"></i>
	        </a>


	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="glyphicon glyphicon-bullhorn"></i> &nbsp; <b><?php echo get_phrase('noticeboard'); ?></b>
				</div>
			</div>
			<div class="panel-body with-table">
				<table class="table table-responsive">
					<thead>
						<tr>
							<th><?php echo get_phrase('notice'); ?></th>
							<th><?php echo get_phrase('published_by'); ?></th>
							<th><?php echo get_phrase('date_added'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php
							$this->db->order_by('date_added', 'DESC');
							$this->db->where('visible_for', 3);
							$this->db->or_where('visible_for', 1);
							$this->db->limit(4);
							$notices = $this->db->get('notice')->result_array();
							foreach ($notices as $row):
						?>
						<tr>
							<td>
								<a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/notice_view/' . $row['notice_id']);?>');">
									<?php echo $row['title']; ?>
								</a>
							</td>
							<td><?php echo $this->db->get_where('admin', array('admin_id' => $row['published_by']))->row()->name;?></td>
							<td><?php echo date('jS F Y' , $row['date_added']);?></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>

	</div>
</div>
