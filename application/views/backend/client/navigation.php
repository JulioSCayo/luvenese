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
            <a href="<?php echo site_url('client/dashboard'); ?>">
                <i class="entypo-gauge"></i>
                <span><?php echo get_phrase('dashboard'); ?></span>
            </a>
        </li>

        <!-- MANAGE PROJECTS -->
        <li class="<?php if ($page_name == 'project') echo 'active'; ?>">
            <a href="<?php echo site_url('client/project'); ?>">
                <i class="entypo-list"></i>
                <span><?php echo get_phrase('project_list'); ?></span>
            </a>
        </li>
        
        <!-- PAYMENT HISTORY -->

        <li class="<?php if ($page_name == 'payment_history') echo 'active';?>">
            <a href="<?php echo site_url('client/payment_history'); ?>">
                <i class="entypo-credit-card"></i>
                <span><?php echo get_phrase('payment_history'); ?></span>
            </a>
        </li>

        <!-- NOTEs -->

        <li class="<?php if ($page_name == 'note') echo 'active';?>">
            <a href="<?php echo site_url('client/note'); ?>">
                <i class="entypo-doc-text"></i>
                <span><?php echo get_phrase('note'); ?></span>
            </a>
        </li>

        <li class="<?php if ($page_name == 'noticeboard') echo 'active';?>">
            <a href="<?php echo site_url('client/noticeboard'); ?>">
                <i class="entypo-newspaper"></i>
                <span><?php echo get_phrase('noticeboard'); ?></span>
            </a>
        </li>

        <!-- MESSAGE -->

        <li class="<?php if ($page_name == 'message') echo 'active';?>">
            <a href="<?php echo site_url('client/message'); ?>">
                <i class="entypo-mail"></i>
                <span><?php echo get_phrase('message'); ?></span>
            </a>
        </li>

        <!-- SUPPORT TICKET -->

        <li class="<?php if ($page_name == 'support_ticket_create' ||
                                $page_name == 'support_ticket' ||
                                    $page_name == 'support_ticket_view')
                                        echo 'opened active has-sub';?>">
            <a href="#">
                <i class="entypo-lifebuoy"></i>
                <span><?php echo get_phrase('support'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'support_ticket') echo 'active';?>">
                    <a href="<?php echo site_url('client/support_ticket'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('ticket_list'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'support_ticket_create') echo 'active';?>">
                    <a href="<?php echo site_url('client/support_ticket_create'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('create_ticket'); ?></span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- ACCOUNT -->

        <li class="<?php if ($page_name == 'manage_profile') echo 'active';?>">
            <a href="<?php echo site_url('client/manage_profile'); ?>">
                <i class="entypo-lock"></i>
                <span><?php echo get_phrase('account'); ?></span>
            </a>
        </li>

    </ul>

</div>
