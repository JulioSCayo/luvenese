<?php 
    $historia_clinica = $this->db->get_where('project_historia_clinica' , array('project_historia_clinica_id' => $param2))->result_array();
    $edit = $historia_clinica[0];
?>



<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('edit_project_historia_clinica'); ?>
                </div>
            </div>

            <div class="panel-body">
                <?php echo form_open(site_url('admin/project_historia_clinica/edit/' . $param2), array(
                    'class' => 'form-horizontal form-groups-bordered validate project-historia_clinica-edit', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('title'); ?></label>

                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="title" value="<?php echo $edit['title']; ?>" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('assign_staff'); ?></label>

                    <div class="col-sm-5">
                        <select name="assigned_staff" class="select2">
                            <option selected="true" value=""><?php echo get_phrase('ninguno'); ?></option>
                            
                            <?php
                            $assigned_staffs = $this->db->get_where('project', array('project_code' => $param3))->row()->staffs;
                            $staffs = ( explode(',', $assigned_staffs));
                            $number_of_staffs = count($staffs) - 1;
                            if ($number_of_staffs > 0):
                                for ($i = 0; $i < $number_of_staffs; $i++):
                                    $staff_data = $this->db->get_where('staff', array('staff_id' => $staffs[$i]))->result_array();
                                    foreach ($staff_data as $row):
                            ?>

                            <option value="<?php echo $row['staff_id']; ?>" <?php if($edit['assigned_staff'] == $row['staff_id']) echo 'selected'; ?>>
                                            <?php echo $row['name']; ?></option>
                                        <?php
                                    endforeach;
                                endfor;
                            endif;
                            ?>

                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-7">
                        <button type="submit" class="btn btn-info" id="submit-button"><?php echo get_phrase('update'); ?></button>
                        <span id="preloader-form"></span>
                    </div>
                </div>
                <?php echo form_close(); ?>

            </div>
        </div>
    </div>
</div>



<?php 
    $project_code = $edit['project_code'];
?>







<script>
    // url for refresh data after ajax form submission
    var post_refresh_url = '<?php echo site_url('admin/reload_projectroom_historia_clinica/' . $project_code); ?>';
</script>



<script type="text/javascript">
    // ajax form plugin calls at each modal loading,
$(document).ready(function() {


   //config for project historia_clinica adding
    var options = {
        beforeSubmit: validate_project_historia_clinica_edit,
        success: show_response_project_historia_clinica_edit,
        error: error__project_historia_clinica_edit,
        resetForm: true
    };

    $('.project-historia_clinica-edit').submit(function () {
        $(this).ajaxSubmit(options);
        return false;
    });



     if ($.isFunction($.fn.select2))
        {
            $(".select2").each(function (i, el)
            {
                var $this = $(el),
                        opts = {
                            allowClear: attrDefault($this, 'allowClear', false)
                        };

                $this.select2(opts);
                $this.addClass('visible');
                //$this.select2("open");
            });
        }
});



function validate_project_historia_clinica_edit(formData, jqForm, options) {

    if (!jqForm[0].title.value)
    {
        toastr.error("Please enter a title", "Error");
        return false;
    }
}


// ajax success response after form submission
function show_response_project_historia_clinica_edit(responseText, statusText, xhr, $form)  {
    toastr.success("Historia clinica edited successfully", "Success");
    $('#modal_ajax').modal('hide');
    reload_data(post_refresh_url);
}


function error__project_historia_clinica_edit(errorThrown) {
    toastr.error("historia_clinica edit failed: " + errorThrown, "Error");
    $('#modal_ajax').modal('hide');
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

            // calls the tooltip again on ajax success
            $('[data-toggle="tooltip"]').each(function(i, el)
            {
                var $this = $(el),
                    placement = attrDefault($this, 'placement', 'top'),
                    trigger = attrDefault($this, 'trigger', 'hover'),
                    popover_class = $this.hasClass('tooltip-secondary') ? 'tooltip-secondary' : ($this.hasClass('tooltip-primary') ? 'tooltip-primary' : ($this.hasClass('tooltip-default') ? 'tooltip-default' : ''));
                $this.tooltip({
                    placement: placement,
                    trigger: trigger
                });

                $this.on('shown.bs.tooltip', function(ev)
                {
                    var $tooltip = $this.next();
                    $tooltip.addClass(popover_class);
                });
            });
        }
    });
}


</script>