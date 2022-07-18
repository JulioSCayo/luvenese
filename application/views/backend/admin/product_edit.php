<?php
  $update = $this->db->get_where('product', array('product_id' => $param2))->result_array();
  foreach ($update as $row):
?>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title" >
            <i class="entypo-pencil"></i>
            <?php echo get_phrase('edit_product'); ?>
        </div>
      </div>
      <div class="panel-body">

        <?php echo form_open(site_url('admin/product/edit/'. $param2), array(
            'class' => 'form-horizontal form-groups-bordered product-edit', 'enctype' => 'multipart/form-data')); ?>

        <div class="form-group">
            <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('title'); ?></label>
            <div class="col-sm-7">
                <div class="input-group">
                    <span class="input-group-addon"><i class="entypo-star"></i></span>
                    <input type="text" class="form-control" name="title" value="<?php echo $row['Nombre'];?>" required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="field-2" class="col-sm-4 control-label"><?php echo get_phrase('description'); ?></label>

            <div class="col-sm-7">
                <div class="input-group ">
                    <span class="input-group-addon"><i class="entypo-pencil"></i></span>
                    <textarea class="form-control autogrow" name="description" style="height:48px;"><?php echo $row['descripcion'];?></textarea>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="field-2" class="col-sm-4 control-label"><?php echo get_phrase('existencia'); ?></label>

            <div class="col-sm-7">
                <div class="input-group ">
                    <span class="input-group-addon"><i class="entypo-pencil"></i></span>
                    <textarea class="form-control autogrow" name="existencia" style="height:48px;"><?php echo $row['existencia'];?></textarea>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="field-2" class="col-sm-4 control-label"><?php echo get_phrase('costo'); ?></label>

            <div class="col-sm-7">
                <div class="input-group ">
                    <span class="input-group-addon"><i class="entypo-pencil"></i></span>
                    <textarea class="form-control autogrow" name="costo" style="height:48px;"><?php echo $row['costo'];?></textarea>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="field-2" class="col-sm-4 control-label"><?php echo get_phrase('precio'); ?></label>

            <div class="col-sm-7">
                <div class="input-group ">
                    <span class="input-group-addon"><i class="entypo-pencil"></i></span>
                    <textarea class="form-control autogrow" name="precio" style="height:48px;"><?php echo $row['precio'];?></textarea>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('visible_for'); ?></label>
            <div class="col-sm-7">
              <select name="visible_for" class="form-control selectboxit">
                  <option value=""><?php echo get_phrase('select_visivility'); ?></option>
                  <option value="1" <?php if ($row['visible_for'] == 1) echo 'selected';?>><?php echo get_phrase('all'); ?></option>
                  <option value="2" <?php if ($row['visible_for'] == 2) echo 'selected';?>><?php echo get_phrase('staffs'); ?></option>
                  <option value="3" <?php if ($row['visible_for'] == 3) echo 'selected';?>><?php echo get_phrase('clients'); ?></option>
              </select>
            </div>
        </div>
        <div class="form-group">
            <label for="field-2" class="col-sm-4 control-label"><?php echo get_phrase('caducidad'); ?></label>

            <div class="col-sm-7">
                <div class="input-group ">
                    <span class="input-group-addon"><i class="entypo-pencil"></i></span>
                    <div class="date">
                    <input type="date" class="form-control" name="caducidad" value="<?php echo $row['caducidad'];?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-4 col-sm-7">
            <button type="submit" class="btn btn-info" id="submit-button"><?php echo get_phrase('add_product'); ?></button>
            <span id="preloader-form"></span>
          </div>
        </div>
          <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<script>
    // url for refresh data after ajax form submission
    var post_refresh_url = '<?php echo site_url('admin/reload_product_list'); ?>';
</script>


<script type="text/javascript">
    // ajax form plugin calls at each modal loading,
$(document).ready(function() {

   //config for project milestone adding
    var options = {
        beforeSubmit: validate_expense_add,
        success: show_response_expense_add,
        resetForm: true
    };
    $('.product-add').submit(function () {
        $(this).ajaxSubmit(options);
        return false;
    });


});

function validate_expense_add(formData, jqForm, options) {

    if (!jqForm[0].title.value)
    {
        toastr.error("Please enter title", "Error");
        return false;
    }
}

// ajax success response after form submission
function show_response_expense_add(responseText, statusText, xhr, $form)  {


    toastr.success("product added successfully", "Success");
    $('#modal_ajax').modal('hide');
    reload_data(post_refresh_url);
}



/*-----------------custom functions for ajax post data handling--------------------*/



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

</script>
