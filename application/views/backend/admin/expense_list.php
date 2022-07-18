
<table class="table  datatable" id="table_export">
	<thead>
		<tr>
			<th style="width:30px;">#</th>
			<th><div><?php echo get_phrase('title');?></div></th>
			<th><div><?php echo get_phrase('category');?></div></th>
			<th><div><?php echo get_phrase('date');?></div></th>
			<th><div><?php echo get_phrase('amount');?></div></th>
			<th><div><?php echo get_phrase('options');?></div></th>
		</tr>
	</thead>
	<tbody>
		<?php
		$counter = 1;
		$this->db->order_by('timestamp' , 'desc');
		$this->db->where('type' , 'expense');
		$this->db->where('timestamp >=', $start_date);
		$this->db->where('timestamp <=', $end_date);
		$expenses	=	$this->db->get('payment')->result_array();
		foreach($expenses as $row):
		?>
		<tr style="text-align: left;">
			<td style="width:30px;">
           		<?php echo $counter++;?>
           	</td>
			<td><?php echo $row['title'];?></td>
			<td>
				<?php
					if ($row['expense_category_id'] > 0)
						echo $this->db->get_where('expense_category' , array(
							'expense_category_id' => $row['expense_category_id']
						))->row()->title;
				?>
			</td>
			<td>
				<?php echo date('jS F Y' , $row['timestamp']);?>
			</td>
			<td><?php echo $this->crud_model->get_currency() . $row['amount'];?></td>
			<td>
            	<div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                    	Action <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                        <!-- EDITING LINK -->
                        <li>
                            <a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/expense_edit/' . $row['payment_id']);?>');">
                                <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit');?>
                            </a>
                        </li>
                        <li class="divider"></li>

                        <!-- DELETION LINK -->
                        <li>
                            <a href="#" onclick="confirm_modal('<?php echo site_url('admin/accounting_expense/delete/' . $row['payment_id']);?>' , '<?php echo site_url('admin/reload_expense_list');?>');" >
                                <i class="entypo-trash"></i>
                                    <?php echo get_phrase('delete');?>
                            </a>
                        </li>
                    </ul>
                </div>
			</td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>
	