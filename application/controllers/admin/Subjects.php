<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends Admin_Controller {
	function __construct(){
		parent::__construct();

		if(!$this->session->userdata("logged_in")){
			redirect('admin/login');
		}
	}
	
	public function index(){	
		$data['subjects'] = $this->Subject_model->get_list(); 
		$this->template->load('admin','default','subjects/index',$data);

	}
	public function add(){	
		$this->form_validation->set_rules('name','Name','trim|required|min_length[3]');

		if($this->form_validation->run() == false){
			$this->template->load('admin','default','subjects/add');
		} else {
			// Create POst Array
			$data = array(
					'name' => $this->input->post('name')
				);

			//Insert Subject
			$this->Subject_model->add($data);
			//Activity Array
			$activityData = array(
					'resource_id' => $this->db->insert_id(),
					'type'		  => 'subject',
					'action' 	  =>  'added',
					'user_id'	  =>  $this->session->userdata('user_id'),
					'message'	  =>  'A new subject was add('.$data['name'].')'				
				);
			$this->Activity_model->add($activityData);

			//Set Message
			$this->session->set_flashdata('success','Subject has been added');
			//Redirect 
			redirect('admin/subjects'); 
		}

		
	}
	public function edit($id){	
		$this->form_validation->set_rules('name','Name','trim|required|min_length[3]');

		if($this->form_validation->run() == false){
			$data['item'] = $this->Subject_model->get($id);

			$this->template->load('admin','default','subjects/edit',$data);
		} else {
			$old_name = $this->Subject_model->get($id)->name;
			$new_name = $this->input->post('name');
			// Create POst Array
			$data = array(
					'name' => $this->input->post('name')
				);

			//Insert Subject
			$this->Subject_model->update($id,$data);
			//Activity Array
			$activityData = array(
					'resource_id' => $this->db->insert_id(),
					'type'		  => 'subject',
					'action' 	  =>  'updated',
					'user_id'	  =>  $this->session->userdata('user_id'),
					'message'	  =>  'A new subject ('.$old_name.')was renamed('.$new_name.')'				
				);
			$this->Activity_model->add($activityData);

			//Set Message
			$this->session->set_flashdata('success','Subject has been updated');
			//Redirect 
			redirect('admin/subjects'); 
		}

	}
	public function delete($id){	
		$name = $this->Subject_model->get($id)->name;
		//Delete subject
		$this->Subject_model->delete($id);
		$activityData = array(
					'resource_id' => $this->db->insert_id(),
					'type'		  => 'subject',
					'action' 	  =>  'deleted',
					'user_id'	  =>  $this->session->userdata('user_id'),
					'message'	  =>  'A was deleted'				
				);
			$this->Activity_model->add($activityData);
			//Set Message
			$this->session->set_flashdata('success','Subject has been deleted ');
			//Redirect 
			redirect('admin/subjects');
	}
}