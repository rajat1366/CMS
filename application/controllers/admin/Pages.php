<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Admin_Controller {
	function __construct(){
		parent::__construct();

		if(!$this->session->userdata("logged_in")){
			redirect('admin/login');
		}
	}
	
	public function index(){	
		$data['pages'] = $this->Page_model->get_list(); 
		$this->template->load('admin','default','pages/index',$data);
	}
	public function add(){	
		 // Load template
		 	$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('body', 'Body', 'trim|required');
			$this->form_validation->set_rules('is_published', 'Publish', 'required');
			$this->form_validation->set_rules('is_featured', 'Featured', 'required');
			$this->form_validation->set_rules('order', 'Order', 'integer');		

			if($this->form_validation->run() == FALSE){
					$subject_options = array();
					$subject_options[0] = 'Select Subjects';

					$subject_list = $this->Subject_model->get_list();

					foreach ($subject_list as $subject) {
						$subject_options[$subject->id] = $subject->name;
					}
					$data['subject_options'] = $subject_options;
					$this->template->load('admin','default','pages/add',$data);
			} else {
				$slug = str_replace(' ', '-', $this->input->post('title'));
				$slug = strtolower($slug);

				$data = array(
				'title'					=> $this->input->post('title'),
				'slug'					=> $slug,
				'subject_id'		=> $this->input->post('subject_id'),
				'body'					=> $this->input->post('body'),
				'is_published'	=> $this->input->post('is_published'),
				'is_featured'		=> $this->input->post('is_featured'),
				'in_menu'				=> $this->input->post('in_menu'),
				'user_id'				=> $this->session->userdata('user_id'),
				'order'					=> $this->input->post('order')
				);
				//Insert Page 
				$this->Page_model->add($data);

				//Activity Array
				$activityData = array(
						'resource_id' => $this->db->insert_id(),
						'type'		  => 'Page',
						'action' 	  =>  'added',
						'user_id'	  =>  $this->session->userdata('user_id'),
						'message'	  =>  'A new page was add('.$data['title'].')'				
					);
				$this->Activity_model->add($activityData);

				//Set Message
				$this->session->set_flashdata('success','Page has been added');
				//Redirect 
				redirect('admin/pages'); 
			}
		
	}
	public function edit($id){	
		$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('body', 'Body', 'trim|required');
			$this->form_validation->set_rules('is_published', 'Publish', 'required');
			$this->form_validation->set_rules('is_featured', 'Featured', 'required');
			$this->form_validation->set_rules('order', 'Order', 'integer');		

			if($this->form_validation->run() == FALSE){
					$subject_options = array();
					$subject_options[0] = 'Select Subjects';

					$subject_list = $this->Subject_model->get_list();

					foreach ($subject_list as $subject) {
						$subject_options[$subject->id] = $subject->name;
					}
					$data['subject_options'] = $subject_options;
					$data['item'] = $this->Page_model->get($id); 

					$this->template->load('admin','default','pages/edit',$data);
			} else {
				$slug = str_replace(' ', '-', $this->input->post('title'));
				$slug = strtolower($slug);

				$data = array(
				'title'					=> $this->input->post('title'),
				'slug'					=> $slug,
				'subject_id'		=> $this->input->post('subject_id'),
				'body'					=> $this->input->post('body'),
				'is_published'	=> $this->input->post('is_published'),
				'is_featured'		=> $this->input->post('is_featured'),
				'in_menu'				=> $this->input->post('in_menu'),
				'user_id'				=> $this->session->userdata('user_id'),
				'order'					=> $this->input->post('order')
				);
				//update Page 
				$this->Page_model->update($id,$data);

				//Activity Array
				$activityData = array(
						'resource_id' => $this->db->insert_id(),
						'type'		  => 'Page',
						'action' 	  =>  'updated',
						'user_id'	  =>  $this->session->userdata('user_id'),
						'message'	  =>  'A page was updated('.$data['title'].')'				
					);
				$this->Activity_model->add($activityData);

				//Set Message
				$this->session->set_flashdata('success','Page has been updated');
				//Redirect 
				redirect('admin/pages'); 
			}
		
	}
	public function delete($id){	
		$title = $this->Page_model->get($id)->title;
		//Delete page
		$this->Page_model->delete($id);
		$activityData = array(
					'resource_id' => $this->db->insert_id(),
					'type'		  => 'page',
					'action' 	  =>  'deleted',
					'user_id'	  =>  $this->session->userdata('user_id'),
					'message'	  =>  'A page was deleted'				
				);
			$this->Activity_model->add($activityData);
			//Set Message
			$this->session->set_flashdata('success','page has been deleted ');
			//Redirect 
			redirect('admin/pages');
	}
} 