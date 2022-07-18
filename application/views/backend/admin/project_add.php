<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('project_form'); ?>
                </div>
            </div>
            <div class="panel-body">

                <?php echo form_open(site_url('admin/project/create'), array('class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('project_title'); ?></label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="title" id="title" value="" autofocus required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('description'); ?></label>

                    <div class="col-sm-8">
                        <textarea class="form-control wysihtml5" rows="10" name="description" id="post_content" 
                            data-stylesheet-url="<?php echo base_url('assets/css/wysihtml5-color.css');?>"></textarea>
                        	
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('budget'); ?></label>

                    <div class="col-sm-5">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="entypo-bookmarks"></i></span>
                            <input type="number" class="form-control" name="budget"  value="" >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('start_time'); ?></label>

                    <div class="col-sm-5">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="entypo-calendar"></i></span>
                            <input type="text" class="form-control datepicker" name="timestamp_start"  value="" >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('ending_time'); ?></label>

                    <div class="col-sm-5">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="entypo-calendar"></i></span>
                            <input type="text" class="form-control datepicker" name="timestamp_end"  value="" >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('demo_url'); ?></label>

                    <div class="col-sm-5">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="entypo-globe"></i></span>
                            <input type="text" class="form-control" name="demo_url"  value="" >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('progress_status'); ?></label>

                    <div class="col-sm-5" style="padding-top:9px;">
                        <div class="slider2 slider slider-blue" data-prefix="" data-postfix="%" 
                             data-min="-1" data-max="101" data-value="0"></div>
                        <input type="hidden" name="progress_status" id="progress_status" value="0" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('client'); ?></label>

                    <div class="col-sm-5">
                        <select name="client_id" class="select2">
                            <option><?php echo get_phrase('select_a_client'); ?></option>
                            <?php
                            $clients = $this->db->get('client')->result_array();
                            foreach ($clients as $row):
                                ?>
                                <option value="<?php echo $row['client_id']; ?>">
                                    <?php echo $row['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Influencer'); ?></label>

                    <div class="col-sm-5">
                        <select name="influencer_id" class="select2">
                            <option><?php echo get_phrase('select_an_influencer'); ?></option>
                            <?php
                            $influencers = $this->db->get('influencer')->result_array();
                            foreach ($influencers as $row):
                                ?>
                                <option value="<?php echo $row['influencer_id']; ?>">
                                    <?php echo $row['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('company'); ?></label>

                    <div class="col-sm-5">
                        <select name="company_id" class="form-control selectboxit" >
                            <option><?php echo get_phrase('select_company'); ?></option>
                            <?php
                            $companies = $this->db->get('company')->result_array();
                            foreach ($companies as $row):
                                ?>
                                <option value="<?php echo $row['company_id']; ?>">
                                    <?php echo $row['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('assign_staff'); ?></label>

                    <div class="col-sm-8">
                        <select multiple="multiple" name="staffs[]" class="form-control multi-select">
                            <?php
                            $staffs = $this->db->get('staff')->result_array();
                            foreach ($staffs as $row):
                                ?>
                                <option value="<?php echo $row['staff_id']; ?>">
                                    <?php echo $row['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                    <div class="col-sm-offset-3 col-sm-8">
                        <button type="submit" class="btn btn-info" id="submit-button">
                            <?php echo get_phrase('add_new_project'); ?></button>
                        <span id="preloader-form"></span>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

