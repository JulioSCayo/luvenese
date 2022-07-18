<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends CI_Controller {

	
	function __construct()
    {
        parent::__construct();
        $this->load->library('session');
		$this->load->database();
    }
	
	/***default functin, redirects to login page if no admin logged in yet***/
	public function index()
	{
		
	}
	
	function page_missing()
	{
		
        $page_data['page_name']  = 'error_404';
        $page_data['page_title'] = get_phrase('page_not_found');
        $this->load->view('backend/index', $page_data);
	}
}

