<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stripe_model extends CI_Model {

    function __construct() {
        parent::__construct();

        $this->load->library('stripegateway');
    }

    public function pay($gateway, $project_milestone_id = '') {

        if (isset($_POST['stripeToken'])) {

            $project_milestone_details = $this->db->get_where('project_milestone', array('project_milestone_id' => $project_milestone_id))->row_array();

            $data['stripe_token']    = $this->input->post('stripeToken');
            $data['client_id']        = $this->session->userdata('login_user_id');
            $data['title']          = $project_milestone_details['title'];
            $data['amount']          = $project_milestone_details['amount'];
            $data['timestamp']       = time();

            $this->stripegateway->checkout($data);

            //insert and update payment tables
            $data2['project_code']   = $project_milestone_details['project_code'];
            $data2['type']           = 'income';
            $data2['payment_method'] = $gateway;
            $data2['amount']         = $project_milestone_details['amount'];
            $data2['title']          = $project_milestone_details['title'];
            $data2['timestamp']      = strtotime(date('D d M Y'));
            $data2['milestone_id']   = $project_milestone_details['project_milestone_id'];
            $data2['client_id']      = $project_milestone_details['client_id'];
            $data2['company_id']     = $project_milestone_details['company_id'];

            $this->db->insert('payment', $data2);

            // update project milestone table
            $project_milestone_checker = array(
                'project_milestone_id' => $project_milestone_id
            );
            $project_milestone_updater = array(
                'status' => 1
            );
            $this->db->where($project_milestone_checker);
            $this->db->update('project_milestone', $project_milestone_updater);

            return true;
        } else {
            return false;
        }
    }

}
