<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_support_canned_message'); ?>
                </div>
            </div>
            <div class="panel-body">

                <?php echo form_open(site_url('admin/support_canned_message/add'), array(
                    'class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
                    <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('title'); ?></label>

                    <div class="col-sm-7">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="entypo-star"></i></span>
                            <input type="text" class="form-control" name="title" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-2" class="col-sm-4 control-label"><?php echo get_phrase('description'); ?></label>

                    <div class="col-sm-7">
                        <div class="input-group ">
                            <span class="input-group-addon"><i class="entypo-pencil"></i></span>
                            <textarea class="form-control autogrow" name="description" style="height:48px;"></textarea>
                        </div>
                    </div> 
                </div>

                

                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-7">
                        <button type="submit" class="btn btn-info" id="submit-button"><?php echo get_phrase('add_canned_message'); ?></button>
                        <span id="preloader-form"></span>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>




