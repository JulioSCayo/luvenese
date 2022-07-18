<div class="panel panel-primary" id="charts_env">
	<div class="panel-heading">
		<div class="panel-title">
			<i class="fa fa-list"></i>
			<?php echo get_phrase('company_list');?>
		</div>
	</div>
	<div class="panel-body" >
		<table class="table  datatable" id="table_export">
			<thead>
				<tr>
					<th style="width:30px;"></th>
					<th><div><?php echo get_phrase('name');?></div></th>
					<th><div><?php echo get_phrase('company_logo');?></div></th>
					<th><div><?php echo get_phrase('associated_person');?></div></th>
					<th><div><?php echo get_phrase('website');?></div></th>
					<th><div><?php echo get_phrase('contact');?></div></th>
					<th><div><?php echo get_phrase('options');?></div></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$counter = 1;
				$companies	=	$this->db->get('company')->result_array();
				foreach($companies as $row):
				?>
				<tr>
					<td style="width:30px;">
		           		<?php echo $counter++;?>
		           	</td>
					<td><?php echo $row['name'];?></td>
					<td>
						<?php if(file_exists('uploads/company_logo/'.$row['company_id'].'.jpg')): ?>
		                    <img src="<?php echo base_url('uploads/company_logo/'.$row['company_id'].'.jpg'); ?>" alt="" class="img-circle" width="50" height="50">
		                <?php else: ?>
		                    <img src="<?php echo base_url('uploads/company_logo/company.png'); ?>" alt="" class="img-circle" width="50" height="50" style="opacity: .4;">
		                <?php endif; ?>
					</td>
					<td>
		            	<?php if ($row['client_id'] > 0)
		            			echo $this->db->get_where('client' , array('client_id' => $row['client_id']))->row()->name;
		            	?>
		            </td>
		            <td>
		           		<?php echo $row['website'];?>
		            </td>
		            <td>
		           		<?php if ($row['email'] != ''):?>
		              <a class="tooltip-primary" data-toggle="tooltip" data-placement="top" 
		                  data-original-title="<?php echo get_phrase('send_email');?>"	
		                  href="mailto:<?php echo $row['email'];?>" style="color:#bbb;">
		                          <i class="entypo-mail"></i>
		                 </a>
		             <?php endif;?>
		             <?php if ($row['phone'] != ''):?>
		              <a class="tooltip-primary" data-toggle="tooltip" data-placement="top" 
		                  data-original-title="<?php echo get_phrase('call_phone');?>"	
		                  href="tel:<?php echo $row['phone'];?>" style="color:#bbb;">
		                          <i class="entypo-phone"></i>
		                 </a>
		             <?php endif;?>
		            </td>
					<td>
		            	<div class="btn-group">
		                  <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
		                      Action <span class="caret"></span>
		                  </button>
		                  <ul class="dropdown-menu dropdown-default pull-right" role="menu">

		                  	<li>
		                        <a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/company_profile/' . $row['company_id']);?>');">
		                            <i class="entypo-star"></i>
		                                <?php echo get_phrase('profile');?>
		                            </a>
		                    </li>
		                    
		                    <!-- EDITING LINK -->
		                    <li>
		                        <a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/company_edit/' . $row['company_id']);?>');">
		                            <i class="entypo-pencil"></i>
		                                <?php echo get_phrase('edit');?>
		                            </a>
		                    </li>
		                    <li class="divider"></li>
		                      
		                    <!-- DELETION LINK -->
		                    <li>
		                        <a href="#" onclick="confirm_modal('<?php echo site_url('staff/company/delete/' . $row['company_id']);?>' , '<?php echo site_url('staff/reload_company_list');?>');" >
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
			"oTableTools": {
				"aButtons": [
					
					{
						"sExtends": "xls",
						"mColumns": [1, 2, 3]
					},
					{
						"sExtends": "pdf",
						"mColumns": [1, 2, 3]
					},
					{
						"sExtends": "print",
						"fnSetText"	   : "Press 'esc' to return",
						"fnClick": function (nButton, oConfig) {
							datatable.fnSetColumnVis(0, false);
							datatable.fnSetColumnVis(1, true);
							datatable.fnSetColumnVis(2, true);
							datatable.fnSetColumnVis(3, true);
							datatable.fnSetColumnVis(4, false);
							datatable.fnSetColumnVis(5, false);
							
							this.fnPrint( true, oConfig );
							
							window.print();
							
							$(window).keyup(function(e) {
								if (e.which == 27) {
									datatable.fnSetColumnVis(0, false);
									datatable.fnSetColumnVis(1, true);
									datatable.fnSetColumnVis(2, true);
									datatable.fnSetColumnVis(3, true);
									datatable.fnSetColumnVis(4, false);
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
