<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_project_historia_clinica'); ?>
                </div>
            </div>
            <div class="panel-body">

                <?php echo form_open(site_url('admin/project_historia_clinica/create/'.$param2), array('class' => 'form-horizontal form-groups-bordered validate project-historia_clinica-add', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('title'); ?>*</label>

                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="title" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus>
                    </div>
                </div>

                <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Nombre_completo')?>*</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="nombre_completo" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Fecha_de_nacimiento')?>*</label>
                <div class="col-sm-7">
                <input type="date" class="form-control" name="nacimiento" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Nacionalidad')?>*</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="nacionalidad" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('sexo'); ?>*</label>
                <div class="col-sm-5">
                    <select name="sexo" class="form-control selectboxit" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>">
                        <option value="" disabled selected><?php echo get_phrase('seleccionar'); ?></option>
                        <option value="0" data-iconurl=""><?php echo get_phrase('masculino'); ?></option>
                        <option value="1"><?php echo get_phrase('femenino'); ?></option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Genero')?>*</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="genero" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Ultima_regla')?></label>
                <div class="col-sm-7">
                <input type="date" class="form-control" name="regla">
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Embarazo_actual'); ?></label>
                <div class="col-sm-5">
                    <select name="embarazo" class="form-control selectboxit">
                        <option value="0" data-iconurl=""><?php echo get_phrase('No'); ?></option>
                        <option value="1"><?php echo get_phrase('Si'); ?></option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Menopausia'); ?></label>
                <div class="col-sm-5">
                    <select name="menopausia" class="form-control selectboxit">
                        <option value="0" data-iconurl=""><?php echo get_phrase('No'); ?></option>
                        <option value="1"><?php echo get_phrase('Si'); ?></option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Estatura_(cm)')?>*</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="estatura" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Peso_(Kg)')?>*</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="peso" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Estado_civil'); ?></label>
                <div class="col-sm-5">
                    <select name="estado_civil" class="form-control selectboxit">
                        <option value="0" data-iconurl=""><?php echo get_phrase('soltero'); ?></option>
                        <option value="1"><?php echo get_phrase('casado'); ?></option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Grado_de_estudios')?>*</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="grado_estudios" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Ocupacion')?>*</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="ocupacion" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Email')?>*</label>
                <div class="col-sm-7">
                <input type="email" class="form-control" name="email" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Motivo_de_consulta')?>*</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="motivo_consulta" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Alergias')?></label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="alergias"  value="" autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Enfermedades_cronicas')?></label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="enfermedades_cronicas"  value="" autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Farmacos_actuales')?></label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="farmacos_actuales"  value="" autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Suplementos')?></label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="suplementos"  value="" autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Cirujias_previas')?></label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="cirujias_previas"  value="" autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Tratamientos_esteticos')?></label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="tratamientos_esteticos"  value="" autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Rutina_de_cuidado_de_la_piel')?></label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="rutina_piel"  value="" autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Notas_agregadas')?></label>
                <div class="col-sm-7">
                <textarea class="form-control" name="notas"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('assign_staff'); ?></label>

                <div class="col-sm-5">
                    <select name="assigned_staff" class="select2">
                        <option selected="true" value=""><?php echo get_phrase('ninguno'); ?></option>

                        <?php
                        $assigned_staffs = $this->db->get_where('project', array('project_code' => $param2))->row()->staffs;
                        $staffs = ( explode(',', $assigned_staffs));
                        $number_of_staffs = count($staffs) - 1;
                        if ($number_of_staffs > 0):
                            for ($i = 0; $i < $number_of_staffs; $i++):
                                $staff_data = $this->db->get_where('staff', array('staff_id' => $staffs[$i]))->result_array();
                                foreach ($staff_data as $row):
                        ?>
                                    <option value="<?php echo $row['staff_id']; ?>"> <?php echo $row['name']; ?></option>
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
                        <button type="submit" class="btn btn-info" id="submit-button"><?php echo get_phrase('submit'); ?></button>
                        <span id="preloader-form"></span>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script>
    // url for refresh data after ajax form submission
    var post_refresh_url = '<?php echo site_url('admin/reload_projectroom_historia_clinica/' . $param2); ?>';
</script>


<script type="text/javascript">
    // ajax form plugin calls at each modal loading,
$(document).ready(function() {

   //config for project task adding
    var options = {
        beforeSubmit: validate_project_historia_clinica_add,
        success: show_response_project_historia_clinica_add,
        resetForm: true
    };
    $('.project-historia_clinica-add').submit(function () {
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

function validate_project_historia_clinica_add(formData, jqForm, options) {

    if (!jqForm[0].title.value)
    {
        toastr.error("Please enter a title", "Error");
        return false;
    }
    if (!jqForm[0].nombre_completo.value)
    {
        toastr.error("Please enter you name", "Error");
        return false;
    }
    if (!jqForm[0].nacimiento.value)
    {
        toastr.error("Please enter your birthday", "Error");
        return false;
    }
    if (!jqForm[0].nacionalidad.value)
    {
        toastr.error("Please enter your nationality", "Error");
        return false;
    }
    if (!jqForm[0].sexo.value)
    {
        toastr.error("Please enter your sex", "Error");
        return false;
    }
    if (!jqForm[0].genero.value)
    {
        toastr.error("Please enter your gender", "Error");
        return false;
    }
    if (!jqForm[0].estatura.value)
    {
        toastr.error("Please enter your height", "Error");
        return false;
    }
    if (!jqForm[0].peso.value)
    {
        toastr.error("Please enter your weight", "Error");
        return false;
    }
    if (!jqForm[0].grado_estudios.value)
    {
        toastr.error("Please enter your level of study", "Error");
        return false;
    }
    if (!jqForm[0].ocupacion.value)
    {
        toastr.error("Please enter your occupation", "Error");
        return false;
    }
    if (!jqForm[0].email.value)
    {
        toastr.error("Please enter an email", "Error");
        return false;
    }
    if (!jqForm[0].motivo_consulta.value)
    {
        toastr.error("Please enter a reason for your consultation", "Error");
        return false;
    }
}

// ajax success response after form submission
function show_response_project_historia_clinica_add(responseText, statusText, xhr, $form)  {

    
    toastr.success("Project historia clinica added successfully", "Success");
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

