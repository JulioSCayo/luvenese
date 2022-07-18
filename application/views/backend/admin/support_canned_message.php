<a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('modal/popup/support_canned_message_add');?>');" 
    class="btn btn-primary pull-right btn-adding">
        <i class="entypo-user-add"></i>
        <?php echo get_phrase('add_support_canned_message');?>
</a>
<div class="main_data" style="margin-top: 15px;">
	<?php include 'support_canned_message_list.php';?>
</div>