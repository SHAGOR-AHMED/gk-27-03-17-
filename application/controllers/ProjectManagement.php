<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProjectManagement extends Base_Controller {

	public function __construct(){
		parent::__construct();
		//$this->load->model('Accounts_model');
	}

	public function add_project(){
		$data['title'] = "New Project add";
		view('project.new_project',$data);
	}

	public function project_status_update( ){
		$project_id = $this->uri->segment(2);
		$status = $this->uri->segment(3);

		$data = array(
				"status" => $status
			);
		$update = $this->db->where("id",$project_id)->update("project",$data);
	
		if($update):
			$this->session->set_flashdata("updateMsg","Project status updated");
		else:
			$this->session->set_flashdata("updateMsg","Project status update fail");
		endif;

		
		redirect("new_project","location");

	}

	// project insert
	public function project_insert(){
		if(isset($_POST['save'])):
			extract($_POST);

			$data = array(
					"id" 			=> '',
					"project_name"  => $project_name,
					"pksf" 			=> $pksf
				);

			$ins = $this->db->insert("project",$data);

			if($ins):
				$this->session->set_flashdata("updateMsg","New Project save successfully");
			else:
				$this->session->set_flashdata("updateMsg","Fail to insert new project");
			endif;

			redirect("new_project","location");

		endif;
	}

	public function project_edit( ){
		$project_id = $this->uri->segment(2);

		$pdata = $this->db->where("id",$project_id)->get("project")->result();

		$data['title'] = "Project edit";
		$data['pdata'] = $pdata;

		view("project.edit_project",$data);

	}

	public function project_update(){
		if(isset($_POST['update'])):
			extract($_POST);


			$data = array(
					"project_name" => $project_name,
					"pksf"			=> $pksf
				);
			
			$update = $this->db->where("id",$project_id)->update("project",$data);
	
			if($update):
				$this->session->set_flashdata("updateMsg","Project information updated");
			else:
				$this->session->set_flashdata("updateMsg","Project information update fail");
			endif;

		
			redirect("new_project","location");

		endif;
	}

}