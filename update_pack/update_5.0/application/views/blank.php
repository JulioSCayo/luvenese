<div class="panel panel-primary" id="charts_env">
	<div class="panel-heading">
		<div class="panel-title">
			<i class="entypo-chart-bar"></i>
			<?php echo get_phrase('');?>
		</div>
	</div>
	<div class="panel-body" >
		
	</div>
</div>

btn-adding

<script type="text/javascript">
    jQuery(document).ready(function ($)
    {
        var datatable = $("#dataTable").dataTable({
            "sPaginationType": "bootstrap",
            "aoColumns": [
                {"bSortable": false},
                null,
                null,
                null,
                null,
                null
            ],
            aLengthMenu: [
                [-1, 25, 50, 100, 200],
                ["All", 25, 50, 100, 200]
            ],
        });

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });

    });





    jQuery(document).ready(function($)
	{
		//convert all checkboxes before converting datatable
		replaceCheckboxes();
		var datatable = $("#table_export").dataTable({
			"sPaginationType": "bootstrap",
			"aoColumns": [
				{ "bSortable": false },
				null,
				null,
				null,
				null
			],
			
			
		});
		
		// Highlighted rows
		$("#table_export tbody input[type=checkbox]").each(function(i, el)
		{
			var $this = $(el),
				$p = $this.closest('tr');
			
			$(el).on('change', function()
			{
				var is_checked = $this.is(':checked');
				
				$p[is_checked ? 'addClass' : 'removeClass']('highlight');
			});
		});
		
		//customize the select menu 
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
		
		

		
	});
</script>
