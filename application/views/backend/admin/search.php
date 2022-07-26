<div class="row well">
	<div class="col-md-2"></div>

	<?php echo form_open(site_url('admin/reload_search_result_body'), array('class' => 'search-form')); ?>
		<div class="col-md-7">
			<input type="text" id="search_input1" class="form-control input-lg" 
				placeholder="<?php echo get_phrase('type_something_to_search');?> ..."
				name="search_key" value="<?php echo $search_key;?>" onkeyup="submit_search_form()">
		</div>
		<div class="col-md-1">
			<button type="submit" class="btn btn-info btn-lg">
				<i class="entypo-search"></i>
			</button>
		</div>
	<?php echo form_close();?>

	<div class="col-md-2"></div>
</div>

<br>

<div class="main_data">
	<?php include 'search_result.php';?>
</div>




<script>

	function submit_search_form(){
		var search_char = $('#search_input1').val();
        var search_char_length = search_char.length;
        if (search_char_length > 2) {
          $('.search-form').submit();
        }
	}

    $(document).ready(function () {

        var options = {
        	beforeSubmit: validate_search,
            success: show_response_for_search
        };

        $('.search-form').submit(function () {
            $(this).ajaxSubmit(options);
            return false;
        });
    });
    function validate_search(formData, jqForm, options) {

        var search_char = $('#search_input1').val();
        var search_char_length = search_char.length;
        if (search_char_length < 2) {
        	toastr.error("Please enter minimum 2 characters", "Error");
            return false;
        }

    }

    function show_response_for_search(responseText, statusText, xhr, $form) {
    	jQuery('.main_data').html(responseText);
	}
</script>

