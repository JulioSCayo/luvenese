<?php
	$is_owner = $this->db->get_where('admin' , array(
		'admin_id' => $this->session->userdata('login_user_id')
	))->row()->owner_status; 
	if ($is_owner == 1):
?>
<a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('modal/popup/admin_add');?>');" 
    class="btn btn-primary pull-right btn-adding">
        <i class="entypo-user-add"></i>
        <?php echo get_phrase('add_new_admin');?>
    </a>
     
<br><br>
<?php endif;?>

<div class="main_data">
	<?php include 'admin_list.php';?>
</div>