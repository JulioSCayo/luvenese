<?php
    $user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
?>

<div id="chat" class="fixed">

    <div class="chat-inner">
        <a href="#" class="dropdown-toggle" data-collapse-sidebar="1"  data-toggle="chat" 
            style="display:block;margin-right: 20px;margin-top: 15px;float: right;" >
            <i class="fa fa-times" style="color: #595f6c;"></i>
            <!-- <span id="incomplete_todo_number">
                <?php // $this->crud_model->get_incomplete_todo();?>
            </span> -->
        </a>
        <!-- Amchart Clock 
        <div id="chartdiv" style="width:250px; height:250px;"></div>
        -->

        <h3 style="color: #a2a5b9;font-weight: 100;text-align: center;margin-top: 50px;margin-bottom: 30px;">
            <span style="font-size: 15px;">
                <?php echo date("l,");?>
            </span>
            
            <br />
            <span style="font-size: 18px;">
                <?php echo date("jS F");?>
            </span>
        </h3>
        <h3 style="color: #fff;background-color: #595d6e;font-size: 12px;padding: 5px; font-weight:200;">

            <i class="entypo-list"></i>
            To do list
        </h3>
        
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo site_url('admin/todo/add'); ?>" class = "form-horizontal form-groups validate todo-add" enctype = "multipart/form-data" method = "post">
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-1">
                            <input class="form-control" type="text" name="title" id="title" placeholder="+ Add todo list" 
                                style="background-color: #272C36;border: 1px solid #2f3541;color: rgba(170,170,170 ,1); "
                                    data-validate="required" autocomplete="off"/>
                        </div>
                        <input type="submit" value="" class="btn btn-primary btn-xs" onclick="test()" style="display: none;" />
                    </div>                    
                </form>
            </div>
            <table style="width: 83%;margin-left: 22px;" id="todo_list">
                <?php include 'todo_list.php'; ?>
            </table>
        </div>
        <h3 style="color: #fff;background-color: #595d6e;font-size: 12px;padding: 5px; font-weight:200;">

            <i class="entypo-doc-text"></i>
            Calculator
        </h3>
        <!-- calculator-->
        <div class="col-sm-12">
            <style>
                .calculator_button{
                    border: 1px solid #5A606C !important;
                    width: 99%;
                    background-color: #5A606C !important;
                    color: #F5FAFC;
                    cursor:auto;
                    border-radius: 0px;
                    margin: 0.5px;
                }
                .calculator_button:hover{
                    border : 1px solid #757e8e !important;
                    background-color: #757e8e !important;
                    color: #F5FAFC;
                }
                .calculator_button:focus{
                    border : 1px solid #303641;
                    background-color: #5A606C;
                    color: #F5FAFC;
                }
            </style>    
            <form name="form1" onsubmit="return false" 
                style="border: 1px solid #404856;padding-right: 1px;padding-bottom:1px;border-radius: 10px 10px 0px 0px; margin-top: 20px;">
            <table style="width: 100%;">
                <tr>
                    <td colspan="4">
                        <input type="text" id="display" 
                            style="width:100%;border:0px;background-color: #2f3541 !important;text-align: right;font-size: 24px;font-weight: 100;margin-bottom: 0px;padding-right:10px;color: #F5FAFC !important;" 
                                readonly placeholder="0" value="" /></td>
                </tr>
                <tr>
                    <td colspan="4"><button type="button" class="btn btn-default calculator_button" style="width:99.99%;"  onclick="reset()">Clear</button></td>
                </tr>
                <tr>
                    <td><button type="button" class="btn btn`-default calculator_button" onclick="displaynum(7)">7</button></td>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(8)" >8</button></td>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(9)" >9</button></td>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="operator(&quot;+&quot;)" style="background-color: #FDA82F !important; border-color: #FDA82F !important;">+</button></td>
                </tr>
                <tr>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(4)">4</button></td>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(5)" >5</button></td>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(6)" >6</button></td>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="operator(&quot;-&quot;)" style="background-color: #FDA82F !important; border-color: #FDA82F !important;">-</button></td>
                </tr>
                <tr>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(1)">1</button></td>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(2)" >2</button></td>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(3)" >3</button></td>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="operator(&quot;*&quot;)" style="background-color: #FDA82F !important; border-color: #FDA82F !important;">&times;</button></td>
                </tr>
                <tr>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(0)">0</button></td>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(&quot;.&quot;)" >.</button></td>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="equals()" >=</button></td>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="operator(&quot;/&quot;)" style="background-color: #FDA82F !important; border-color: #FDA82F !important;">&divide;</button></td>
                </tr>
            </table>
            </form>


            
        </div>        
    </div>
    
