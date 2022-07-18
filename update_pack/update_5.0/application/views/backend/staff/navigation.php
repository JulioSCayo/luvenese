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

        <!-- DASHBOARD -->
        <li class="<?php if ($page_name == 'dashboard') echo 'active'; ?>">
            <a href="<?php echo site_url('staff/dashboard'); ?>">
                <i class="entypo-gauge"></i>
                <span><?php echo get_phrase('dashboard'); ?></span>
            </a>
        </li>

        <?php if ($this->crud_model->staff_permission(3)):?>
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
                        <a href="<?php echo site_url('staff/client'); ?>">
                            <i class="entypo-dot"></i>
                            <span><?php echo get_phrase('person'); ?></span>
                        </a>
                    </li>
                    <li class="<?php if ($page_name == 'company') echo 'active';?>">
                        <a href="<?php echo site_url('staff/company'); ?>">
                            <i class="entypo-dot"></i>
                            <span><?php echo get_phrase('company'); ?></span>
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif;?>


        <?php if ($this->crud_model->staff_permission(4)):?>
            <!-- MANAGE TEAM MEMBERS -->
            <li class="<?php if ($page_name == 'staff' ||
                                    $page_name == 'account_role')
                                        echo 'opened active has-sub';?>">
                <a href="#">
                    <i class="entypo-users"></i>
                    <span><?php echo get_phrase('team'); ?></span>
                </a>
                <ul>
                    <li class="<?php if ($page_name == 'staff') echo 'active';?>">
                        <a href="<?php echo site_url('staff/staff'); ?>">
                            <i class="entypo-dot"></i>
                            <span><?php echo get_phrase('staff'); ?></span>
                        </a>
                    </li>
                    <li class="<?php if ($page_name == 'account_role') echo 'active';?>">
                        <a href="<?php echo site_url('staff/account_role'); ?>">
                            <i class="entypo-dot"></i>
                            <span><?php echo get_phrase('permission'); ?></span>
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif;?>

        <?php if ($this->crud_model->staff_permission(2)):?>
            <!-- ALL CLIENT PROJECTS -->
            <li class="<?php if ($page_name == 'project' || $page_name == 'project_room') echo 'active'; ?>">
                <a href="<?php echo site_url('staff/project'); ?>">
                    <i class="entypo-paper-plane"></i>
                    <span><?php echo get_phrase('all_client_projects'); ?></span>
                </a>
            </li>
        <?php else: ?>
            <?php if ($this->crud_model->staff_permission(1)):?>
                <!-- ASSIGNED CLIENT PROJECT -->
                <li class="<?php if ($page_name == 'project' || $page_name == 'project_room') echo 'active'; ?>">
                    <a href="<?php echo site_url('staff/project'); ?>">
                        <i class="entypo-paper-plane"></i>
                        <span><?php echo get_phrase('assigned_client_projects'); ?></span>
                    </a>
                </li>
            <?php endif;?>
        <?php endif; ?>

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
                    <a href="<?php echo site_url('staff/team_task'); ?>">
                        <i class="entypo-list"></i>
                        <span><?php echo get_phrase('running_tasks'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'team_task_archived') echo 'active'; ?>">
                    <a href="<?php echo site_url('staff/team_task_archived'); ?>">
                        <i class="entypo-archive"></i>
                        <span><?php echo get_phrase('archived_tasks'); ?></span>
                    </a>
                </li>
            </ul>
        </li>


        <li class="<?php if($page_name == 'noticeboard')echo 'active';?>">
            <a href="<?php echo site_url('staff/noticeboard'); ?>">
                <i class="entypo-newspaper"></i>
                <span><?php echo get_phrase('noticeboard'); ?></span>
            </a>
        </li>

        <!-- MESSAGE -->
        <li class="<?php if($page_name == 'message')echo 'active';?>">
            <a href="<?php echo site_url('staff/message'); ?>">
                <i class="entypo-mail"></i>
                <span><?php echo get_phrase('message'); ?></span>
            </a>
        </li>

        <!-- NOTE -->

        <li class="<?php if ($page_name == 'note') echo 'active';?>">
            <a href="<?php echo site_url('staff/note'); ?>">
                <i class="entypo-doc-text"></i>
                <span><?php echo get_phrase('note'); ?></span>
            </a>
        </li>

        <?php if ($this->crud_model->staff_permission(5)):?>
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
                        <a href="<?php echo site_url('staff/accounting_client_payment'); ?>">
                            <i class="entypo-dot"></i>
                            <span><?php echo get_phrase('client_payment'); ?></span>
                        </a>
                    </li>
                    <li class="<?php if ($page_name == 'accounting_expense') echo 'active';?>">
                        <a href="<?php echo site_url('staff/accounting_expense'); ?>">
                            <i class="entypo-dot"></i>
                            <span><?php echo get_phrase('expense_management'); ?></span>
                        </a>
                    </li>
                    <li class="<?php if ($page_name == 'accounting_expense_category') echo 'active';?>">
                        <a href="<?php echo site_url('staff/accounting_expense_category'); ?>">
                            <i class="entypo-dot"></i>
                            <span><?php echo get_phrase('expense_category'); ?></span>
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif;?>

        <?php if ($this->crud_model->staff_permission(7)):?>
            <!-- ALL SUPPORT TICKETS -->
            <li class="<?php if($page_name == 'support_ticket' || $page_name == 'support_ticket_view')echo 'active';?>">
                <a href="<?php echo site_url('staff/support_ticket'); ?>">
                    <i class="entypo-lifebuoy"></i>
                    <span><?php echo get_phrase('all_support_tickets'); ?></span>
                </a>
            </li>
        <?php else:?>
            <?php if ($this->crud_model->staff_permission(6)):?>
                <!-- ASSIGNED SUPPORT TICKETS -->
                <li class="<?php if($page_name == 'support_ticket' || $page_name == 'support_ticket_view')echo 'active';?>">
                    <a href="<?php echo site_url('staff/support_ticket'); ?>">
                        <i class="entypo-lifebuoy"></i>
                        <span><?php echo get_phrase('assigned_support_tickets'); ?></span>
                    </a>
                </li>
            <?php endif;?>
        <?php endif;?>


        <!-- ACCOUNT -->
       <li class="<?php if($page_name == 'manage_profile')echo 'active';?> ">
            <a href="<?php echo site_url('staff/manage_profile'); ?>">
                <i class="entypo-lock"></i>
                <span><?php echo get_phrase('account');?></span>
            </a>
       </li>





    </ul>

</div>
