<div class="panel panel-primary" id="charts_env">

  <div class="panel-heading">

    <div class="panel-title">

      <i class="fa fa-flag-checkered"></i>

  Inventario

    </div>

  </div>

  <div class="panel-body" >

    <table class="table  datatable" id="product_table">

    	<thead>

    		<tr>

    			<th style="width:30px;"></th>

            	<th><div>product</div></th>

    			<th><div>Nombre</div></th>

    			<th><div>Descripcion</div></th>

    			<th><div>Marca</div></th>

    			<th><div>Existencias</div></th>

          <th><div>Costo aproximado</div></th>

          <th><div>Precio de venta</div></th>

           <th><div>Publicado por</div></th>

            <th><div>Fecha</div></th>

    			<th><div><?php echo get_phrase('options');?></div></th>

    		</tr>

    	</thead>

    	<tbody>

    		<?php

    		$counter = 1;

    		$this->db->order_by('date_added' , 'desc');

    		$products	=	$this->db->get('product')->result_array();

    		foreach($products as $row):

    		?>

    		<tr>

    			<td style="width:30px;">

               		<?php echo $counter++;?>

               	</td>

               		<td>

    				   		

                          <img src="<?php echo base_url('uploads/product_file/'.$row['file']); ?>" alt="" width="100">

                        

    			  			

    				    			

    			</td>

    			<td>		<?php echo $row['Nombre']?></td>

          <td>		<?php echo $row['descripcion']?></td>

          <td>		<?php echo $row['marca']?></td>

          <td>		<?php echo $row['existencia']?></td>

          <td>		<?php echo $row['costo']?></td>
          <td>		<?php echo $row['precio']?></td>

                

    			<td>

    			<?php

    					if ($row['publicado_por'] > 0)

    						echo $this->db->get_where('admin' , array(

    							'admin_id' => $row['publicado_por']

    						))->row()->name;

    				?>

    			</td>

         

    			<td>

    				    				<?php echo date("jS F, Y", ($row['date_added']));?>

    				    				

    				    			

    			</td>

    		

    			<td>

          	<div class="btn-group">

                  <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">

                  	Action <span class="caret"></span>

                  </button>

                  <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                    <li>

                        <a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/product_view/' . $row['product_id']);?>');">

                            <i class="entypo-eye"></i>

                                <?php echo get_phrase('view');?>

                        </a>

                    </li>
                    
                    <li>

                        <a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/product_edit/' . $row['product_id']);?>');">

                            <i class="entypo-pencil"></i>

                                <?php echo get_phrase('edit');?>

                        </a>

                    </li>

                    <li class="divider"></li>

                    <li>

                        <a href="#" onclick="confirm_modal('<?php echo site_url('admin/product/delete/' . $row['product_id']);?>' , '<?php echo site_url('admin/reload_product_list');?>');" >

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





<script src="<?php echo base_url('assets/js/neon-custom-ajax.js');?>"></script>

<script type="text/javascript">







  jQuery(document).ready(function($) {

    // convert datatable

    $("#product_table").dataTable();

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

