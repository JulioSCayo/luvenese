<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * 	@author : Creativeitem
 * 	30th July, 2014
 * 	Creative Item
 * 	www.creativeitem.com
 * 	http://codecanyon.net/user/joyontaroy
 */

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('crud_model');
        $this->load->database();
    }

    //Default function, redirects to logged in user area
    public function index() {

        if ($this->session->userdata('admin_login') == 1)
            redirect(site_url('admin/dashboard'), 'refresh');

        else if ($this->session->userdata('staff_login') == 1)
            redirect(site_url('staff/dashboard'), 'refresh');

        else if ($this->session->userdata('client_login') == 1)
            redirect(site_url('client/dashboard'), 'refresh');
        $this->load->view('backend/login');
    }

    //Validating login from ajax request
    function validate_login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $credential = array('email' => $email, 'password' => sha1($password));

        // Checking login credential for admin
        $query = $this->db->get_where('admin', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('admin_login', '1');
            $this->session->set_userdata('login_user_id', $row->admin_id);
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('login_type', 'admin');
            redirect(site_url('admin/dashboard'), 'refresh');
        }

        // Checking login credential for staff
        $query = $this->db->get_where('staff', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('staff_login', '1');
            $this->session->set_userdata('login_user_id', $row->staff_id);
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('login_type', 'staff');
            redirect(site_url('staff/dashboard'), 'refresh');
        }

        // Checking login credential for client
        $query = $this->db->get_where('client', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('client_login', '1');
            $this->session->set_userdata('login_user_id', $row->client_id);
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('login_type', 'client');
            redirect(site_url('client/dashboard'), 'refresh');
        }
        $this->session->set_flashdata('error_message', get_phrase('invalid_login'));
        redirect(site_url('login'), 'refresh');
    }

    function forgot_password() {
        $this->load->view('backend/forgot_password');
    }

    function reset_password() {
        $email = $this->input->post('email');
        $reset_account_type = '';
        //resetting user password here
        $new_password = substr(md5(rand(100000000, 20000000000)), 0, 7);
        $new_hashed_password = sha1($new_password);

        // Checking credential for admin
        $query = $this->db->get_where('admin', array('email' => $email));
        if ($query->num_rows() > 0) {
            $reset_account_type = 'admin';
            $this->db->where('email', $email);
            $this->db->update('admin', array('password' => $new_hashed_password));
            // send new password to user email
            $this->email_model->notify_email('password_reset_confirmation', $reset_account_type, $email, $new_password);
            $this->session->set_flashdata('flash_message', get_phrase('check_your_email'));
            redirect(site_url('login'), 'refresh');
        }
        // Checking credential for staff
        $query = $this->db->get_where('staff', array('email' => $email));
        if ($query->num_rows() > 0) {
            $reset_account_type = 'staff';
            $this->db->where('email', $email);
            $this->db->update('staff', array('password' => $new_hashed_password));
            // send new password to user email
            $this->email_model->notify_email('password_reset_confirmation', $reset_account_type, $email, $new_password);
            $this->session->set_flashdata('flash_message', get_phrase('check_your_email'));
            redirect(site_url('login'), 'refresh');
        }
        // Checking credential for client
        $query = $this->db->get_where('client', array('email' => $email));
        if ($query->num_rows() > 0) {
            $reset_account_type = 'client';
            $this->db->where('email', $email);
            $this->db->update('client', array('password' => $new_hashed_password));
            // send new password to user email
            $this->email_model->notify_email('password_reset_confirmation', $reset_account_type, $email, $new_password);
            $this->session->set_flashdata('flash_message', get_phrase('check_your_email'));
            redirect(site_url('login'), 'refresh');
        }
        $this->session->set_flashdata('error_message', get_phrase('your_email_is_not_found'));
        redirect(site_url('login'), 'refresh');
    }

    function create_new_account() {
        $this->load->view('backend/create_new_account');
    }

    function create_account() {
        $data['name']       = $this->input->post('name');
        $data['email']      = $this->input->post('email');
        $data['password']   = sha1($this->input->post('password'));

        $query = $this->db->get_where('client', array('email' => $data['email']));
        if ($query->num_rows() > 0) {
            $this->session->set_flashdata('error_message', get_phrase('email_already_exists'));
            redirect(site_url('login/create_new_account'), 'refresh');
        }
        $query = $this->db->get_where('staff', array('email' => $data['email']));
        if ($query->num_rows() > 0) {
            $this->session->set_flashdata('error_message', get_phrase('email_already_exists'));
            redirect(site_url('login/create_new_account'), 'refresh');
        }
        $query = $this->db->get_where('admin', array('email' => $data['email']));
        if ($query->num_rows() > 0) {
            $this->session->set_flashdata('error_message', get_phrase('email_already_exists'));
            redirect(site_url('login/create_new_account'), 'refresh');
        }

        $this->db->insert('client_pending', $data);
        $this->session->set_flashdata('flash_message', get_phrase('account_is_waiting_for_approval'));
        redirect(site_url('login'), 'refresh');
    }

    /*     * ************ Project Quote ******************* */

    /*function project_quote($param1 = '', $param2 = '') {
        if ($param1 == 'view') {
            $value = array();
            $a = rand(1, 10);
            $b = rand(1, 10);
            $c = rand(1, 10) % 3;
            if ($c == 0) {
                $operator = '+';
                $ans = $a + $b;
            } else if ($c == 1) {
                $operator = 'X';
                $ans = $a * $b;
            } else if ($c == 2) {
                $operator = '-';
                $ans = $a - $b;
            }

            $this->session->set_userdata('security_ans', $ans);

            $value['question'] = $a . " " . $operator . " " . $b . " = ?";
            $this->load->view('backend/project_quote', $value);
        }
        if ($param1 == 'create') {
            $answer = $this->input->post('answer');
            $ans = $this->input->post('ans');
            if ($ans == $answer) {
                $this->crud_model->create_project_quote_public();
                $this->session->set_flashdata('flash_message', get_phrase('quote_created_successfuly'));
                redirect(base_url(), 'refresh');
            } else {
                echo 'in failed';
                $this->session->set_flashdata('flash_message', get_phrase('failed'));
                redirect(base_url() . 'index.php?login/project_quote/view', 'refresh');
            }
        }
    }*/

    /*     * *****LOGOUT FUNCTION ****** */

    function logout() {
        $this->session->sess_destroy();
        redirect(site_url('login'), 'refresh');
    }

}
