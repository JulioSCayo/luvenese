<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('create_new_admin');?>
                </div>
            </div>
            <div class="panel-body">
                
                <?php echo form_open(site_url('admin/addon/install'), array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data'));?>
    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('zip_file'); ?></label>
                        
                        <div class="col-sm-7">
                        <div class="input-group">
                                <input type="file" class="custom-file-input" id="addon_zip" name="addon_zip"required>
                         </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-7">
                            <button type="submit" class="btn btn-info" id="submit-button"><?php echo get_phrase('install_addon');?></button>
                        </div>
                    </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>