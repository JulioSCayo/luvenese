<div class="sidebar-menu">
    <header class="logo-env" >
        <!-- logo collapse icon -->
        <!-- <div class="sidebar-collapse" style="">
            <a href="#" class="sidebar-collapse-icon with-animation">

                <i class="entypo-menu"></i>
            </a>
        </div> -->

        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
        <div class="sidebar-mobile-menu visible-xs">
            <a href="#" class="with-animation">
                <i class="entypo-menu"></i>
            </a>
        </div>
    </header>

    <ul id="main-menu" class="">
        <!-- add class "multiple-expanded" to allow multiple submenus to open -->
        <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->

        <div style="text-align: -webkit-center;" id="branding_element">
            <img src="<?php echo base_url('assets/logo.png');?>"  style="max-height:35px;"/>
            <h4 style="color: #a2a3b7;text-align: -webkit-center;margin-bottom: 25px;font-weight: 600;
            margin-top: 10px; letter-spacing: 4px; font-size: 18px;">
                EKUSHEY<?php //echo $system_name;?>
            </h4>
        </div>

        <!-- SEARCH FORM -->
        <li id="search">
            <?php echo form_open(site_url('admin/search') , array('onsubmit' => 'return validate()')); ?>
                <input id="search_input" type="text" name="search_key" class="search-input" placeholder="Search ..."/>
                <button type="submit">
                    <i class="entypo-search"></i>
                </button>
            </form>
        </li>

        <!-- DASHBOARD -->
        <li class="<?php if ($page_name == 'dashboard') echo 'active'; ?>">
            <a href="<?php echo site_url('admin/dashboard'); ?>">
                <i class="entypo-gauge"></i>
                <span><?php echo get_phrase('dashboard'); ?></span>
            </a>
        </li>

        <!-- MANAGE CLIENTS AND COMPANY -->
        <li class="<?php if ($page_name == 'client' ||
                                $page_name == 'pending_client' ||
                                    $page_name == 'company')
                                        echo 'opened active has-sub';?>">
            <a href="#">
                <i class="entypo-trophy"></i>
                <span><?php echo get_phrase('client'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'client' ||
                                        $page_name == 'pending_client')
                                            echo 'active';?>">
                    <a href="<?php echo site_url('admin/client'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('person'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'company') echo 'active';?>">
                    <a href="<?php echo site_url('admin/company'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('company'); ?></span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- MANAGE TEAM MEMBERS -->
        <li class="<?php if ($page_name == 'staff' ||
                                $page_name == 'account_role' ||
                                    $page_name == 'admins')
                                        echo 'opened active has-sub';?>">
            <a href="#">
                <i class="entypo-users"></i>
                <span><?php echo get_phrase('team'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'admins') echo 'active';?>">
                    <a href="<?php echo site_url('admin/admins'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('admin'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'staff') echo 'active';?>">
                    <a href="<?php echo site_url('admin/staff'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('staff'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'account_role') echo 'active';?>">
                    <a href="<?php echo site_url('admin/account_role'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('permission'); ?></span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- MANAGE CLIENT PROJECTS -->

        <li class="<?php if ($page_name == 'project_add' ||
                                $page_name == 'project' ||
                                    $page_name == 'project_room' ||
                                        $page_name == 'project_quote' || $page_name == 'project_quote_view')
                                            echo 'opened active has-sub';?>">
            <a href="#">
                <i class="entypo-paper-plane"></i>
                <span><?php echo get_phrase('client_project'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'project') echo 'active';?>">
                    <a href="<?php echo site_url('admin/project'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('project_list'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'project_add') echo 'active';?>">
                    <a href="<?php echo site_url('admin/project_add'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('create_project'); ?></span>
                    </a>
                </li>
                <!-- <li class="<?php if ($page_name == 'project_quote' || $page_name == 'project_quote_view') echo 'active';?>">
                    <a href="<?php echo site_url('admin/project_quote'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('project_quote'); ?></span>
                    </a>
                </li> -->
            </ul>
        </li>

        <!-- TEAM TASKS -->
        <li class="<?php if ($page_name == 'team_task' ||
                                $page_name == 'team_task_archived' ||
                                    $page_name == 'team_task_view')
                                        echo 'opened active has-sub';?>">
            <a href="#">
                <i class="entypo-traffic-cone"></i>
                <span><?php echo get_phrase('team_task'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'team_task') echo 'active'; ?>">
                    <a href="<?php echo site_url('admin/team_task'); ?>">
                        <i class="entypo-list"></i>
                        <span><?php echo get_phrase('running_tasks'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'team_task_archived') echo 'active'; ?>">
                    <a href="<?php echo site_url('admin/team_task_archived'); ?>">
                        <i class="entypo-archive"></i>
                        <span><?php echo get_phrase('archived_tasks'); ?></span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- CALENDAR -->

        <li class="<?php if ($page_name == 'calendar') echo 'active';?>">
            <a href="<?php echo site_url('admin/calendar'); ?>">
                <i class="entypo-calendar"></i>
                <span><?php echo get_phrase('calendar'); ?></span>
            </a>
        </li>

        <!-- CALENDAR -->

        <li class="<?php if ($page_name == 'noticeboard') echo 'active';?>">
            <a href="<?php echo site_url('admin/noticeboard'); ?>">
                <i class="entypo-newspaper"></i>
                <span><?php echo get_phrase('noticeboard'); ?></span>
            </a>
        </li>

        <!-- MESSAGING -->
        <li class="<?php if ($page_name == 'message') echo 'active';?>">
            <a href="<?php echo site_url('admin/message'); ?>">
                <i class="entypo-mail"></i>
                <span><?php echo get_phrase('message'); ?></span>
            </a>
        </li>


        <!-- NOTE -->

        <li class="<?php if ($page_name == 'note') echo 'active';?>">
            <a href="<?php echo site_url('admin/note'); ?>">
                <i class="entypo-doc-text"></i>
                <span><?php echo get_phrase('note'); ?></span>
            </a>
        </li>

        <!-- ACCOUNTING -->

        <li class="<?php if ($page_name == 'accounting_client_payment' ||
                                $page_name == 'accounting_expense' ||
                                    $page_name == 'accounting_expense_category')
                                        echo 'opened active has-sub';?>">
            <a href="#">
                <i class="entypo-credit-card"></i>
                <span><?php echo get_phrase('accounting'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'accounting_client_payment') echo 'active';?>">
                    <a href="<?php echo site_url('admin/accounting_client_payment'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('client_payment'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'accounting_expense') echo 'active';?>">
                    <a href="<?php echo site_url('admin/accounting_expense'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('expense_manager'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'accounting_expense_category') echo 'active';?>">
                    <a href="<?php echo site_url('admin/accounting_expense_category'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('expense_category'); ?></span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- REPORTS -->

        <li class="<?php if ($page_name == 'report')echo 'opened active has-sub';?>">
            <a href="<?php echo base_url(); ?>index.php?">
                <i class="entypo-chart-area"></i>
                <span><?php echo get_phrase('report'); ?></span>
            </a>
            <ul>
                <li class="<?php if (isset($report_type) && $report_type == 'project') echo 'active';?>">
                    <a href="<?php echo site_url('admin/report/project'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('project_report'); ?></span>
                    </a>
                </li>
                <!-- <li class="<?php if (isset($report_type) && $report_type == 'monthly_project') echo 'active';?>">
                    <a href="<?php echo site_url('admin/report/monthly_project'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('monthly_project'); ?></span>
                    </a>
                </li> -->
                <li class="<?php if (isset($report_type) && $report_type == 'client') echo 'active';?>">
                    <a href="<?php echo site_url('admin/report/client'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('client_report'); ?></span>
                    </a>
                </li>
                <li class="<?php if (isset($report_type) && $report_type == 'expense') echo 'active';?>">
                    <a href="<?php echo site_url('admin/report/expense'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('expense_report'); ?></span>
                    </a>
                </li>
                <li class="<?php if (isset($report_type) && $report_type == 'income_expense') echo 'active';?>">
                    <a href="<?php echo site_url('admin/report/income_expense'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('income_expense_comparison'); ?></span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- SUPPORT TICKET -->

        <li class="<?php if ($page_name == 'support_ticket_create' ||
                                $page_name == 'support_ticket' ||
                                    $page_name == 'support_ticket_view'||$page_name == 'support_canned_message')
                                        echo 'opened active has-sub';?>">
            <a href="#">
                <i class="entypo-lifebuoy"></i>
                <span><?php echo get_phrase('client_support'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'support_ticket') echo 'active';?>">
                    <a href="<?php echo site_url('admin/support_ticket'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('ticket_list'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'support_ticket_create') echo 'active';?>">
                    <a href="<?php echo site_url('admin/support_ticket_create'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('create_ticket'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'support_canned_message') echo 'active';?>">
                    <a href="<?php echo site_url('admin/support_canned_message'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('macro'); ?></span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="side-nav-item <?php if ($page_name == 'addons' || $page_name == 'addon_add' || $page_name == 'available_addon'): ?> opened active has-sub <?php endif; ?>">
            <a href="javascript: void(0);" class="side-nav-link">
                <i class="entypo-chart-pie"></i>
                <span> <?php echo get_phrase('addons'); ?> </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="side-nav-second-level" aria-expanded="false">
                <li class = "<?php if($page_name == 'addons') echo 'active'; ?>" >
                    <a href="<?php echo site_url('admin/addon'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('addon_manager'); ?></a></span>
                </li>
                <li class = "<?php if($page_name == 'available_addon') echo 'active'; ?>" >
                    <a href="<?php echo site_url('admin/available_addons'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('available_addons'); ?></span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- SETTINGS -->

        <li class="<?php if ($page_name == 'system_settings' ||
                                $page_name == 'manage_language' ||
                                    $page_name == 'email_settings' ||
                                        $page_name == 'about' ||
                                            $page_name == 'payment_settings' ||
                                                $page_name == 'smtp_settings')
                                                echo 'opened active has-sub';?>">
            <a href="#">
                <i class="entypo-tools"></i>
                <span><?php echo get_phrase('settings'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'system_settings') echo 'active';?>">
                    <a href="<?php echo site_url('admin/system_settings'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('system_settings'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'email_settings') echo 'active';?>">
                    <a href="<?php echo site_url('admin/email_settings'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('email_template'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'smtp_settings') echo 'active';?>">
                    <a href="<?php echo site_url('admin/smtp_settings'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('smtp_settings'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'payment_settings') echo 'active';?>">
                    <a href="<?php echo site_url('admin/payment_settings'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('payment_settings'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'manage_language') echo 'active';?>">
                    <a href="<?php echo site_url('admin/manage_language'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('language_settings'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'about') echo 'active';?>">
                    <a href="<?php echo site_url('admin/about'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('about'); ?></span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>

</div>

<script type="text/javascript">
    function validate() {
        var search_string = $('#search_input').val();
        var search_string_length = search_string.length;
        if (search_string_length < 2) {
            toastr.error("Please enter minimum 2 characters", "Error");
            return false;
        }
    }
</script>
