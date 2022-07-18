<?php
    $user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
?>
<?php 
$this->db->where('user' , $user);
$this->db->order_by('order' , 'asc');
$todos  =   $this->db->get('todo')->result_array();
foreach ($todos as $row):?>
    <tr>
        <td>
            <li id="todo_1" 
                style="<?php if ($row['status'] == 1):?>text-decoration: line-through;<?php endif;?>font-size: 13px; margin: 4px 0px;
                    <?php if ($row['status'] == 0):?>color: #fff;<?php endif;?>;">
                <?php echo $row['title'];?>
            </li>
        </td>
        <td style="text-align:right;">
            <div class="btn-group">
                <button type="button" class="btn btn-default btn-sm dropdown-toggle " data-toggle="dropdown"
                    style="padding:0px;background-color: #303641;border: 0px;-ms-transform: rotate(90deg); /* IE 9 */
-webkit-transform: rotate(90deg); /* Chrome, Safari, Opera */
transform: rotate(90deg);">
                    <i class="entypo-dot-2" style="color:#B4BCBE;"></i> 
                    <span class="" style="visibility:hidden; width:0px;"></span>
                </button>
                <ul class="dropdown-menu dropdown-default pull-right" role="menu" style="text-align:left;">
                    <li>
                        <?php if ($row['status'] == 0):?>
                            <a href="#" onclick="mark_as_done('<?php echo $row['todo_id'];?>');">
                                <i class="entypo-check"></i>
                                <?php echo get_phrase('mark_completed'); ?>
                            </a>
                        <?php endif;?>
                        <?php if ($row['status'] == 1):?>
                            <a href="#" onclick="mark_as_undone('<?php echo $row['todo_id'];?>');">
                                <i class="entypo-cancel"></i>
                                <?php echo get_phrase('mark_incomplete'); ?>
                            </a>
                        <?php endif;?>
                    </li>


                    <li>
                        <a href="#" onclick="swap('up', '<?php echo $row['todo_id'];?>')">
                            <i class="entypo-up"></i>
                            <?php echo get_phrase('move_up'); ?>
                        </a>
                        <a href="#" onclick="swap('down', '<?php echo $row['todo_id'];?>')">
                            <i class="entypo-down"></i>
                            <?php echo get_phrase('move_down'); ?>
                        </a>
                    </li>
                    <li class="divider"></li>


                    <li>
                        <a href="#" onclick="delete_todo('<?php echo $row['todo_id'];?>');">
                            <i class="entypo-trash"></i>
                            <?php echo get_phrase('delete'); ?>
                        </a>
                    </li>
                </ul>
            </div>
        </td>
    </tr>
<?php endforeach;?>