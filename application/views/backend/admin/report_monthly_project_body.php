<?php
  $currency        = $this->db->get_where('settings' , array('type'=>'system_currency_id'))->row()->description;
  $currency_symbol = $this->db->get_where('currency' , array('currency_id' => $currency))->row()->currency_symbol;
?>
<center>
<h4><?php echo get_phrase('summary_report');?> </h4>
</center>
<div class="panel panel-primary" id="charts_env">
	<div class="panel-heading">
		<div class="panel-title">
			<i class="fa fa-money"></i>
			<?php echo get_phrase('monthly_report');?>
		</div>
	</div>
	<div class="panel-body" >
		<table class="table   datatable">
			<thead>
				<tr>
		        	<th width = "5%">#</th>
					<th  width = "10%"><div><?php echo get_phrase('date');?></div></th>
					<th width = "20%"><div><?php echo get_phrase('client');?></div></th>
					<th width = "20%"><div><?php echo get_phrase('project');?></div></th>
					<th width = "45%"><div><?php echo get_phrase('payments');?></div></th>
				</tr>
			</thead>
			<tbody>

				<?php
		    $counter = 1;
				$this->db->order_by('timestamp_start' , 'desc');
				$projects	=	$this->db->get('project')->result_array();
				foreach ($projects as $row):?>
					<tr>
		        <td><?php echo $counter; ?></td>
						<td><?php echo $row['timestamp_start'];?></td>
						<td><?php echo $this->db->get_where('client',array('client_id' => $row['client_id']))->row()->name;?></td>
						<td><?php echo $row['title'];?></td>
						<td>
		          <?php
		           $project_milestone = $this->db->get_where('project_milestone', array('project_code' => $row['project_code']))->result_array();
		           if (sizeof($project_milestone) > 0):
		             foreach ($project_milestone as $milestone):
		               if ($milestone['status'] == 1):?>
		               <span style="background-color: #43A047; color: white; padding: 2px 5px; border-radius: 30%;"><?php echo $currency_symbol.' '.$milestone['amount']; ?></span>
		               <?php endif;
		               if ($milestone['status'] != 1):?>
		               <span style="background-color: #ef5350; color: white; padding: 2px 5px; border-radius: 30%;"><?php echo $currency_symbol.' '.$milestone['amount']; ?></span>
		             <?php endif;?>
		           <?php endforeach; ?>
		           <?php endif; ?>
		        </td>
					</tr>
				<?php $counter++; endforeach;?>
			</tbody>
		</table>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.datatable').DataTable();
	});
</script>