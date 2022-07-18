<!-- Footer -->
<footer class="main">
	<?php echo $this->db->get_where('settings' , array('type' => 'system_name'))->row()->description;?> |
	<a href="http://creativeitem.com"
    	target="_blank">Creativeitem</a>
</footer>
