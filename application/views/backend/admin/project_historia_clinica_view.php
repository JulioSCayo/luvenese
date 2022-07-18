<?php



$historia_clinica = $this->db->get_where('project_historia_clinica', array('project_historia_clinica_id' => $param2))->result_array();

foreach ($historia_clinica as $row):

    ?>



    <div class="row">

        <div class="col-md-12">

            <blockquote class="blockquote-default">

                <p>

                    <strong><?php echo $row['title']; ?></strong>

                </p>

                <p>

                    <small><?php echo $row['motivo_consulta']; ?></small>


                <hr />



                <i class="entypo-user" style="color: #ccc;"></i>

                <?php

                $type = $row['user_type'];

                $id = $row['user_id'];

                $name = $this->db->get_where($type, array($type . '_id' => $id))->row()->name;

                echo $name;

                ?>

                &nbsp;

                &nbsp;

                <i class="entypo-calendar" style="color: #ccc;"></i>

    <?php echo date("d M Y", $row['timestamp']); ?>

                &nbsp;

                &nbsp;

                

                </p>



            </blockquote>



        </div>

    </div>



<?php endforeach; ?>