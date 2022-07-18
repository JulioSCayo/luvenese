
<div class="row">

	<div class="col-sm-3">
		<div class="tile-title tile-blue">
			<div class="icon">
				<i class="entypo-thumbs-up" style="font-size:40px;"></i>
			</div>
			<div class="title">
				<h3 style="font-weight:400;"><?php echo $this->db->get('client')->num_rows();?> <?php echo get_phrase('total_client');?></h3>
				<p></p>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="tile-title tile-cyan">
			<div class="icon">
				<i class="entypo-user" style="font-size:40px;"></i>
			</div>
			<div class="title">
				<h3 style="font-weight:400;"><?php echo $this->db->get('staff')->num_rows();?> <?php echo get_phrase('team_member');?></h3>
				<p></p>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="tile-title tile-orange">
			<div class="icon">
				<i class="entypo-credit-card" style="font-size:40px;"></i>
			</div>
			<div class="title">
				<h3 style="font-weight:400;"><?php echo $this->db->get_where('project_milestone',array('status'=>0))->num_rows();?>
					<?php echo get_phrase('pending_invoice');?></h3>
				<p></p>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="tile-title tile-red">
			<div class="icon">
				<i class="entypo-bell" style="font-size:40px;"></i>
			</div>
			<div class="title">
				<h3 style="font-weight:400;"><?php echo $this->db->get_where('ticket',array('status'=>'opened'))->num_rows();?>
					 <?php echo get_phrase('opened_support_ticket');?></h3>
				<p></p>
			</div>
		</div>
	</div>
</div>

<div class="row">

	<!-- stats-->
	<div class="col-sm-4">

		<div class="tile-stats tile-white tile-white-primary" style="padding:30px 20px; box-shadow: 0 0 13px 0 rgba(82,63,105,.05);">
			<div class="icon" style="bottom:40px;"><i class="entypo-paper-plane"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $this->db->get_where('project',array('project_status'=>1))->num_rows();?> "
				data-duration="500" data-delay="0" style="font-weight:200;"></div>
			<h3 style="font-weight:400; font-size: 14px;"><?php echo get_phrase('running_project');?></h3>
		</div>
		<div class="tile-stats tile-white tile-white-primary" style="padding:30px 20px; box-shadow: 0 0 13px 0 rgba(82,63,105,.05);">
			<div class="icon" style="bottom:40px;"><i class="entypo-megaphone"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $this->db->get_where('team_task',array('task_status'=>1))->num_rows();?>"
				data-duration="500" data-delay="0" style="font-weight:200;"></div>
			<h3 style="font-weight:400; font-size: 14px;"><?php echo get_phrase('pending_team_task');?></h3>
		</div>
	</div>
	<!-- charts-->

	<div class="col-sm-8">

		<div class="panel panel-primary" id="charts_env">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="entypo-chart-bar"></i>
					<?php echo get_phrase('income_graph');?> (last 30 days)
				</div>
			</div>

			<div class="panel-body" >
				<div id="bar_chartdiv" style="width: 100%; height: 200px;"></div>
				<center><?php echo get_phrase('projects');?></center>
				<!--<div id="line-chart-demo" class="morrischart" style="height: 200px"></div>-->
			</div>
		</div>
	</div>


</div>



<?php
	$timestamp_start=	strtotime('-29 days', time());
	$timestamp_end	=	strtotime(date("m/d/Y"));
	$total_expense	=	0;
	$total_income	=	0;
	$this->db->order_by('timestamp' , 'desc');

	$this->db->where('timestamp >=' , $timestamp_start);
	$this->db->where('timestamp <=' , $timestamp_end);
	$payments	=	$this->db->get('payment')->result_array();
	foreach ($payments as $row):

		if ( $row['type'] == 'income' ) {
			$total_income	+=	$row['amount'];
		} else if ( $row['type'] == 'expense' ) {
			$total_expense	+=	$row['amount'];
		}
?>

	<?php endforeach;?>
<script>
var chart = AmCharts.makeChart("bar_chartdiv", {
    "theme": "none",
    "type": "serial",
	"startDuration": 2,
    "dataProvider": [
	<?php
		//$this->db->select_sum('amount');
		//$this->db->group_by('project_code');
		//$this->db->order_by('timestamp' , 'desc');
		//$this->db->select('timestamp, project_code, payment_method');
		$this->db->where('type' , 'income');
		$this->db->where('timestamp >=' , $timestamp_start);
		$this->db->where('timestamp <=' , $timestamp_end);
		$payments	=	$this->db->get('payment')->result_array();
		foreach ($payments as $row):
			?>
				{
                    "project": "<?php echo substr($this->db->get_where('project',array('project_code' => $row['project_code']))->row('title') , 0,20);?>",
                    "amount": <?php echo $row['amount'];?>,
                    "color": "#5d78ff"
                },
	<?php endforeach;?>
	],
    "graphs": [{
        "balloonText": "[[category]]: <b>[[value]]</b>",
        "colorField": "color",
        "fillAlphas": 1,
        "lineAlpha": 0.1,
        "type": "column",
        "valueField": "amount"
    }],
    "depth3D": 0,
	"angle": 20,
    "chartCursor": {
        "categoryBalloonEnabled": false,
        "cursorAlpha": 0,
        "zoomable": false
    },
    "categoryField": "project",
    "categoryAxis": {
        "gridPosition": "start",
        "labelRotation": 30
    },
	"pathToImages"	: "<?php echo base_url('assets/js/amcharts/images/');?>",
	"amExport": {
					"top": 0,
                    "right": 0,
                    "buttonColor": '#EFEFEF',
                    "buttonRollOverColor":'#DDDDDD',
					"imageFileName"	: "Project Report",
                    "exportPNG":true,
                    "exportJPG":true,
                    "exportPDF":true,
                    "exportSVG":true
	}
});

