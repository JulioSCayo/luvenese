<?php
$info = $this->db->get_where('quote',array('quote_id' => $param2))->result_array();
foreach ($info as $row):
?>
<table class="table table-striped">
     <tbody>
                <tr>
                    <td >
                        <i class="entypo-dot"></i> &nbsp;
                        <?php echo get_phrase('name');?>
                    </td>
                    <td>
                        <b>
                            <?php 
                               echo $row['name'];
                            ?>
                        </b>
                    </td>
                </tr>
                <tr>
                    <td >
                        <i class="entypo-dot"></i> &nbsp;
                        <?php echo get_phrase('email');?>
                    </td>
                    <td>
                        <b>
                            <?php 
                               echo $row['email'];
                            ?>
                        </b>
                    </td>
                </tr>
                <tr>
                    <td >
                        <i class="entypo-dot"></i> &nbsp;
                        <?php echo get_phrase('phone');?>
                    </td>
                    <td>
                        <b>
                            <?php 
                               echo $row['phone'];
                            ?>
                        </b>
                    </td>
                </tr>
     </tbody>
    
</table>

<?php endforeach; ?>