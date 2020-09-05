<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Start class Somiti
class Somiti extends Base_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->model('Somiti_model');
		$this->load->model('Employee_model');
	}

	//Start getBranchList
	public function getBranchList(){
		$branchList = find('branch_info', ['id', 'reg_branch_id', 'name'], ['reg_branch_id' => e(post('regional_branch'))], '*');
		echo json_encode($branchList);
	}
	//End getBranchList

	public function get_somiti_form(){
		if(!hasPermission('add_somiti')){ redirect(base_url('/')); return false;};

		$data['title'] = 'Create somiti';
		$data['districts'] = all('districts');
		$data['employeeList'] = all('employee_info', 'id, emp_name');
		$data['regBranchList'] = all('regional_branch_info');
		view('Somiti.Somiti_create', $data);
	}

	//Start create_somiti
	public function create_somiti(){
		if(!hasPermission('add_somiti')){ redirect(base_url('/')); return false;};

		$project = $_POST['project'];

		$s_type = $this->db->where("id",$_POST['employee'])->get("employee_info")->row()->gender;

		$data = [
			'emp_id' => e(post('employee')),
			'name' => e(post('somiti_name')),
			'address' => e(post('somiti_address')),
			'email' => e(post('email')),
			'phone' => e(post('phone')),
			'zila' => e(post('zilla')),
			'upazila' => e(post('upazilla')),
			'reg_branch_id' => e(post('reg_branch')),
			'branch_id' => e(post('branch')),
			'somiti_type' => $s_type
		];
		$rtm = create('somiti_info',$data);
		if ($rtm) {

			// insert data to somiti project table
			$somiti_id = $this->db->order_by("id","DESC")->limit(1)->get("somiti_info")->row()->id;

			$somitiData = array();

			// project insert
			if(isset($project)):

				for($i = 0;$i < count($project);$i++):

					$temp = array(
						"id" => '',
						"somiti_id" => $somiti_id,
						"project_id" => $project[$i]
					);

				array_push($somitiData, $temp);

				endfor;
				
				$this->db->insert_batch("somiti_project",$somitiData);
			
			endif;


			setFMessage('msg_somiti','Somiti created successfuly');
		} else {
			setFMessage('msg_somiti','Something went wrong!, please try again latter.');
		}
		redirect('get_somiti_form');
	}
	//End create_somiti

	//Start search_somiti
	public function search_somiti(){
		if(!hasPermission('search_somiti')){ redirect(base_url('/')); return false;};

		$data['title'] = 'Search somiti';
		$data['regBranchList'] = all('regional_branch_info');
		$branch_id = e(get('branch'));
		$reg_branch_id = e(get('reg_branch'));
		if(!empty($branch_id) && !empty($reg_branch_id)){
			$data['somitiList'] = find('somiti_info', '*', ['branch_id' => $branch_id, 'reg_branch_id' => $reg_branch_id], '*');
		}
		view('Somiti.Search_somiti', $data);
	}
	//End search_somiti

	//Start edit_somiti
	public function edit_somiti(){
		if(!hasPermission('edit_somiti')){ redirect(base_url('/')); return false;};

		$somiti_id = segment(3);
		$data['employeeList'] = all('employee_info', 'id, emp_name');
		$data['title'] = 'Edit somiti';
		$data['districts'] = all('districts');
		$data['regBranchList'] = all('regional_branch_info');
		$data['somiti'] = $this->Somiti_model->fetchSomiti($somiti_id);
		view('Somiti.Edit_somiti', $data);
	}
	//End edit_somiti

	//Start update_somiti
	public function update_somiti(){
		if(!hasPermission('edit_somiti')){ redirect(base_url('/')); return false;};
		
		// $project = implode(",", $_POST['project']);
		$s_type = $this->db->where("id",$_POST['employee'])->get("employee_info")->row()->gender;


		$somiti_id = e(post('somiti_id'));
		$data = [
			'emp_id' => e(post('employee')),
			'name' => e(post('somiti_name')),
			'address' => e(post('somiti_address')),
			'email' => e(post('email')),
			'phone' => e(post('phone')),
			'zila' => e(post('zilla')),
			'upazila' => e(post('upazilla')),
			'branch_id' => e(post('branch')),
			'reg_branch_id' => e(post('reg_branch')),
			'somiti_type' => $s_type
		];

		$rtm = update('somiti_info', $data, ['id' => $somiti_id]);
		if($rtm){
		
			$project = $_POST['project'];

		// insert data to somiti project table

			$somitiData = array();

			if(isset($project)):

				for($i = 0;$i < count($project);$i++):

					$temp = array(
						"id" => '',
						"somiti_id" => $somiti_id,
						"project_id" => $project[$i]
					);

				array_push($somitiData, $temp);

				endfor;

				$this->db->insert_batch("somiti_project",$somitiData);
			
			endif;
			

			setFMessage('msg_somiti', 'Somiti updated successfully!');
		}else{
			setFMessage('msg_somiti', 'Something went wrong!, please try again latter.');
		}
		redirect(base_url('edit/somiti/').'/'.$somiti_id);
	}
	//End update_somiti

	// somiti member info
	public function somiti_member(){
		$data['title'] = 'Somiti Employee Information';
		$data['regBranchList'] = all('regional_branch_info');
		view('Member.somiti_member_info', $data);
	}
	// end somiti member info

	// get employee list
	public function getEmp(){
		$reg_branch = $_POST['reg_branch'];
		$branch = $_POST['branch'];

		$empList = $this->Employee_model->employeeListConcat($reg_branch, $branch);

		echo $empList->id."+".$empList->name;

	}


	// delete function for somiti
	public function delete_somiti(){
		$somiti_id = $this->uri->segment(3);
		$del = $this->db->where("id",$somiti_id)->delete("somiti_info");

		if($del):
			$this->session->set_flashdata("msg","Somiti info deleted successfully");
		else:
			$this->session->set_flashdata("msg","Fail to delete somiti information");
		endif;

		redirect(base_url("search_somiti"));

	}

}
//End class Somiti
?>