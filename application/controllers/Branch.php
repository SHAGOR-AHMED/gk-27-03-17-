<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Start class Branch
class Branch extends Base_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->model('Branch_model');
		
	}

	public function get_branch_form(){
		if(!hasPermission('add_branch')){ redirect(base_url('/')); return false;};

		$data ['title'] ='Create Branch';
		$data['districts'] = all('districts');
		$data['regionalbranchList'] = all('regional_branch_info');
		view('Branch.Branch_create',$data);

	}

	//Start post_branch
	public function post_branch(){
		if(!hasPermission('add_branch')){ redirect(base_url('/')); return false;};

		$data = [
			'name' => e(post('branch_name')),
			'reg_branch_id' => e(post('reg_branch_name')),
			'address' => e(post('address')),
			'email' => e(post('email')),
			'phone' => e(post('phone')),
			'zila' => e(post('zilla')),
			'upazila' => e(post('upazilla')),
			'pksf_non_pksf' => e(post('pksf_non_pksf'))
		];

		$rtm = create('branch_info',$data);
		if ($rtm) {
			setFMessage('msg_br','Branch created successfuly');
		} else {
			setFMessage('msg_br','Something went wrong!, please try again latter.');
		}
		redirect('get_branch_form');
	}
	//End post_branch

	//Start search_branch
	public function search_branch(){
		if(!hasPermission('search_branch')){ redirect(base_url('/')); return false;};

		$data['title'] = 'Seach branch';
		$data['districts'] = all('districts');
		$data['regionalbranchList'] = all('regional_branch_info');
		$reg_branch = get('reg_branch');
		if(!empty($reg_branch)){
			$q['reg_branch_id'] = $reg_branch;
			$data['branchList'] = find('branch_info', ['*'], $q, '*');
		}

		view('Branch.Search_branch', $data);
	}
	//End search_branch

	//Start edit_branch
	public function edit_branch(){
		if(!hasPermission('edit_branch')){ redirect(base_url('/')); return false;};

		$branch_id = segment(3);
		$data['title'] = 'Edit branch';
		$data['districts'] = all('districts');
		$data['branch'] = $this->Branch_model->fetchBranch($branch_id);
		view('Branch.Edit_branch', $data);
	}
	//End edit_branch

	//Start update_branch
	public function update_branch(){
		if(!hasPermission('edit_branch')){ redirect(base_url('/')); return false;};
		
		$data = [
			'reg_branch_id' => e(post('branch_reg_id')),
			'name' => e(post('branch_name')),
			'address' => e(post('address')),
			'email' => e(post('email')),
			'phone' => e(post('phone')),
			'zila' => e(post('zilla')),
			'upazila' => e(post('upazilla')),
			'pksf_non_pksf' => e(post('pksf_non_pksf'))
		];

		$rtm = update('branch_info', $data, ['id' => e(post('branch_id'))]);
		if($rtm){
			setFMessage('msg_br', 'Branch updated successfully!');
		}else{
			setFMessage('msg_br', 'Something went wrong!, please try again latter.');
		}
		redirect(base_url('edit/branch/').'/'.post('branch_id'));
	}
	//End update_branch

	// delete branch section start
	public function delete_branch(){
		$branch_id = segment(3);

		$del = $this->db->where("id",$branch_id)->delete("branch_info");

		if($del):
			$this->session->set_flashdata("msg","successfully branch information delete .");
		else:
			$this->session->set_flashdata("msg","Fail to delete branch information.");
		endif;

		redirect(base_url("search_branch"));

	}
	// end of delete branch section


}
//End class Branch
?>