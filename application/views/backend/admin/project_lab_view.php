
<?php 
$file_information	=	$this->db->get_where('project_lab' , array('project_lab_id'=>$param2))->result_array();
foreach ($file_information as $row):
?>

    <div class="alert alert-info"> 
    	<?php echo $row['description'];?>
    </div>
    
    <iframe src="http://docs.google.com/viewer?url=<?php echo site_url('uploads/project_lab/' . $row['name']);?>&embedded=true" width="100%" height="780" style="border: none;"></iframe>


<?php endforeach;?>