var chart = AmCharts.makeChart("chartdiv",{
	"type"			: "pie",
	"titleField"	: "report_type",
	"valueField"	: "amount",
	"innerRadius"	: "40%",
	"angle"			: "0",
	"depth3D"		: 0,
	"pathToImages"	: "<?php echo base_url('assets/js/amcharts/images/');?>",
	"amExport": {
					"top": 0,
                    "right": 0,
                    "buttonColor": '#EFEFEF',
                    "buttonRollOverColor":'#DDDDDD',
					"imageFileName"	: "Project Report",
                    "exportPNG":true,
                    "exportJPG":true,
                    "exportPDF":true,
                    "exportSVG":true
	},
	"dataProvider"	: [

		{
			"report_type": "<?php echo get_phrase('expense');?>",
			"amount": <?php echo $total_expense;?>
		},
		{
			"report_type": "<?php echo get_phrase('income');?>",
			"amount": <?php echo $total_income;?>
		},
	]
});
</script>
<div class="row">

	<!-- INCOME-EXPENSE COMPARISON CHART -->
	<div class="col-sm-6">
        <div class="panel panel-primary" id="charts_env">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="entypo-chart-pie"></i>
					<?php echo get_phrase('income_expense_comparison');?> (this month)
				</div>

			</div>

			<div class="panel-body" >
				<div id="chartdiv" style="width:100%; height:310px;"></div>
				<!--<div id="line-chart-demo" class="morrischart" style="height: 200px"></div>-->
			</div>
		</div>
	</div>

	<!-- EVENT CALENDAR OF CURRENT MONTH -->
	<div class="col-sm-6">
        <div class="panel panel-primary " data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="fa fa-calendar"></i>
                    <?php echo get_phrase('event_calendar');?> (this month)
                </div>
            </div>
            <div class="panel-body" style="padding:0px;">
                <div class="calendar-env">
                    <div class="calendar-body">
                        <div id="event_calendar"></div>
                    </div>
                </div>
            </div>
        </div>
	</div>

</div>

<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="glyphicon glyphicon-bullhorn"></i> &nbsp; <b><?php echo get_phrase('noticeboard'); ?></b>
				</div>
			</div>
			<div class="panel-body with-table">
				<table class="table table-responsive">
					<thead>
						<tr>
							<th><?php echo get_phrase('notice'); ?></th>
							<th><?php echo get_phrase('published_by'); ?></th>
							<th><?php echo get_phrase('date_added'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php
							$this->db->order_by('date_added', 'DESC');
							$this->db->limit(4);
							$notices = $this->db->get('notice')->result_array();
							foreach ($notices as $row):
						?>
						<tr>
							<td>
								<a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/notice_view/' . $row['notice_id']);?>');">
									<?php echo $row['title']; ?>
								</a>
							</td>
							<td><?php echo $this->db->get_where('admin', array('admin_id' => $row['published_by']))->row()->name;?></td>
							<td><?php echo date('jS F Y' , $row['date_added']);?></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>

	</div>
</div>



<script>
  $(document).ready(function() {

		var calendar = $('#event_calendar');

		calendar.fullCalendar({
			header: {
				left: '',
				right: ''
			},

			//defaultView: 'basicWeek',

			editable: false,
			firstDay: 0,
			height: 300,
			droppable: false,

			events:
	        [
	            <?php
	            	$this->db->where('user_type' , $this->session->userdata('login_type'));
	            	$this->db->where('user_id' , $this->session->userdata('login_user_id'));
	            	$events = $this->db->get('calendar_event')->result_array();
	            	foreach ($events as $row):
	            ?>
	                {
	                    title   :   "<?php  echo $row['title'];?>",
	                    start   :   new Date(<?php echo date('Y', $row['start_timestamp']); ?>,
	                                    <?php echo date('m', $row['start_timestamp']) - 1; ?>,
	                                    <?php echo date('d', $row['start_timestamp']); ?>),
	                    end    :   new Date(<?php echo date('Y', $row['end_timestamp']); ?>,
	                                    <?php echo date('m', $row['end_timestamp']) - 1; ?>,
	                                    <?php echo date('d', $row['end_timestamp']); ?>),
	                    allDay: true,
	                    id: "<?php echo $row['calendar_event_id'];?>",
	                    color: "<?php echo $row['colour'];?>"
	                },
	            <?php endforeach ?>
	        ],


			drop: function(date, allDay) {

				var $this = $(this),
					eventObject = {
						title: $this.text(),
						start: date,
						allDay: allDay,
						className: $this.data('event-class')
					};

				calendar.fullCalendar('renderEvent', eventObject, true);

				$this.remove();
			}
		});

	});
  </script>

<style type="text/css">
	.calendar-env .calendar-body .fc-header .fc-header-right {
   padding: 0px;
  text-align: right;
}
.calendar-env .calendar-body .fc-header .fc-header-left {
  padding: 0px;
}
</style>
