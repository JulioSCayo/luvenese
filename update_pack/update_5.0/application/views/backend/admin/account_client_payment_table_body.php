<table class="table " id="">
    <thead>
        <tr>
            <th style="width:30px;">#</th>
            <th><div><?php echo get_phrase('project');?></div></th>
            <th><div><?php echo get_phrase('client');?></div></th>
            <th><div><?php echo get_phrase('company');?></div></th>
            <th><div><?php echo get_phrase('date');?></div></th>
            <th><div><?php echo get_phrase('amount');?></div></th>
            <th><div><?php echo get_phrase('options');?></div></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $counter = 1;
        $this->db->order_by('timestamp' , 'desc');
        $this->db->where('type' , 'income');
        $this->db->where('timestamp >=' , $start_date);
        $this->db->where('timestamp <=' , $end_date);

        $payments	=	$this->db->get('payment')->result_array();
        foreach($payments as $row):
        ?>
        <tr style="text-align: left;">
        	<td style="width:30px;">
           		<?php echo $counter++;?>
           	</td>
        	<td>
        		<?php echo $this->db->get_where('project' , array('project_code' => $row['project_code']))->row()->title;?>
        	</td>
        	<td>
            	<?php 
            		$get_client_id = $this->db->get_where('project' , array('project_code' => $row['project_code']))->row()->client_id;
            		if ($get_client_id > 0)
            			echo $this->db->get_where('client' , array('client_id' => $get_client_id))->row()->name;
            	?>
            </td>
            <td>
           		<?php 
            		$get_company_id = $this->db->get_where('project' , array('project_code' => $row['project_code']))->row()->company_id;
            		if ($get_company_id > 0)
            			echo $this->db->get_where('company' , array('company_id' => $get_company_id))->row()->name;
            	?>
            </td>
            <td>
           		<?php echo date('jS F Y' , $row['timestamp']);?>
            </td>
            <td>
            	<?php echo $currency_symbol . $row['amount'];?>
            </td>
        	<td>
            	<button class="btn btn-default btn-sm"
            		onclick="showAjaxModal('<?php echo site_url('modal/popup/project_milestone_view/' . $row['milestone_id']);?>')">
            		<i class="entypo-doc-text"></i>
                    <?php echo get_phrase('invoice');?>
                </button>
        	</td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>