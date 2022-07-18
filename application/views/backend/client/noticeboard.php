<div class="panel panel-primary" id="charts_env">
	<div class="panel-heading">
		<div class="panel-title">
			<i class="fa fa-flag"></i>
			<?php echo get_phrase('notice');?>
		</div>
	</div>
	<div class="panel-body" >
		<table class="table   datatable" id="notice_table">
			<thead>
				<tr>
					<th style="width:30px;"></th>
					<th><div><?php echo get_phrase('title');?></div></th>
					<th><div><?php echo get_phrase('published_by');?></div></th>
					<th><div><?php echo get_phrase('date_added');?></div></th>
					<th><div><?php echo get_phrase('options');?></div></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$counter = 1;
				$this->db->order_by('date_added' , 'desc');
		    $this->db->where('visible_for', 3);
		    $this->db->or_where('visible_for', 1);
				$notices	=	$this->db->get('notice')->result_array();
				foreach($notices as $row):
				?>
				<tr>
					<td style="width:30px;">
		           		<?php echo $counter++;?>
		           	</td>
					<td>
						<a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/notice_view/' . $row['notice_id']);?>');">
							<?php echo $row['title'];?>
						</a>
					</td>
					<td>
						<?php
							if ($row['published_by'] > 0)
								echo $this->db->get_where('admin' , array(
									'admin_id' => $row['published_by']
								))->row()->name;
						?>
					</td>
					<td>
						<?php echo date('jS F Y' , $row['date_added']);?>
					</td>
					<td>
		      	<div class="btn-group">
		              <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
		              	Action <span class="caret"></span>
		              </button>
		              <ul class="dropdown-menu dropdown-default pull-right" role="menu">
		                <li>
		                    <a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/notice_view/' . $row['notice_id']);?>');">
		                        <i class="entypo-eye"></i>
		                            <?php echo get_phrase('view');?>
		                    </a>
		                </li>
		              </ul>
		          </div>
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>



<script src="<?php echo base_url('assets/js/neon-custom-ajax.js');?>"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    // convert datatable
		$("#notice_table").dataTable();
    //customize the select menu
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
});

</script>
