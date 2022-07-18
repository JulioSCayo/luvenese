<a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('modal/popup/staff_add');?>');" 
    class="btn btn-primary pull-right btn-adding">
        <i class="entypo-user-add"></i>
        <?php echo get_phrase('add_new_staff');?>
    </a>
     
<br><br>

<div class="main_data">
	<?php include 'staff_list.php';?>
</div>