<!DOCTYPE html>
 <?php include 'modal.php'; ?>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?php
        $system_name = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
        $system_title = $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;
        ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Neon Admin Panel" />
        <meta name="author" content="" />

        <link rel="icon" href="assets/images/favicon.ico">

        <title><?php echo get_phrase('project_quote'); ?> | <?php echo $system_title; ?></title>

        <link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
        <link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/neon-core.css">
        <link rel="stylesheet" href="assets/css/neon-theme.css">
        <link rel="stylesheet" href="assets/css/neon-forms.css">
        <link rel="stylesheet" href="assets/css/custom.css">

        <script src="assets/js/jquery-1.11.3.min.js"></script>

        <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript">
            var baseurl = '<?php echo base_url(); ?>';
        </script>

    </head>
    <body class="page-body" data-url="http://neon.dev">

        <div class="page-container horizontal-menu">


            <header class="navbar navbar-fixed-top"><!-- set fixed position by adding class "navbar-fixed-top" -->

                <div class="navbar-inner">

                    <!-- logo -->
                    <div class="navbar-brand">
                        <a href="<?php echo base_url(); ?>" class="logo">
                            <img src="assets/images/logo.png" height="30" alt="" />
                        </a>
                    </div>


                    <!-- main menu -->



                    <!-- notifications and other links -->
                    <ul class="nav navbar-right pull-right">



                        <li>
                            <a href="<?php echo base_url(); ?>">
                                Login <i class="entypo-logout right"></i>
                            </a>
                        </li>


                        <!-- mobile only -->


                    </ul>

                </div>

            </header>
            <div class="main-content">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">



                            <h2>Project Quote</h2>

                            <br />
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-primary" data-collapsed="0">
                                        <div class="panel-heading">
                                            <div class="panel-title" >
                                                <i class="entypo-plus-circled"></i>
                                                <?php echo get_phrase('add_project_quote'); ?>
                                            </div>
                                        </div>
                                        <div class="panel-body">

                                            <?php echo form_open(base_url() . 'index.php?login/project_quote/create/', array('class' => 'form-horizontal form-groups-bordered validate quote-add', 'enctype' => 'multipart/form-data')); ?>

                                            <div class="form-group">
                                                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('name'); ?></label>

                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('email'); ?></label>

                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="email" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('phone'); ?></label>

                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="phone" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('title'); ?></label>

                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="title" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('description'); ?></label>

                                                <div class="col-sm-7">
                                                    <textarea name="description" class="form-control wysihtml5" id="field-ta" data-stylesheet-url="assets/css/wysihtml5-color.css"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('date'); ?></label>

                                                <div class="col-sm-7">
                                                    <div class="date">
                                                        <input type="text" name="timestamp" class="form-control datepicker" data-format="D, dd MM yyyy" placeholder="date here">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('amount'); ?></label>

                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="amount" value="">
                                                </div> 
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="field-2" class="col-sm-3 control-label"><?php echo (isset($question)) ? $question : ''; ?></label>
                                                    <div class="col-sm-7">

                                                        <input type="text" name="ans" value="" class="form-control agent-form-answer-input">

                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <input type="hidden" name="answer" value="<?php echo $this->session->userdata('security_ans') ?>"
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



                       


                            <!-- Footer -->
                            <footer class="main">

                                &copy; 2015 <strong>Neon</strong>  <a href="http://creativeitem.com" target="_blank">Creativeitem</a>

                            </footer>
                        </div>
                    </div>
                </div>
            </div>


        

        <link rel="stylesheet" href="assets/js/daterangepicker/daterangepicker-bs3.css">

        <!-- Bottom scripts (common) -->
        <script src="assets/js/toastr.js"></script>
        <script src="assets/js/gsap/TweenMax.min.js"></script>
        <script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
        <script src="assets/js/bootstrap.js"></script>
        <script src="assets/js/joinable.js"></script>
        <script src="assets/js/resizeable.js"></script>
        <script src="assets/js/neon-api.js"></script>
        <script src="assets/js/daterangepicker/moment.min.js"></script>
        <script src="assets/js/daterangepicker/daterangepicker.js"></script>

        <!-- Imported scripts on this page -->
        <script src="assets/js/neon-chat.js"></script>


        <!-- JavaScripts initializations and stuff -->
        <script src="assets/js/neon-custom.js"></script>


        <!-- Demo Settings -->
        <script src="assets/js/neon-demo.js"></script>

    </body>
</html>
<script type="text/javascript">
    
    // Datepicker
        if($.isFunction($.fn.datepicker))
        {
            $(".datepicker").each(function(i, el)
            {
                var $this = $(el),
                    opts = {
                        format: attrDefault($this, 'format', 'mm/dd/yyyy'),
                        startDate: attrDefault($this, 'startDate', ''),
                        endDate: attrDefault($this, 'endDate', ''),
                        daysOfWeekDisabled: attrDefault($this, 'disabledDays', ''),
                        startView: attrDefault($this, 'startView', 0),
                        rtl: rtl()
                    },
                    $n = $this.next(),
                    $p = $this.prev();
                                
                $this.datepicker(opts);
                
                if($n.is('.input-group-addon') && $n.has('a'))
                {
                    $n.on('click', function(ev)
                    {
                        ev.preventDefault();
                        
                        $this.datepicker('show');
                    });
                }
                
                if($p.is('.input-group-addon') && $p.has('a'))
                {
                    $p.on('click', function(ev)
                    {
                        ev.preventDefault();
                        
                        $this.datepicker('show');
                    });
                }
            });
        }
</script>   
<?php if (($this->session->flashdata('flash_message')) != ""): ?>
    <script type="text/javascript">
        toastr.info("<?php echo $this->session->flashdata('flash_message'); ?>");
    </script>
<?php endif; ?>
     
    
    