</div>


<script src="assets/js/calculator.js"></script>


<script>
    // Amchart clock function start here.        
    var chart = AmCharts.makeChart("clock_div", {
        "type": "gauge",
        "theme": "light",
        "startDuration": 0.3,
        "marginTop":10,
        "marginBottom":10,
        "faceAlpha" : 1,
        "faceColor" : "#ffffff",
        "faceBorderAlpha" : 1,
        "faceBorderColor" : "#000000",
        "faceBorderWidth" : 3,
        "color" : "#000000",
        "axes": [{
            "axisAlpha": 0.3,
            "endAngle": 360,
            "endValue": 12,
            "minorTickInterval": 0.2,
            "showFirstLabel": false,
            "startAngle": 0,
            "axisThickness": 1,
            "valueInterval": 1
        }],
        "arrows": [{
            "radius": "50%",
            "innerRadius": 0,
            "clockWiseOnly": true,
            "nailRadius":10,
            "nailAlpha": 1
        }, {
            "nailRadius": 0,
            "radius": "80%",
            "startWidth": 6,
            "innerRadius": 0,
            "clockWiseOnly": true
        }, {
            "color": "#CC0000",
            "nailRadius": 4,
            "startWidth": 3,
            "innerRadius": 0,
            "clockWiseOnly": true,
            "nailAlpha": 1
        }]
    });
    
    // update each second
    $( document ).ready(function() {
        //setInterval(updateClock, 1000);
    });


    // update clock
    function updateClock() {
        // get current date
        var date = new Date();
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var seconds = date.getSeconds();

        // set hours
        chart.arrows[0].setValue(hours + minutes / 60);
        // set minutes
        chart.arrows[1].setValue(12 * (minutes + seconds / 60) / 60);
        // set seconds
        chart.arrows[2].setValue(12 * date.getSeconds() / 60);
    }

// Custom functions for todo starts here.
    
        var options = {
            beforeSubmit: validate_todo_add,
            success: show_response_todo_add,
            resetForm: true
        };

        $('.todo-add').submit(function () {
            $(this).ajaxSubmit(options);
            return false;
        });
    
    function validate_todo_add(formData, jqForm, options) {

        if (!jqForm[0].title.value)
        {
            return false;
        }
    }

    function show_response_todo_add(responseText, statusText, xhr, $form) {
        reload_todo_body();
    }

    function reload_todo_body()
    {

        $.ajax({
            url: '<?php echo site_url('admin/todo/reload'); ?>',
            success: function (response)
            {
                jQuery('#todo_list').html(response);
            }
        });

        $.ajax({
            url: '<?php echo site_url('admin/todo/reload_incomplete_todo'); ?>',
            success: function (response)
            {
                jQuery('#incomplete_todo_number').html(response);
            }
        });

    }
    
    function mark_as_done(todo_id)
    {
        $.ajax({
            url: '<?php echo site_url('admin/todo/mark_as_done/'); ?>' + todo_id,
            success: function ()
            {
                reload_todo_body();
            }
        });
    }
    
    function mark_as_undone(todo_id)
    {
        $.ajax({
            url: '<?php echo site_url('admin/todo/mark_as_undone/'); ?>' + todo_id,
            success: function ()
            {
                reload_todo_body();
            }
        });
    }
    
    function delete_todo(todo_id)
    {
        $.ajax({
            url: '<?php echo site_url('admin/todo/delete/'); ?>' + todo_id,
            success: function ()
            {
                reload_todo_body();
            }
        });
    }
    
    function swap(swap_with, todo_id)
    {
        $.ajax({
            url: '<?php echo site_url('admin/todo/swap/'); ?>' + todo_id + '/' + swap_with,
            success: function ()
            {
                reload_todo_body();
            }
        });
    }
    // Custom functions for todo ends here.
</script>
<!-- calling ajax form submission plugin for specific form -->
<script src="<?php echo base_url('assets/js/ajax-form-submission.js');?>"></script>
