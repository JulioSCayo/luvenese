<div class="row">
    <div class="col-md-12">

            <div class="box-content">
                <?php echo $this->session->flashdata('msg'); ?>

                <?php echo form_open(site_url('admin/save_smtp_settings'), array(
                    'class' => 'form-horizontal','target'=>'_top' , 'enctype' => 'multipart/form-data'
                        ));
                ?>
                    <?php
                    $smtp       =   $this->db->get_where('settings' , array('type' => 'smtp_settings'))->row()->description;
                    $smtp_entries = json_decode($smtp);

                     ?>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo get_phrase('smtp_email'); ?></label>

                        <div class="col-sm-9 col-lg-10 controls">
                           <?php $v = $smtp_entries->smtp_email; ?>
                            <?php $options = array('Disable'=>'Disable[ if disabled php mail() function will be used]','Enable'=>'Enable');?>
                            <select class="form-control" name="smtp_email" id="enable_smtp">
                                <?php foreach ($options as $key => $value) {
                                    $sel = ($v==$key)?'selected="selected"':'';
                                ?>
                                    <option value="<?php echo $key;?>" <?php echo $sel;?>><?php echo $value;?></option>
                                <?php
                                }?>
                            </select>
                            <input type="hidden" name="smtp_email_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('smtp_email'); ?>
                        </div>
                    </div>
                    <span id="enable-panel">
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo get_phrase('smtp_host'); ?></label>

                        <div class="col-sm-9 col-lg-10 controls">
                            <?php $v = $smtp_entries->smtp_host;?>
                            <input type="text" name="smtp_host" value="<?php echo $v;?>" placeholder="<?php echo get_phrase('type_something');?>g" class="form-control" >
                            <input type="hidden" name="smtp_host_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('smtp_host'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo get_phrase('smtp_port'); ?></label>

                        <div class="col-sm-9 col-lg-10 controls">
                            <?php $v = $smtp_entries->smtp_port;?>
                            <input type="text" name="smtp_port" value="<?php echo $v;?>" placeholder="<?php echo get_phrase('type_something');?>g" class="form-control" >
                            <input type="hidden" name="smtp_port_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('smtp_port'); ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo get_phrase('smtp_timeout'); ?></label>

                        <div class="col-sm-9 col-lg-10 controls">
                            <?php $v = $smtp_entries->smtp_timeout;?>
                            <input type="text" name="smtp_timeout" value="<?php echo $v;?>" placeholder="<?php echo get_phrase('type_something');?>g" class="form-control" >
                            <input type="hidden" name="smtp_timeout_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('smtp_timeout'); ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo get_phrase('smtp_user'); ?></label>

                        <div class="col-sm-9 col-lg-10 controls">
                            <?php $v = $smtp_entries->smtp_user;?>
                            <input type="text" name="smtp_user" value="<?php echo $v;?>" placeholder="<?php echo get_phrase('type_something');?>g" class="form-control" >
                            <input type="hidden" name="smtp_user_rules" value="required|valid_email">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('smtp_user'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo get_phrase('smtp_password'); ?></label>

                        <div class="col-sm-9 col-lg-10 controls">
                            <?php $v = $smtp_entries->smtp_pass;?>
                            <input type="text" name="smtp_pass" value="<?php echo $v;?>" placeholder="<?php echo get_phrase('type_something');?>g" class="form-control" >
                            <input type="hidden" name="smtp_pass_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('smtp_pass'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo get_phrase('Charter Set'); ?></label>

                        <div class="col-sm-9 col-lg-10 controls">
                           <?php $v = $smtp_entries->char_set;?>
                            <input type="text" name="char_set" value="<?php echo $v;?>" placeholder="<?php echo get_phrase('type_something');?>g" class="form-control" >
                            <input type="hidden" name="char_set_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('char_set'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo get_phrase('New Line'); ?></label>

                        <div class="col-sm-9 col-lg-10 controls">
                           <?php $v = $smtp_entries->new_line;?>
                            <input type="text" name="new_line" value="<?php echo $v;?>" placeholder="<?php echo get_phrase('type_something');?>g" class="form-control" >
                            <input type="hidden" name="new_line_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('new_line'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo get_phrase('Mail Type'); ?></label>

                        <div class="col-sm-9 col-lg-10 controls">
                           <?php $v = $smtp_entries->mail_type;?>
                            <input type="text" name="mail_type" value="<?php echo $v;?>" placeholder="<?php echo get_phrase('type_something');?>g" class="form-control" >
                            <input type="hidden" name="mail_type_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('mail_type'); ?>
                        </div>
                    </div>
                    </span>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"></label>

                        <div class="col-sm-9 col-lg-10 controls">
                            <button class="btn btn-primary" type="submit"><i
                                    class="fa fa-check"></i><?php echo get_phrase("update"); ?></button>
                        </div>
                    </div>

                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery('#enable_smtp').change(function(){
        var val = jQuery(this).val();
        if(val=='Enable')
        {
            jQuery('#enable-panel').show();
        }
        else
        {
            jQuery('#enable-panel').hide();
        }
        $('#smtp_status').val($("#enable_smtp").val());
    }).change();
});
</script>
