<?php

if (!defined('BASEPATH'))

    exit('No direct script access allowed');



/*  

 *  @author          :    Creativeitem

 *  date             :    30 January, 2017

 *  Item             :    Ekattor School Management System Android Application

 *  Specification    :    Mobile app response, JSON formatted data for iOS & android app

 *  Portfolio        :    http://codecanyon.net/user/Creativeitem

 *  Website          :    http://www.creativeitem.com

 *  Support          :    http://support.creativeitem.com

 */



class Mobile extends CI_Controller

{

    function __construct()

    {

        parent::__construct();

        $this->load->database();



        //Authenticate data manipulation with the user level security key

        if ($this->validate_auth_key() != 'success')

            die;

    }



    // authentication_key validation

    function validate_auth_key() {



        /*

        * Ignore the authentication and returns success by default to constructor 

        * For pubic calls: login, forget password.

        * Pass post parameter 'authenticate' = 'false' to ignore the user level authentication

        */

        if ($this->input->post('authenticate') == 'false')

            return 'success';



        $response                       = array();

        $authentication_key             = $this->input->post("authentication_key");

        $user_type                      = $this->input->post("user_type");



        $query = $this->db->get_where($user_type, array('authentication_key' => $authentication_key));

        if ($query->num_rows() > 0) {

            $row = $query->row();



            $response['status']         =   'success';

            $response['login_type']     =   'admin';



            if ( $user_type == 'admin' )

                $response['login_user_id']  =   $row->admin_id;

            if ( $user_type == 'teacher' )

                $response['login_user_id']  =   $row->teacher_id;

            if ( $user_type == 'student' )

                $response['login_user_id']  =   $row->student_id;

            if ( $user_type == 'parent' )

                $response['login_user_id']  =   $row->parent_id;

            $response['authentication_key']=$authentication_key;





        }



        else {

            $response['status']         =   'failed';

        }



        //return json_encode($response);

        return $response['status'];

    }



    // returns system name and logo as public call

    function get_system_info() {



        $response['system_name']    =   $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;

        echo json_encode($response);

    }

	

	function login() {

        $response       = array();

        $email          = $this->input->post("email");

        $password       = sha1($this->input->post("password"));



        // Checking login credential for admin

        $query = $this->db->get_where('admin', array('email' => $email , 'password' => $password));

        if ($query->num_rows() > 0) {

            $row = $query->row();



            $response['status']         	= 'success';

            $response['login_type']     	= 'admin';

            $response['login_user_id']  	= $row->admin_id;

			$response['username']			= $row->name;

			$authentication_key         	= md5(rand(10000, 1000000));

            $response['authentication_key']	= $authentication_key;



            // update the new authentication key into user table

            $this->db->where('admin_id', $row->admin_id);

            $this->db->update('admin', array('authentication_key' => $authentication_key));



            echo json_encode($response);

            return;

        }



        else {

            $response['status'] = 'failed';

        }



        echo json_encode($response);

    }

	

	// returns summary info for dashboard

	function dashboard_summary() {

		$response = array();

        $response['total_client']      		= $this->db->count_all('client');

        $response['total_team_member']		= $this->db->count_all('staff');

        $response['total_pending_invoice']	= $this->db->get_where('project_milestone', array('status' => 0))->num_rows();

		$response['total_opened_ticket']	= $this->db->get_where('ticket', array('status' => 'opened'))->num_rows();

		

		echo json_encode($response);

	}



    // response of client list

    function get_client()

    {

        $response   = array();

        $this->db->order_by('client_id', 'desc');

        $clients    = $this->db->get('client')->result_array();

        

        foreach($clients as $row)

        {

            $data['client_id']  = $row['client_id'];

            $data['name']       = $row['name'];

            $data['image_url']  = $this->crud_model->get_image_url('client', $row['client_id']);



            array_push($response, $data);

        }

        

        echo json_encode($response);

    }



    // response of client list

    function get_admin()

    {

        $response   = array();

        $this->db->order_by('admin_id', 'desc');

        $admins     = $this->db->get('admin')->result_array();

        

        foreach($admins as $row)

        {

            $data['admin_id']   = $row['admin_id'];

            $data['name']       = $row['name'];

            $data['image_url']  = $this->crud_model->get_image_url('admin', $row['admin_id']);



            array_push($response, $data);

        }

        

        echo json_encode($response);

    }



