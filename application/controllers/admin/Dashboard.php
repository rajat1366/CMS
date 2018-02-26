<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {
	function __construct(){
		parent::__construct();

		if(!$this->session->userdata("logged_in")){
			redirect('admin/login');
		}
	}
	
	public function index(){	
		// $this->load->view('admin/dashboard');
		//load a template 
		$data['activities'] = $this->Activity_model->get_list();
		$this->template->load('admin','default','dashboard',$data); 
	}
}
