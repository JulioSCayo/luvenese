<div class="panel panel-primary" id="charts_env">
	<div class="panel-heading" style="margin-bottom: 20px;">
		<div class="panel-title">
			<i class="fa fa-shopping-cart"></i>
			<?php echo get_phrase('payment');?>
		</div>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-2"></div>
			<?php
				$month = date('F,');
				$year = date('Y');
				$month_of_first_date = '1 '. $month.' '.$year;
				$month_of_last_date = date("t F, Y", strtotime($month_of_first_date));
			?>
			<div class="col-md-6">
				<div class="daterange daterange-inline add-ranges" data-format="D MMMM, YYYY" data-start-date="<?php echo $month_of_first_date; ?>" data-end-date="<?php echo $month_of_last_date; ?>" style="cursor:text;">
					<i class="entypo-calendar"></i>
					<span id="date_range_selector" style="font-weight: 300;font-size: 20px;color:#000;">
						<?php echo $month_of_first_date; ?> - <?php echo $month_of_last_date; ?>
					</span>
					<!-- <input id="date_range" type="hidden" class="form-control" name="date_range" value=""> -->
				</div>
			</div>
			<div class="col-md-2">
				<button onclick="date_range_payment_list()" class="btn btn-info entypo-search" style="height: 43px; width: 100%;"><?php echo get_phrase('search'); ?></button>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12" id="client_payment_body" style="text-align: center; margin-bottom: 50px;">
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
				        $this->db->where('timestamp >=' , strtotime($month_of_first_date));
				        $this->db->where('timestamp <=' , strtotime($month_of_last_date));

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
			</div>
		</div>
	</div>
</div>



<!-- calling ajax form submission plugin for specific form -->
<script src="<?php echo base_url('assets/js/ajax-form-submission.js');?>"></script>
<script src="<?php echo base_url('assets/js/neon-custom-ajax.js');?>"></script>               
<script type="text/javascript">


	
	jQuery(document).ready(function($)
	{
		
		
		// convert datatable
		var datatable = $("#table_export").dataTable({
			"sPaginationType": "bootstrap",
			// "sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
			// "aoColumns": [
			// 	{ "bSortable": false}, 	//0,checkbox
			// 	{ "bVisible": true},		//1,name
			// 	{ "bVisible": true},		//2,role
			// 	{ "bVisible": true},		//3,contact
			// 	{ "bVisible": true}		//4,option
			// ],
			"oTableTools": {
				"aButtons": [
					
					{
						"sExtends": "xls",
						"mColumns": [1, 2, 4, 5]
					},
					{
						"sExtends": "pdf",
						"mColumns": [1, 2, 4, 5]
					},
					{
						"sExtends": "print",
						"fnSetText"	   : "Press 'esc' to return",
						"fnClick": function (nButton, oConfig) {
							datatable.fnSetColumnVis(0, false);
							datatable.fnSetColumnVis(1, true);
							datatable.fnSetColumnVis(2, true);
							datatable.fnSetColumnVis(3, false);
							datatable.fnSetColumnVis(4, true);
							datatable.fnSetColumnVis(5, true);
							datatable.fnSetColumnVis(6, false);
							
							this.fnPrint( true, oConfig );
							
							window.print();
							
							$(window).keyup(function(e) {
								if (e.which == 27) {
									datatable.fnSetColumnVis(0, false);
									datatable.fnSetColumnVis(1, true);
									datatable.fnSetColumnVis(2, true);
									datatable.fnSetColumnVis(3, false);
									datatable.fnSetColumnVis(4, true);
									datatable.fnSetColumnVis(5, true);
									datatable.fnSetColumnVis(6, false);
								}
							});
						},
						
					},
				]
			}
			
		});
		
		//customize the select menu
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});

	function date_range_payment_list(){
		var date_range = $('#date_range_selector').text();
		var currency_symbol = "<?php echo $currency_symbol; ?>";
		$.ajax({
			type: "post",
			url: "<?php echo site_url('admin/client_payment_table_body_view'); ?>",
			data: {date_range : date_range, currency_symbol : currency_symbol},
			success: function(response){
				$('#client_payment_body').html("<img src='<?php echo base_url('assets/preloader.gif'); ?>' wodth='40' height='20' />");
				var response_val = setInterval(function(){
					$('#client_payment_body').html(response);
					clearInterval(response_val);
				}, 1000);
				
			}
		});
	}
		
</script>
