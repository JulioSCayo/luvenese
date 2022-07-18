<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paypal_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function pay($gateway, $project_milestone_id) {

        $project_milestone_details = $this->db->get_where('project_milestone', array('project_milestone_id' => $project_milestone_id))->row_array();

        $data['project_code']   = $project_milestone_details['project_code'];
        $data['type']           = 'income';
        $data['payment_method'] = $gateway;
        $data['amount']         = $project_milestone_details['amount'];
        $data['title']          = $project_milestone_details['title'];
        $data['timestamp']      = strtotime(date('D d M Y'));
        $data['milestone_id']   = $project_milestone_details['project_milestone_id'];
        $data['client_id']      = $project_milestone_details['client_id'];
        $data['company_id']     = $project_milestone_details['company_id'];

        $this->db->insert('payment', $data);

        // update project milestone table
        $project_milestone_checker = array(
            'project_milestone_id' => $project_milestone_id
        );
        $project_milestone_updater = array(
            'status' => 1
        );
        $this->db->where($project_milestone_checker);
        $this->db->update('project_milestone', $project_milestone_updater);
    }

}
