<?php
$current_project = $this->db->get_where('project' , array('project_code' => $project_code))->result_array();
foreach ($current_project as $row): ?>

    <div class="col-md-10" style="padding: 0px;">

        <div class="col-md-4">
            <div class="tile-title tile-cyan">
                <div class="icon">
                    <i class="entypo-users" style="font-size:40px;"></i>
                </div>
                <div class="title">
                    <?php
                    $staffs = ( explode(',', $row['staffs']));
                    $number_of_staffs = count($staffs) - 1;
                    ?>
                    <h3 style="font-weight:200;"><?php echo get_phrase('staffs_working') . ' : ' . $number_of_staffs; ?></h3>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="tile-title tile-red">
                <div class="icon">
                    <i class="fa fa-money" style="font-size:40px;"></i>
                </div>
                <div class="title">
                    <h3 style="font-weight:200;">
                        <?php
                        $total_paid_amount  = 0;
                        $project_payments   = $this->db->get_where('payment', array('project_code' => $project_code, 'type' => 'income'))->result_array();

                        foreach($project_payments as $row2)
                            $total_paid_amount += $row2['amount'];
                        ?>
                        <?php echo get_phrase('total_amount_paid') . ' : ' . $total_paid_amount; ?>
                    </h3>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="tile-title tile-blue">
                <div class="icon">
                    <i class="entypo-credit-card" style="font-size:40px;"></i>
                </div>
                <div class="title">
                    <h3 style="font-weight:200;">
                        <?php echo get_phrase('unpaid_invoices') . ' : ';?>
                        <?php echo $this->db->get_where('project_milestone', array('project_code' => $project_code, 'status' => 0))->num_rows();?>
                    </h3>
                    <p></p>
                </div>
            </div>
        </div>

        <div class="col-md-8" style="margin-top: 20px;">

            <div class="panel panel-primary main_data">
                <div class="panel-heading">
                    <div class="panel-title"><?php echo get_phrase('pending_tasks'); ?></div>

                </div>

                <table class="table  table-responsive">
                    <thead>
                        <tr>
                            <th><?php echo get_phrase('title'); ?></th>
                            <th><?php echo get_phrase('assigned_staff'); ?></th>
                            <th><?php echo get_phrase('start_date'); ?></th>
                            <th><?php echo get_phrase('end_date'); ?></th>
                            <th><?php echo get_phrase('status'); ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $this->db->order_by('project_task_id', 'desc');
                        $bug = $this->db->get_where('project_task', array('project_id' => $row['project_id'], 'complete_status' => 0))->result_array();
                        foreach ($bug as $row1):
                            ?>
                            <tr>
                                <td>
                                  <a href="<?php echo site_url('admin/projectroom/task/' . $project_code);?>">
                                    <?php echo $row1['title']; ?>
                                  </a>
                                </td>
                                <td>
                                    <?php
                                    $staff = $this->db->get_where('staff',array('staff_id' => $row1['staff_id']));
                                    if($staff->num_rows()>0)
                                        echo $staff->row()->name;
                                    ?>
                                </td>
                                <td style="width: 20%"><?php echo date('d M Y', $row1['timestamp_start']); ?></td>
                                <td style="width: 20%"><?php echo date('d M Y', $row1['timestamp_end']); ?></td>
                                <td>
                                    <?php if ($row1['complete_status'] == 0):?>
                                        <div class="label label-danger">
                                            <?php echo get_phrase('incomplete');?>
                                        </div>
                                    <?php endif;?>
                                    <?php if ($row1['status'] == 1):?>
                                        <div class="label label-success">
                                            <?php echo get_phrase('complete');?>
                                        </div>
                                    <?php endif;?>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

            <div class="panel panel-primary main_data" style="margin-top: 10px;">
                <div class="panel-heading">
                    <div class="panel-title"><?php echo get_phrase('pending_bugs/Issues'); ?></div>

                </div>

                <table class="table  table-responsive">
                    <thead>
                        <tr>
                            <th><?php echo get_phrase('title'); ?></th>
                            <th><?php echo get_phrase('posted_by'); ?></th>
                            <th><?php echo get_phrase('date_posted'); ?></th>
                            <th><?php echo get_phrase('assigned_staff'); ?></th>
                            <th><?php echo get_phrase('status'); ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $this->db->order_by('project_bug_id', 'desc');
                        $bug = $this->db->get_where('project_bug', array('project_code' => $project_code, 'status' => 0))->result_array();
                        foreach ($bug as $row1):
                            ?>
                            <tr>
                                <td>
                                  <a href="<?php echo site_url('admin/projectroom/bug/' . $project_code);?>">
                                    <?php echo $row1['title']; ?>
                                  </a>
                                </td>
                                <td style="width: 20%">
                                    <?php
                                    $type = $row1['user_type'];
                                    $id = $row1['user_id'];
                                    $name = $this->db->get_where($type, array($type . '_id' => $id))->row()->name;
                                    echo $name;
                                    ?>
                                </td>
                                <td style="width: 20%"><?php echo date('d M Y', $row1['timestamp']); ?></td>
                                <td>
                                    <?php
                                    $staff = $this->db->get_where('staff',array('staff_id'=>$row1['assigned_staff']));
                                    if($staff->num_rows()>0)
                                        echo $staff->row()->name;
                                    ?>
                                </td>
                                <td>
                                    <?php if ($row1['status'] == 0):?>
                                        <div class="label label-danger">
                                            <?php echo get_phrase('pending');?>
                                        </div>
                                    <?php endif;?>
                                    <?php if ($row1['status'] == 1):?>
                                        <div class="label label-success">
                                            <?php echo get_phrase('solved');?>
                                        </div>
                                    <?php endif;?>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

            <?php
              // calculate total expense for this project_code
              $sum = 0;
              $query = array('project_code' => $project_code, 'type' => 'expense');
              $expenses = $this->db->get_where('payment', $query)->result_array();
              foreach ($expenses as $expense) {
                $sum += $expense['amount'];
              }
            ?>
            <a href="<?php echo site_url('admin/projectroom/expense/' . $project_code);?>">
              <div class="alert alert-info" style="text-align: center;">
                <strong><?php echo get_phrase('total_project_expense');?> : <?php echo $this->crud_model->get_currency().''.$sum;?></strong>
              </div>
            </a>

        </div>

        <div class="col-md-4">
            <!-- staff -->
            <?php
            $staffs = ( explode(',', $row['staffs']));
            $number_of_staffs = count($staffs) - 1;
            ?>
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        <i class="entypo-users"></i> Assigned staff
                    </div>
                </div>
                <div class="panel-body">
                     <?php
                        if ($number_of_staffs < 1):
                            ?>

                            <center>
                                <?php echo get_phrase('no_staff_assigned_yet');?>
                            </center>
                        <?php endif; ?>
                    <?php
                        if ($number_of_staffs > 0):
                            for ($i = 0; $i < $number_of_staffs; $i++):
                                $staff_data = $this->db->get_where('staff', array('staff_id' => $staffs[$i]))->result_array();
                                foreach ($staff_data as $row2):
                                    ?>
                                    <table width="100%" border="0">
                                        <tr>
                                            <td rowspan="2" width="60">
                                                <img src="<?php echo $this->crud_model->get_image_url('staff', $row2['staff_id']); ?>"
                                                     alt="" class="img-circle" width="44">
                                            </td>
                                            <td>
                                                <h4 style="font-weight: 200;"><?php echo $row2['name']; ?></h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?php if ($row2['skype_id'] != ''): ?>
                                                    <a class="tooltip-primary" data-toggle="tooltip" data-placement="top"
                                                       data-original-title="<?php echo get_phrase('call_skype'); ?>"
                                                       href="skype:<?php echo $row2['skype_id']; ?>?chat" style="color:#bbb;">
                                                        <i class="entypo-skype"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if ($row2['email'] != ''): ?>
                                                    <a class="tooltip-primary" data-toggle="tooltip" data-placement="top"
                                                       data-original-title="<?php echo get_phrase('send_email'); ?>"
                                                       href="mailto:<?php echo $row2['email']; ?>" style="color:#bbb;">
                                                        <i class="entypo-mail"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if ($row2['phone'] != ''): ?>
                                                    <a class="tooltip-primary" data-toggle="tooltip" data-placement="top"
                                                       data-original-title="<?php echo get_phrase('call_phone'); ?>"
                                                       href="tel:<?php echo $row2['phone']; ?>" style="color:#bbb;">
                                                        <i class="entypo-phone"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if ($row2['facebook_profile_link'] != ''): ?>
                                                    <a class="tooltip-primary" data-toggle="tooltip" data-placement="top"
                                                       data-original-title="<?php echo get_phrase('facebook_profile'); ?>"
                                                       href="<?php echo $row2['facebook_profile_link']; ?>" style="color:#bbb;" target="_blank">
                                                        <i class="entypo-facebook"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if ($row2['twitter_profile_link'] != ''): ?>
                                                    <a class="tooltip-primary" data-toggle="tooltip" data-placement="top"
                                                       data-original-title="<?php echo get_phrase('twitter_profile'); ?>"
                                                       href="<?php echo $row2['twitter_profile_link']; ?>" style="color:#bbb;" target="_blank">
                                                        <i class="entypo-twitter"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if ($row2['linkedin_profile_link'] != ''): ?>
                                                    <a class="tooltip-primary" data-toggle="tooltip" data-placement="top"
                                                       data-original-title="<?php echo get_phrase('linkedin_profile'); ?>"
                                                       href="<?php echo $row2['linkedin_profile_link']; ?>" style="color:#bbb;" target="_blank">
                                                        <i class="entypo-linkedin"></i>
                                                    </a>
                                                <?php endif; ?>

                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                    <?php
                                endforeach;
                            endfor;
                        endif;
                        ?>
                </div>
            </div>

            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        <i class="entypo-gauge"></i>
                        <?php echo get_phrase('project_completion') . ' : ' . $row['progress_status'] . '%'; ?>
                    </div>
                </div>
                <div class="panel-body">
                    <?php
                    $status = 'info';
                    if ($row['progress_status'] == 100)
                        $status = 'success';
                    if ($row['progress_status'] < 50)
                        $status = 'danger';
                    ?>

                    <div class="progress progress-striped <?php if ($row['progress_status'] != 100) echo 'active'; ?> tooltip-primary"
                         style="height:10px !important; cursor:pointer;"  data-toggle="tooltip"  data-placement="top"
                         title="" data-original-title="<?php echo $row['progress_status']; ?>% completed" >
                        <div class="progress-bar progress-bar-<?php echo $status; ?>"
                             role="progressbar" aria-valuenow="<?php echo $row['progress_status']; ?>"
                             aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $row['progress_status']; ?>%">
                            <span class="sr-only">40% Complete (success)</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <?php endforeach; ?>
