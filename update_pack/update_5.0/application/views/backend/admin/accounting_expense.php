<a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('modal/popup/expense_add');?>');" 
    class="btn btn-primary pull-right btn-adding">
        <i class="entypo-plus-circled"></i>
        <?php echo get_phrase('add_expense');?>
    </a>
<br><br>
<div class="main_data">
	<div class="panel panel-primary" id="charts_env">
		<div class="panel-heading" style="margin-bottom: 10px;">
			<div class="panel-title">
				<i class="fa fa-money"></i>
				<?php echo get_phrase('expenses');?>
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
		<div class="panel-body" >
			<div class="row">
				<div class="col-md-12" id="client_payment_body" style="text-align: center; margin-bottom: 50px;">
					
					<table class="table  datatable" id="">
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
							$this->db->where('timestamp >=', strtotime($month_of_first_date));
							$this->db->where('timestamp <=', strtotime($month_of_last_date));
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
	
				</div>
			</div>
		</div>
	</div>
</div>



<script src="<?php echo base_url('assets/js/neon-custom-ajax.js');?>"></script>
<script type="text/javascript">

	function date_range_payment_list(){
		var date_range = $('#date_range_selector').text();
		$.ajax({
			type: "post",
			url: "<?php echo site_url('admin/accounting_expense_table_view'); ?>",
			data: {date_range : date_range},
			success: function(response){
				//alert(response);
				$('#client_payment_body').html("<img src='<?php echo base_url('assets/preloader.gif'); ?>' wodth='40' height='20' />");
				var response_val = setInterval(function(){
					$('#client_payment_body').html(response);
					clearInterval(response_val);
				}, 1000);
				
			}
		});
	}

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
						"mColumns": [1, 2, 3, 4]
					},
					{
						"sExtends": "pdf",
						"mColumns": [1, 2, 3, 4]
					},
					{
						"sExtends": "print",
						"fnSetText"	   : "Press 'esc' to return",
						"fnClick": function (nButton, oConfig) {
							datatable.fnSetColumnVis(0, false);
							datatable.fnSetColumnVis(1, true);
							datatable.fnSetColumnVis(2, true);
							datatable.fnSetColumnVis(3, true);
							datatable.fnSetColumnVis(4, true);
							datatable.fnSetColumnVis(5, false);

							this.fnPrint( true, oConfig );

							window.print();

							$(window).keyup(function(e) {
								if (e.which == 27) {
									datatable.fnSetColumnVis(0, false);
									datatable.fnSetColumnVis(1, true);
									datatable.fnSetColumnVis(2, true);
									datatable.fnSetColumnVis(3, true);
									datatable.fnSetColumnVis(4, true);
									datatable.fnSetColumnVis(5, false);
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

</script>


<script type="text/javascript">
	// custom function for reloading table data
function reload_data(url)
{
    $.ajax({
        url: url,
        success: function(response)
        {
            // Replace new page data
            jQuery('.main_data').html(response);

        }
    });
}

// custom function for data deletion by ajax and post refreshing call
function delete_data(delete_url , post_refresh_url)
{
    // showing user-friendly pre-loader image
    $('#preloader-delete').html('<img src="assets/images/preloader.gif" style="height:15px;margin-top:-10px;" />');

    // disables the delete and cancel button during deletion ajax request
    document.getElementById("delete_link").disabled=true;
    document.getElementById("delete_cancel_link").disabled=true;

    $.ajax({
        url: delete_url,
        success: function(response)
        {
            // remove the preloader
            $('#preloader-delete').html('');

            // show deletion success msg.
            toastr.info("Data deleted successfully.", "Success");

            // hide the delete dialog box
            $('#modal_delete').modal('hide');

            // enables the delete and cancel button after deletion ajax request success
            document.getElementById("delete_link").disabled=false;
            document.getElementById("delete_cancel_link").disabled=false;

            // reload the table
            reload_data(post_refresh_url);
        }
    });
}
</script>