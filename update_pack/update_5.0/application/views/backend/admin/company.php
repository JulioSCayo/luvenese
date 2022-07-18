<a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('modal/popup/company_add');?>');" 
    class="btn btn-primary pull-right btn-adding">
        <i class="entypo-plus-circled"></i>
        <?php echo get_phrase('add_new_company');?>
    </a>
<br><br>
<div class="main_data">
	<?php include 'company_list.php';?>
</div>