    // response of staff list

    function get_staff()

    {

        $response   = array();

        $this->db->order_by('staff_id', 'desc');

        $staffs     = $this->db->get('staff')->result_array();

        

        foreach($staffs as $row)

        {

            $data['staff_id']   = $row['staff_id'];

            $data['name']       = $row['name'];

            $data['image_url']  = $this->crud_model->get_image_url('staff', $row['staff_id']);



            array_push($response, $data);

        }

        

        echo json_encode($response);

    }



    // response of company list

    function get_company()

    {

        $response   = array();

        $this->db->order_by('company_id', 'desc');

        $companies  = $this->db->get('company')->result_array();

        

        foreach($companies as $row)

        {

            $data['company_id'] = $row['company_id'];

            $data['name']       = $row['name'];



            array_push($response, $data);

        }

        

        echo json_encode($response);

    }



    // get admin's profile info

    function get_admin_profile_info()

    {

        $response   = array();

        $admin_info = $this->db->get_where('admin', array("admin_id" => $this->input->post('user_id')))->result_array();

        

        foreach($admin_info as $row)

        {

            if ($row['owner_status'] == 1)

                $data['role']   = 'Owner';

            else

                $data['role']   = 'Administrator';



            $data['email'bugs   = $row['email'];

            $data['phone']      = $row['phone'];

            $data['address']    = $row['address'];



            array_push($response, $data);

        }

        

        echo json_encode($response);

    }



    // get staff's profile info

    function get_staff_profile_info()

    {

        $response   = array();

        $staff_info = $this->db->get_where('staff', array("staff_id" => $this->input->post('user_id')))->result_array();

        

        foreach($staff_info as $row)

        {

            $data['role']                   = $this->db->get_where('account_role', array("account_role_id" => $row['account_role_id']))->row()->name;

            $data['email']                  = $row['email'];

            $data['phone']                  = $row['phone'];

            $data['skype_id']               = $row['skype_id'];

            $data['facebook_profile_link']  = $row['facebook_profile_link'];

            $data['twitter_profile_link']   = $row['twitter_profile_link'];

            $data['linkedin_profile_link']  = $row['linkedin_profile_link'];



            array_push($response, $data);

        }

        

        echo json_encode($response);

    }



    // get company's profile info

    function get_company_profile_info()

    {

        $response       = array();

        $company_info   = $this->db->get_where('company', array("company_id" => $this->input->post('user_id')))->result_array();

        

        foreach($company_info as $row)

        {

            $data['total_projects'] = $this->db->get_where('project', array("company_id" => $row['company_id']))->num_rows();

            $data['address']        = $row['address'];



            if($row['client_id'] > 0)

                $data['associated_person'] = $this->db->get_where('client', array('client_id' => $row['client_id']))->row()->name;

            else

                $data['associated_person'] = '';



            $data['email']          = $row['email'];

            $data['phone']          = $row['phone'];

            $data['website']        = $row['website'];



            array_push($response, $data);

        }

        

        echo json_encode($response);

    }



    // get project info of associated company

    function get_company_project_info()

    {

        $response   = array();

        $response   = $this->db->get_where('project', array("company_id" => $this->input->post('user_id')))->row();

        

        echo json_encode($response);

    }



    // get client's profile info

    function get_client_profile_info()

    {

        $response       = array();

        $client_info    = $this->db->get_where('client', array("client_id" => $this->input->post('user_id')))->result_array();

        

        foreach($client_info as $row)

        {

            $data['email']                  = $row['email'];

            $data['phone']                  = $row['phone'];

            $data['address']                = $row['address'];

            $data['skype_id']               = $row['skype_id'];

            $data['facebook_profile_link']  = $row['facebook_profile_link'];

            $data['twitter_profile_link']   = $row['twitter_profile_link'];

            $data['linkedin_profile_link']  = $row['linkedin_profile_link'];

            $data['website']                = $row['website'];



            array_push($response, $data);

        }

        

        echo json_encode($response);

    }



    // get project info of associated client

    function get_client_project_info()

    {

        $response   = array();

        $response   = $this->db->get_where('project', array("client_id" => $this->input->post('user_id')))->row();

        

        echo json_encode($response);

    }



    // response of project list

    function get_project()

    {

        $response   = array();

        $this->db->order_by('project_id', 'desc');

        $projects   = $this->db->get('project')->result_array();

        

        foreach($projects as $row)

        {

            $data['project_id'] = $row['project_id'];

            $data['title']      = $row['title'];



            array_push($response, $data);

        }

        

        echo json_encode($response);

    }



    // get project overview info

    function get_project_overview_info()

    {

        $response       = array();

        $project_info   = $this->db->get_where('project', array("project_id" => $this->input->post('project_id')))->result_array();

        

        foreach($project_info as $row)

        {

            $data['description']        = $row['description'];

            $data['client']             = $this->db->get_where('client', array("client_id" => $row['client_id']))->row()->name;

            $data['time_period']        = $row['timestamp_start'] . ' to ' . $row['timestamp_end'];

            $data['website']            = $row['demo_url'];

            $data['company']            = $this->db->get_where('company', array("company_id" => $row['company_id']))->row()->name;

            $data['associated_staffs']  = '';



            foreach(explode(',', $row['staffs']) as $staff_id)

                if($staff_id != '') {

                    if($data['associated_staffs'] == '')

                        $data['associated_staffs']  .= $this->db->get_where('staff', array("staff_id" => $staff_id))->row()->name;

                    else

                        $data['associated_staffs']  .= ', ' . $this->db->get_where('staff', array("staff_id" => $staff_id))->row()->name;

                }



            array_push($response, $data);

        }

        

        echo json_encode($response);

    }



    // get project file info

    function get_project_file_info()

    {

        $response           = array();

        $this->db->order_by('project_file_id', 'desc');

        $project_file_info  = $this->db->get_where('project_file', array("project_id" => $this->input->post('project_id')))->result_array();

        

        foreach($project_file_info as $row)

        {

            $data['file_id']    = $row['project_file_id'];

            $data['file_name']  = $row['name'];



            array_push($response, $data);

        }

        

        echo json_encode($response);

    }



    // get project task info

    function get_project_tasks()

    {

        $response           = array();

        $this->db->order_by('project_task_id', 'desc');

        $project_task_info  = $this->db->get_where('project_task', array("project_id" => $this->input->post('project_id')))->result_array();

        

        foreach($project_task_info as $row)

        {

            $data['task_id']    = $row['project_task_id'];

            $data['task_title'] = $row['title'];



            array_push($response, $data);

        }

        

        echo json_encode($response);

    }



    // get detailed info of project task

    function get_project_task_details()

    {

        $response       = array();

        $task_details   = array();



        $this->db->order_by('project_task_id', 'desc');

        $project_task_detailed_info = $this->db->get_where('project_task', array("project_task_id" => $this->input->post('project_task_id')))->result_array();

        

        foreach($project_task_detailed_info as $row)

        {

            $data['task_description']   = $row['description'];

            $data['assigned_staff']     = $this->db->get_where('staff', array("staff_id" => $row['staff_id']))->row()->name;

            $data['time_period']        = date('d/m/Y', $row['timestamp_start']) . ' to ' . date('d/m/Y', $row['timestamp_end']);



            array_push($task_details, $data);

        }



        $response['task_id']        = $this->input->post('project_task_id');

        $response['task_details']   = $task_details;

        

        echo json_encode($response);

    }



    // get project bug info

    function get_project_bugs()

    {

        $response           = array();

        $project_code       = $this->db->get_where('project', array("project_id" => $this->input->post('project_id')))->row()->project_code;

        $this->db->order_by('project_bug_id', 'desc');

        $project_bug_info   = $this->db->get_where('project_bug', array("project_code" => $project_code))->result_array();



        foreach($project_bug_info as $row)

        {

            $data['bug_id']    = $row['project_bug_id'];

            $data['bug_title'] = $row['title'];



            array_push($response, $data);

        }



        echo json_encode($response);

    }



    // get detailed info of project bug

    function get_project_bug_details()

    {

        $response       = array();

        $bug_details    = array();



        $this->db->order_by('project_bug_id', 'desc');

        $project_bug_detailed_info = $this->db->get_where('project_bug', array("project_bug_id" => $this->input->post('project_bug_id')))->result_array();



        foreach($project_bug_detailed_info as $row)

        {

            $data['bug_description']    = $row['description'];

            if($row['status'] == 0)

                $data['status'] = 'Pending';

            else

                $data['status'] = 'Solved';



            array_push($bug_details, $data);

        }



        $response['bug_id']        = $this->input->post('project_bug_id');

        $response['bug_details']   = $bug_details;



        echo json_encode($response);

    }



    // get project payment info

    function get_project_payment_info()

    {

        $response               = array();

        $project_code           = $this->db->get_where('project', array("project_id" => $this->input->post('project_id')))->row()->project_code;

        $this->db->order_by('project_milestone_id', 'desc');

        $project_milestone_info = $this->db->get_where('project_milestone', array("project_code" => $project_code))->result_array();

        

        foreach($project_milestone_info as $row)

        {

            $data['title']  = $row['title'];

            $data['date']   = date('d/m/Y', $row['timestamp']);

            if($row['status'] == 0)

                $data['status'] = 'Unpaid';

            else

                $data['status'] = 'Paid';



            array_push($response, $data);

        }

        

        echo json_encode($response);

    }



    // get project expense info

    function get_project_expense_info()

    {

        $response               = array();

        $project_code           = $this->db->get_where('project', array("project_id" => $this->input->post('project_id')))->row()->project_code;

        $this->db->order_by('payment_id', 'desc');

        $project_expenses       = $this->db->get_where('payment', array("type" => "expense", "project_code" => $project_code))->result_array();

        

        foreach($project_expenses as $row)

        {

            $data['title']  = $row['title'];

            $data['amount'] = $row['amount'];

            $data['date']   = date('d/m/Y', $row['timestamp']);



            array_push($response, $data);

        }

        

        echo json_encode($response);

    }



    // get project expense info

    function get_project_timesheet_info()

    {

        $response       = array();

        $timesheet_info = array();

        $total_duration = 0;

        $total_time     = '';



        $this->db->order_by('project_timesheet_id' , 'desc');

        $project_timesheets = $this->db->get_where('project_timesheet', array('project_id' => $this->input->post('project_id')))->result_array();



        foreach($project_timesheets as $row)

        {

            $data['start_time'] = date("H:i, d M", $row['start_timestamp']);

            $data['end_time']   = date("H:i, d M", $row['end_timestamp']);



            $duration       = $row['end_timestamp'] - $row['start_timestamp'];

            $total_duration += $duration;



            $total_hour     =   intval($duration / 3600);

            $duration       -= $total_hour * 3600;

            $total_minute   = intval($duration / 60);

            $total_second   = intval($duration % 60);

            if ($total_hour > 0)

                $total_time .= $total_hour . 'h : ';

            if ($total_minute > 0)

                $total_time .= $total_minute . 'm : ';

            if ($total_second > 0)

                $total_time .= $total_second . 's ';



            $data['total_time'] = $total_time;



            array_push($timesheet_info, $data);

            $total_time = '';

        }



        $total_hour      =   intval($total_duration / 3600);

        $total_duration -= $total_hour * 3600;

        $total_minute   = intval($total_duration / 60);

        $total_second   = intval($total_duration % 60);

        if ($total_hour > 0)

            $total_time .= $total_hour . 'h : ';

        if ($total_minute > 0)

            $total_time .= $total_minute . 'm : ';

        if ($total_second > 0)

            $total_time .= $total_second . 's ';



        $response['total_time_completed']   = $total_time;

        $response['timesheet_info']         = $timesheet_info;



        echo json_encode($response);

    }



    // get accounting info

    function get_accounting_info()

    {

        $response   = array();

        $month      = $this->input->post('month');

        $year       = $this->input->post('year');



        $this->db->order_by('timestamp', 'desc');

        $this->db->where('type', $this->input->post('payment_type'));

        $payments = $this->db->get('payment')->result_array();

        

        foreach($payments as $row)

            if($year == date('Y', $row['timestamp']) && $month == date('n', $row['timestamp']))

            {

                $data['project_title']  = $this->db->get_where('project', array('project_code' => $row['project_code']))->row()->title;

                $data['amount']         = $row['amount'];

                $data['date']           = date('d/m/Y', $row['timestamp']);



                array_push($response, $data);

            }

        

        echo json_encode($response);

    }



    // get calendar info

    function get_calendar_info()

    {

        $response   = array();

        $this->db->where('user_type', $this->input->post('user_type'));

        $this->db->where('user_id', $this->input->post('user_id'));

        $events     = $this->db->get('calendar_event')->result_array();

        

        foreach($events as $row)

        {

            $data['title']              = $row['title'];

            $data['description']        = $row['description'];

            $data['start_timestamp']    = $row['start_timestamp'];



            array_push($response, $data);

        }

        

        echo json_encode($response);

    }



    // get logged in users profile info

    function get_logged_in_users_profile_info() {



        $response       =   array();

        $login_type     =   $this->input->post('user_type');

        $login_user_id  =   $this->input->post('user_id');

        $user_profile   =   $this->db->get_where($login_type, array($login_type.'_id' => $login_user_id ))->result_array();



        foreach ($user_profile as $row) {

            $data['name']       =   $row['name'];

            $data['email']      =   $row['email'];

            $data['image_url']  =   $this->crud_model->get_image_url($login_type, $login_user_id );

            break;

        }

        array_push($response , $data);



        echo json_encode($response);



    }



    // update logged in users profile info

    function update_profile() {

        $response       =   array();

        $user_type      =   $this->input->post('user_type');

        $user_id        =   $this->input->post('user_id');



        $data['name']   =   $this->input->post('name');

        $data['email']  =   $this->input->post('email');

        $this->db->where( $user_type . '_id' , $user_id);

        $this->db->update( $user_type , $data);





        $response       =   array('update_status' => 'success');

        echo json_encode($response);

    }



    // update logged in users password

    function update_password() {

        $response       =   array();

        $user_type      =   $this->input->post('user_type');

        $user_id        =   $this->input->post('user_id');



        $old_password   =   sha1( $this->input->post('old_password') );

        $data['password']   =   sha1( $this->input->post('new_password') );



        // verify if old password matches

        $this->db->where( $user_type . '_id' , $user_id);

        $this->db->where( 'password' , $old_password);

        $verify_query   =   $this->db->get( $user_type );



        if ( $verify_query->num_rows() > 0 ) {

            $this->db->where( $user_type . '_id' , $user_id);

            $this->db->update( $user_type , $data);



            $response       =   array('update_status' => 'success');

        }

        else {

            $response       =   array('update_status' => 'failed');

        }

        

        echo json_encode($response);

    }



    // response of team task list

    function get_team_task()

    {

        $response   = array();

        $this->db->order_by('team_task_id', 'desc');

        $team_tasks = $this->db->get('team_task')->result_array();



        foreach($team_tasks as $row)

        {

            $data['team_task_id']   = $row['team_task_id'];

            $data['title']          = $row['task_title'];



            array_push($response, $data);

        }



        echo json_encode($response);

    }



    // get team task overview info

    function get_team_task_overview_info()

    {

        $response           = array();

        $team_task_info     = $this->db->get_where('team_task', array("team_task_id" => $this->input->post('team_task_id')))->result_array();



        foreach($team_task_info as $row)

        {

            $data['description']    = $row['task_note'];

            $data['date_created']   = date('d/m/Y', $row['creation_timestamp']);

            $data['due_date']       = date('d/m/Y', $row['due_timestamp']);



            array_push($response, $data);

        }



        echo json_encode($response);

    }



    // get team task file info

    function get_team_task_file_info()

    {

        $response               = array();

        $this->db->order_by('team_task_file_id', 'desc');

        $team_task_file_info    = $this->db->get_where('team_task_file', array("team_task_id" => $this->input->post('team_task_id')))->result_array();



        foreach($team_task_file_info as $row)

        {

            $data['file_id']    = $row['team_task_file_id'];

            $data['file_name']  = $row['name'];



            array_push($response, $data);

        }



        echo json_encode($response);

    }



    // get assigned staff info of a team task

    function get_team_task_assigned_staff_info()

    {

        $response           = array();

        $assigned_staff_ids = $this->db->get_where('team_task', array("team_task_id" => $this->input->post('team_task_id')))->row()->assigned_staff_ids;



        foreach(explode(',', $assigned_staff_ids) as $staff_id)

            if($staff_id != '') {

                $staff_info = $this->db->get_where('staff', array("staff_id" => $staff_id))->result_array();

        

                foreach($staff_info as $row)

                {

                    $data['staff_id']   = $row['staff_id'];

                    $data['name']       = $row['name'];

                    $data['image_url']  = $this->crud_model->get_image_url('staff', $row['staff_id']);



                    array_push($response, $data);

                }

            }

        

        echo json_encode($response);

    }



    // forgot password link

    function reset_password() {

        $response               = array();

        $response['status']     = 'false';

        $email                  = $_POST["email"];

        $reset_account_type     = '';



        //resetting user password here

        $new_password           = substr(rand(100000000,20000000000), 0,7);



        // Checking credential for admin

        $query = $this->db->get_where('admin', array('email' => $email));

        if ($query->num_rows() > 0) 

        {

            $reset_account_type     = 'admin';

            $this->db->where('email' , $email);

            $this->db->update('admin', array('password' => sha1($new_password)));

            $response['status']     = 'success';

        }



        // send new password to user email  

        $this->email_model->password_reset_email($new_password , $reset_account_type , $email);



        echo json_encode($response);

    }





















































    // get client's profile, project and payment info

    // client_id required

    function get_client_profile_information($client_id = '')

    {

        $response       = array();

        $client_info    = $this->db->get_where('client', array('client_id' => $client_id))->result_array();



        // profile summary

        $data['client_info']    = $client_info;

        $data['company']        = $this->db->get_where('company' , array('client_id' => $client_id))->row()->name;

        $data['image_url']      = $this->crud_model->get_image_url( 'client' , $client_id);

        $data['total_project']  = $this->db->get_where('project', array('client_id' => $client_id))->num_rows();

        

        // project info

        $data['project_info']   = $this->db->get_where('project' , array('client_id' => $client_id))->result_array();

        

        // payment info

        $this->db->order_by('timestamp' , 'desc');

        $data['payment_info']   = $this->db->get_where('payment',

            array('type' => 'income', 'client_id' => $client_id))->result_array();

        

        array_push($response, $data);



        echo json_encode($response);

    }



    // get admin's profile info

    // admin_id required

    function get_admin_profile_information($admin_id = '')

    {

        $response           = array();

        $data['admin_info'] = $this->db->get_where('admin', array('admin_id' => $admin_id))->result_array();

        $data['image_url']  = $this->crud_model->get_image_url('admin', $admin_id);

        

        array_push($response, $data);



        echo json_encode($response);

    }



    // get staff's profile info

    // staff_id required

    function get_staff_profile_information($staff_id = '')

    {

        $response           = array();

        $data['staff_info'] = $this->db->get_where('staff', array('staff_id' => $staff_id))->result_array();

        $account_role_id    = $this->db->get_where('staff', array('staff_id' => $staff_id))->row()->account_role_id;

        $data['role']       = $this->db->get_where('account_role',

            array('account_role_id' => $account_role_id))->row()->name;

        $data['image_url']  = $this->crud_model->get_image_url('staff', $staff_id);

        

        array_push($response, $data);



        echo json_encode($response);

    }



    // response of account role list

    function get_account_role()

    {

        $response           = array();

        $this->db->order_by('account_role_id', 'desc');

        $account_roles      = $this->db->get('account_role')->result_array();

        

        foreach($account_roles as $row)

        {

            $data['name']           = $row['name'];

            $data['permessions']    = '';

            $permission_array       = (explode(',', $row['account_permissions']));

            for($i = 0; $i < count($permission_array) - 1; $i++)

            {

                if($data['permessions'] == '')

                    $data['permessions'] .= $this->db->get_where('account_permission',

                        array('account_permission_id' => $permission_array[$i]))->row()->name;

                else

                    $data['permessions'] .= ',' . $this->db->get_where('account_permission',

                        array('account_permission_id' => $permission_array[$i]))->row()->name;

            }

            $data['number_of_staff'] = $this->db->get_where('staff',

                array('account_role_id' => $row['account_role_id']))->num_rows();

            

            array_push($response, $data);

        }

        

        echo json_encode($response);

    }



    // returns image of user, returns blank image if not found.

    function get_image_url($type = '', $id = '') {



        $type           =   $this->input->post('user_type');

        $id             =   $this->input->post('user_id');

        $response       =   array();



        if (file_exists('uploads/' . $type . '_image/' . $id . '.jpg'))

            $response['image_url'] = base_url() . 'uploads/' . $type . '_image/' . $id . '.jpg';

        else

            $response['image_url'] = base_url() . 'uploads/user.jpg';



        echo json_encode($response);

    }

}