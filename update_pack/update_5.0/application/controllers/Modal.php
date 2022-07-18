<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modal extends CI_Controller {

	
	function __construct()
    {
        parent::__construct();
        $this->load->library('session');
		$this->load->database();
    }

	function popup($page_name = '' , $param2 = '' , $param3 = '')
	{
		$account_type				=	$this->session->userdata('login_type');
		$page_data['param2']		=	$param2;
		$page_data['param3']		=	$param3;
		$this->load->view( 'backend/'.$account_type.'/'.$page_name.'.php' ,$page_data);
		
		echo '<script src="' . base_url('assets/js/neon-custom-ajax.js') . '"></script>';
	}
}

