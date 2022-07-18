
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_project_bug'); ?>
                </div>
            </div>
            <div class="panel-body">

                <?php echo form_open(site_url('admin/product/create/'.$param2), array('class' => 'form-horizontal form-groups-bordered validate project-bug-add', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group"> 
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('title'); ?></label>

                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus>
                    </div>
                   
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('description'); ?></label>

                    <div class="col-sm-7">
                        <textarea class="form-control" name="description"></textarea>
                    </div>

                </div>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Costo</label>   
                    <div class="col-sm-7">
                       <input type="text" class="form-control" name="costo" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus>
                    </div>
                </div> 
                
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Precio de venta</label>   
                    <div class="col-sm-7">
                       <input type="text" class="form-control" name="precio" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus>
                    </div>
                </div> 
                
                    <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Marca</label>   
                <div class="col-sm-7">
                       <input type="text" class="form-control" name="marca" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus>
                    </div>
                    </div>  
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Existencia</label>   
                    <div class="col-sm-7">
                       <input type="text" class="form-control" name="existencia" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus>
                    
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Caducidad</label>   
                    <div class="col-sm-7">
                       <input type="date" class="form-control" name="caducidad" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="caducidad" autofocus>
                    
                    </div>
                </div>
                    
                    <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Categoria</label>   
                <div class="col-sm-7">
                       <input type="text" class="form-control" name="categories" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus>
                    </div>
                    </div>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('status'); ?></label>

                    <div class="col-sm-5">
                        <select name="categoria" class="form-control selectboxit">
                            <option value="0" data-iconurl=""><?php echo get_phrase('pending'); ?></option>
                            <option value="1"><?php echo get_phrase('solved'); ?></option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('select_file'); ?></label>

                            <div class="col-sm-6">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <span class="btn btn-primary btn-file">
                                        <span class="fileinput-new"><?php echo get_phrase('choose'); ?></span>
                                        <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
                                        <input type="file" name="userfile" id="userfile">
                                    </span>
                                    <span class="fileinput-filename"></span>
                                    <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
                                </div>
                            </div>
                        </div>


                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-7">
                        <button type="submit" class="btn btn-info" ><?php echo get_phrase('submit'); ?></button>
                        <span id="preloader-form"></span>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

