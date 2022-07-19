<?php



$historia_clinica = $this->db->get_where('project_historia_clinica', array('project_historia_clinica_id' => $param2))->result_array();

foreach ($historia_clinica as $row):

    ?>



    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">

                    <div class="panel-title" >

                        <i class="entypo-plus-circled"></i>

                        <?php echo $row['title']; ?>

                    </div>

                </div>

                <div class="panel-body">

                    <p>
                        <i class="entypo-user" style="color: #ccc;"></i>
                        <?php
                            // $type = $row['user_type'];
                            // $id = $row['user_id'];
                            // $name = $this->db->get_where($type, array($type . '_id' => $id))->row()->name;

                            echo $row['nombre_completo'];
                        ?>
                    </p>

                    <p>
                        <i class="entypo-calendar" style="color: #ccc;"></i>

                        <?php echo date("d M Y", $row['timestamp']); ?>
                    </p>

                    <p>
                        <i class="entypo-vcard" style="color: #ccc;"></i>

                        <?php
                            $assigned_staffs = $this->db->get_where('project', array('project_code' => $param3))->row()->staffs;
                            $staffs = ( explode(',', $assigned_staffs));
                            $number_of_staffs = count($staffs) - 1;
                            if($row['assigned_staff']) {
                                if ($number_of_staffs > 0):
                                    for ($i = 0; $i < $number_of_staffs; $i++):
                                        $staff_data = $this->db->get_where('staff', array('staff_id' => $staffs[$i]))->result_array();
                                        foreach ($staff_data as $row2):
                                            if($row2['staff_id'] == $row['assigned_staff']) echo "Staff asignado: " . $row2['name'];
                                        endforeach;
                                    endfor;
                                endif;
                            }
                            else {
                                echo "Sin staff asignado";
                            }
                        ?>
                    </p>

                    <hr/>

                    <p><strong>Motivo de consulta</strong></p>      
                    <p><?php echo $row['motivo_consulta']; ?></p>

                </div>

            </div>

        </div>
    </div>



<?php endforeach; ?>