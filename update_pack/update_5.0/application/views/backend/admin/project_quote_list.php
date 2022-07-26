
<div class="row">

    <div class="col-md-12">

        <ul class="nav nav-tabs bordered"><!-- available classes "bordered", "right-aligned" -->
            <li class="active">
                <a href="#quote_list" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-user"></i></span>
                    <span class="hidden-xs"><?php echo get_phrase('quote_list'); ?></span>
                </a>
            </li>
            <li>
                <a href="#archive_list" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-home"></i></span>
                    <span class="hidden-xs"><?php echo get_phrase('archive_list'); ?></span>
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <br>

            <div class="tab-pane active" id="quote_list">

                <table class="table  table-striped datatable" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo get_phrase('title'); ?></th>
                            <th><?php echo get_phrase('client_info'); ?></th>
                            <th><?php echo get_phrase('date'); ?></th>
                            <th><?php echo get_phrase('amount'); ?></th>
                            <th><?php echo get_phrase('options'); ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $count = 1;
                        $this->db->order_by('quote_id', 'desc');
                        $quotes = $this->db->get_where('quote', array('status' => 0))->result_array();
                        foreach ($quotes as $row) {
                            ?>   
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td>
                                    <a href="<?php echo site_url('admin/project_quote_view/' . $row['quote_id']); ?>">
    <?php echo $row['title']; ?>
                                    </a>
                                </td>
                                <td>
                                    <?php
                                    if ($row['user_id'] != 0) {
                                        $name = $this->db->get_where('client', array('client_id' => $row['user_id']));
                                        if ($name->num_rows() > 0)
                                            echo $name->row()->name;
                                    }else {
                                        ?>
                                        <a class="btn btn-white tooltip-primary" data-toggle="tooltip" data-placement="top" 
                                           title="" data-original-title="<?php echo get_phrase('show_info'); ?>" 
                                           onclick="showAjaxModal('<?php echo site_url('modal/popup/view_info_public/' . $row['quote_id']);?>');" >
                                            <i class="entypo-user"></i>
                                        </a>   
                                    <?php }
                                    ?>
                                </td>
                                <td><?php echo date("d M, Y", $row['timestamp']); ?></td>
                                <td><?php echo $row['amount']; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm dropdown-toggle " data-toggle="dropdown">
                                            Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                            <!-- VIEW LINK -->
                                            <?php if($row['user_id'] != 0){ ?>
                                            <li>
                                                <a href="<?php echo site_url('admin/project_quote_view/' . $row['quote_id']); ?>">
                                                    <i class="entypo-eye"></i>
    <?php echo get_phrase('view_quote'); ?>
                                                </a>
                                            </li>
                                            <?php } ?>
                                            <!-- ARCHIVE LINK -->
                                            <li>
                                                <a href="<?php echo site_url('admin/project_quote/archive/' . $row['quote_id']); ?>">
                                                    <i class="entypo-pencil"></i>
    <?php echo get_phrase('archive'); ?>
                                                </a>
                                            </li>
                                            <li class="divider"></li>

                                            <!-- DELETION LINK -->
                                            <li>
                                                <a href="#" onclick="confirm_modal('<?php echo site_url('admin/project_quote/delete/' . $row['quote_id']); ?>', '<?php echo site_url('admin/reload_project_quote_list'); ?>');" >
                                                    <i class="entypo-trash"></i>
    <?php echo get_phrase('discard'); ?>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
<?php } ?>
                    </tbody>
                </table>

            </div>

            <div class="tab-pane" id="archive_list">

                <table class="table  table-striped datatable" id="dataTable_2">
                    <thead>
                        <tr>
                            <th></th>
                            <th><?php echo get_phrase('title'); ?></th>
                            <th><?php echo get_phrase('description'); ?></th>
                            <th><?php echo get_phrase('client'); ?></th>
                            <th><?php echo get_phrase('date'); ?></th>
                            <th><?php echo get_phrase('amount'); ?></th>
                            <th><?php echo get_phrase('options'); ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $count = 1;
                        $this->db->order_by('quote_id', 'desc');
                        $quotes = $this->db->get_where('quote', array('status' => 1))->result_array();
                        foreach ($quotes as $row) {
                            ?>   
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td>
                                    <?php
                                    if ($row['user_id'] != 0) {
                                        $name = $this->db->get_where('client', array('client_id' => $row['user_id']));
                                        if ($name->num_rows() > 0)
                                            echo $name->row()->name;
                                    }else {
                                        ?>
                                        <a class="btn btn-white tooltip-primary" data-toggle="tooltip" data-placement="top" 
                                           title="" data-original-title="<?php echo get_phrase('show_info'); ?>" 
                                           onclick="showAjaxModal('<?php echo site_url('modal/popup/view_info_public/' . $row['quote_id']);?>');" >
                                            <i class="entypo-user"></i>
                                        </a>   
                                    <?php }
                                    ?>
                                </td>
                                <td><?php echo date("d M, Y", $row['timestamp']); ?></td>
                                <td><?php echo $row['amount']; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm dropdown-toggle " data-toggle="dropdown">
                                            Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                            <!-- VIEW LINK -->
                                            <li>
                                                <a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/project_quote_view/' . $row['quote_id']); ?>');">
                                                    <i class="entypo-eye"></i>
    <?php echo get_phrase('view_quote'); ?>
                                                </a>
                                            </li>

                                            <!-- UNARCHIVE LINK -->
                                            <li>
                                                <a href="<?php echo site_url('admin/project_quote/unarchive/' . $row['quote_id']); ?>">
                                                    <i class="entypo-pencil"></i>
    <?php echo get_phrase('unarchive'); ?>
                                                </a>
                                            </li>
                                            <li class="divider"></li>

                                            <!-- DELETION LINK -->
                                            <li>
                                                <a href="#" onclick="confirm_modal('<?php echo site_url('admin/project_quote/delete/' . $row['quote_id']); ?>', '<?php echo site_url('admin/reload_project_quote_list'); ?>');" >
                                                    <i class="entypo-trash"></i>
    <?php echo get_phrase('delete'); ?>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
<?php } ?>
                    </tbody>
                </table>

            </div>

        </div>

    </div>

</div>



<script type="text/javascript">


    $(document).ready(function () {

        var $ = jQuery;

        
        // Replace Checboxes
        $(".pagination a").click(function (ev)
        {
            replaceCheckboxes();
        });
    });


    // custom function for data deletion by ajax and post refreshing call
    function delete_data(delete_url, post_refresh_url)
    {
        // showing user-friendly pre-loader image
        $('#preloader-delete').html('<img src="assets/images/preloader.gif" style="height:15px;margin-top:-10px;" />');

        // disables the delete and cancel button during deletion ajax request
        document.getElementById("delete_link").disabled = true;
        document.getElementById("delete_cancel_link").disabled = true;

        $.ajax({
            url: delete_url,
            success: function (response)
            {
                // remove the preloader 
                $('#preloader-delete').html('');

                // show deletion success msg.
                toastr.info("Data deleted successfully.", "Success");

                // hide the delete dialog box
                $('#modal_delete').modal('hide');

                // enables the delete and cancel button after deletion ajax request success
                document.getElementById("delete_link").disabled = false;
                document.getElementById("delete_cancel_link").disabled = false;

                // reload the table
                reload_data(post_refresh_url);
            }
        });
    }

// custom function for reloading table data
    function reload_data(url)
    {
        $.ajax({
            url: url,
            success: function (response)
            {
                // Replace new page data
                jQuery('.main_data').html(response);

            }
        });
    }
</script>

