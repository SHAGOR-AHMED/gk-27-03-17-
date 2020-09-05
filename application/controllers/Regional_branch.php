<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Start class Regional_branch
class Regional_branch extends Base_Controller {


	public function __construct(){
		parent::__construct();
		
	}

	public function get_reg_branch_form(){
		if(!hasPermission('add_regional_branch')){ redirect(base_url('/')); return false;};

		$data['title'] = 'Regional branch';
		$data['districts'] = all('districts');
		view('Reg_branch.Regional_branch_create', $data);
	}

	//Start post_reg_branch
	public function post_reg_branch(){
		if(!hasPermission('add_regional_branch')){ redirect(base_url('/')); return false;};

		$data = [
			'name' => e(post('regional_branch_name')),
			'address' => e(post('address')),
			'email' => e(post('email')),
			'phone' => e(post('phone')),
			'zila' => e(post('zilla')),
			'upazila' => e(post('upazilla')),
		];
		$rtm = create('regional_branch_info', $data);
		if($rtm){
			setFMessage('msg_reg_br', 'Regional branch created successfully!');
		}else{
			setFMessage('msg_reg_br', 'Something went wrong!, please try again latter.');
		}
		redirect('get_reg_branch_form');
	}
	//End post_reg_branch

	//Start search_regional_branch
	public function search_regional_branch(){
		if(!hasPermission('search_regional_branch')){ redirect(base_url('/')); return false;};

		$data['title'] = 'Search Regional branch';
		$data['regionalBranchList'] = all('regional_branch_info');
		view('Reg_branch.Search_regional_branch', $data);
	}
	//End search_regional_branch

	//Start edit_regional_branch
	public function edit_regional_branch(){
		if(!hasPermission('edit_regional_branch')){ redirect(base_url('/')); return false;};

		$branch_id = segment(3);
		$data['title'] = 'Edit Regional branch';
		$data['districts'] = all('districts');
		$data['branch'] = find('regional_branch_info', ['*'], ['id' => $branch_id]);
		view('Reg_branch.Edit_regional_branch', $data);
	}
	//End edit_regional_branch

	//Start update_reg_branch
	public function update_reg_branch(){
		if(!hasPermission('edit_regional_branch')){ redirect(base_url('/')); return false;};
		
		$data = [
			'name' => e(post('regional_branch_name')),
			'address' => e(post('address')),
			'email' => e(post('email')),
			'phone' => e(post('phone')),
			'zila' => e(post('zilla')),
			'upazila' => e(post('upazilla'))
		];
		$rtm = update('regional_branch_info', $data, ['id' => e(post('reg_branch_id'))]);
		if($rtm){
			setFMessage('msg_reg_br', 'Regional branch updated successfully!');
		}else{
			setFMessage('msg_reg_br', 'Something went wrong!, please try again latter.');
		}
		redirect(base_url('edit/regional_branch/').'/'.post('reg_branch_id'));
	}
	//End update_reg_branch

	// delete function for regional branch
	public function delete_reg_branch(){
		$reg_branch_id = $this->uri->segment(3);
		$del = $this->db->where("id",$reg_branch_id)->delete("regional_branch_info");

		if($del):
			$this->session->set_flashdata("msg","Regional Branch deleted successfully");
		else:
			$this->session->set_flashdata("msg","Fail to delete regional branch information");
		endif;

		redirect(base_url("search_regional_branch"));

	}

}
//End class Regional_branch
?>