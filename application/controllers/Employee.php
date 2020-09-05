<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Start class Employee
class Employee extends Base_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->model('Employee_model');

	}

	public function get_employee_form(){
		if(!hasPermission('add_employee')){ redirect(base_url('/')); return false;};

		$data['title'] = 'Employee';
		$data['regBranchList'] = all('regional_branch_info','id, name');
		$data['districts'] = all('districts');
		$data['somitiList'] = all('somiti_info');
		view('Employee.Employee_create', $data);
	}

	//Start create_employee
	public function create_employee(){
		if(!hasPermission('add_employee')){ redirect(base_url('/')); return false;};

		$flag = false;
		$status = '';
		$user_id = e(post('emp_name')).e(post('emp_phone')).time();
		$user_id = sha1($user_id);
		//upload image
		$config['upload_path'] = './uploads/employee';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['max_size']	= '512';
		$config['max_width'] = '400';
		$config['max_height'] = '400';
		$config['file_name'] = $user_id;
		$config['overwrite'] = TRUE;

		$this->load->library('upload', $config);

		// getting image name
		$path = $_FILES['userfile']['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);
		if(empty($path) && empty($ext)){
			$photo = e(post('photo'));
		}else{
			if ($this->upload->do_upload('userfile') == FALSE)
			{
				$status = str_replace(array("<p>","</p>"), "", $this->upload->display_errors());
				setFMessage('msg_employee', $status);
				redirect(base_url('get_employee_form'));
				return false;
			}
			$photo = $user_id.".".$ext;
		}

// set employee type
		$empType = e(post('empType'));
		$regional_br = e(post('reg_branch'));
		$branch = e(post('branch'));
		$fid = 0;

		if($empType == 1):
			$regional_br = 0;
			$branch = 0;
			$fid = 0;
		elseif($empType == 2):
			$branch = 0;
			$fid = 0;
		elseif($empType == 3):
			$fid = 0;
		else:
			$fid = $this->db->select("fid")->from("employee_info")->order_by("id","DESC")->limit(1)->get()->row()->fid + 1;
		endif;


		// insert data here
		$data = [
			'reg_branch_id' => $regional_br,
			'branch_id' => $branch,
			'field_id' => $fid,
			'emp_name' => e(post('emp_name')),
			'emp_father_husband' => e(post('emp_father_husband')),
			'emp_mother' => e(post('emp_mother_name')),
			'emp_dob' => e(post('dob')),
			'emp_joining' => e(post('joining_date')),
			'emp_designation' => e(post('emp_designation')),
			'emp_phone' => e(post('emp_phone')),
			'emp_email' => e(post('emp_email')),
			'emp_address' => e(post('emp_address')),
			'parmanent_address' => e(post('emp_parmanent_address')),
			'emp_blood_group' => e(post('blood_group')),
			'marital_status' => e(post('marital')),
			'education' => e(post('emp_education')),
			'nationality' => e(post('nationality')),
			'nid' => e(post('nid')),
			'gender' => e(post('gender')),
			'religion' => e(post('religion')),
			'reference_name' => e(post('ref_name')),
			'photo' => $photo

		];
		$rtm = create('employee_info', $data, true);
		create('users', ['user_id' => $rtm, 'username' => e(post('emp_phone')), 'password' => sha1('12345'), 'usertype' => '5']);
		if ($rtm) {
			setFMessage('msg_employee', 'Employee created successfully!');
		} else {
			setFMessage('msg_employee','Something went wrong!, please try again latter.');
		}

		redirect(base_url('get_employee_form'));
	}
	//End create_employee

	//Start search_employee
	public function search_employee(){
		if(!hasPermission('search_employee')){ redirect(base_url('/')); return false;};

		$data['title'] = 'Search Employee';
		$data['regBranchList'] = all('regional_branch_info','id, name');
		$reg_branch = get('reg_branch');
		$branch = get('branch');
		if (!empty($reg_branch) && !empty($branch)) {
			$data['empList'] = $this->Employee_model->serachEmployee($reg_branch, $branch);
		}

		view('Employee.Search_employee', $data);
	}
	//End search_employee

	//Start edit_employee
	public function edit_employee(){
		if(!hasPermission('edit_employee')){ redirect(base_url('/')); return false;};

		$emp_id = segment(3);
		$data['title'] = 'Edit Employee';
		$data['regBranchList'] = all('regional_branch_info','id, name');
		$data['districts'] = all('districts');
		$data['employee'] = $this->Employee_model->fetchEmployee($emp_id);
		// dd($data);
		view('Employee.Edit_employee', $data);
	}
	//End edit_employee

	//Start update_employee
	public function update_employee(){
		if(!hasPermission('edit_employee')){ redirect(base_url('/')); return false;};

		$emp_id = e(post('emp_hidden'));

		$flag = false;
		$status = '';
		// $user_id = e(post('emp_name')).e(post('emp_phone')).time();
		// $user_id = sha1($user_id);
		$user_id = explode('.', e(post('photo')));
		//upload image
		$config['upload_path'] = './uploads/employee';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['max_size']	= '512';
		$config['max_width'] = '400';
		$config['max_height'] = '400';
		$config['file_name'] = $user_id[0];
		$config['overwrite'] = TRUE;

		$this->load->library('upload', $config);

		// getting image name
		$path = $_FILES['userfile']['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);
		if(empty($path) && empty($ext)){
			$photo = e(post('photo'));
		}else{
			if ($this->upload->do_upload('userfile') == FALSE)
			{
				$status = str_replace(array("<p>","</p>"), "", $this->upload->display_errors());
				setFMessage('msg_employee', $status);
				redirect(base_url('get_employee_form'));
				return false;
			}
			$photo = $user_id[0].".".$ext;
		}
		// insert data here
		$data = [
			'reg_branch_id' => e(post('reg_branch')),
			'branch_id' => e(post('branch')),
			'emp_name' => e(post('emp_name')),
			'emp_father_husband' => e(post('emp_father_husband')),
			'emp_mother' => e(post('emp_mother_name')),
			'emp_dob' => e(post('dob')),
			'emp_joining' => e(post('joining_date')),
			'emp_designation' => e(post('emp_designation')),
			'emp_phone' => e(post('emp_phone')),
			'emp_email' => e(post('emp_email')),
			'emp_address' => e(post('emp_address')),
			'parmanent_address' => e(post('emp_parmanent_address')),
			'emp_blood_group' => e(post('blood_group')),
			'marital_status' => e(post('marital')),
			'education' => e(post('emp_education')),
			'nationality' => e(post('nationality')),
			'nid' => e(post('nid')),
			'gender' => e(post('gender')),
			'religion' => e(post('religion')),
			'reference_name' => e(post('ref_name')),
			'photo' => $photo
		];

		$rtm = update('employee_info',$data,['id' => $emp_id]);

		if ($rtm) {
			setFMessage('msg_employee', 'Employee updated successfully!');
		} else {
			setFMessage('msg_employee','Something went wrong!, please try again latter.');
		}

		redirect(base_url('edit/employee/')."/".$emp_id);

	}
	//End update_employee

	//Start view_employee_info
	public function view_employee_info(){
		if(!hasPermission('view_employee_info')){ redirect(base_url('/')); return false;};

		$data['title'] = 'View Employee';
		$data['employee'] = find('employee_info','*',['id' => segment(2)]);
		view('Employee.View_employee_info', $data);
	}
	//End view_employee_info

	//Start deactive_employee
	public function active_deactive_employee(){
		if(!hasPermission('active_deactive_employee')){ redirect(base_url('/')); return false;};

		$emp_id = segment(2);
		$employee_status = find('employee_info', '*',['id' => $emp_id]);
		$employee_status = (bool) $employee_status->active;
		$employee_status = ($employee_status)? 0 : 1;
		$data = [ 'active' => $employee_status ];
		$rtm = update('employee_info', $data, ['id' => $emp_id]);
			   update('users', ['active' => $employee_status], ['user_id' => $emp_id]);
		if ($employee_status) {
			if ($rtm) {
				setFMessage('msg_employee','Employee activated successfuly');
			} else {
				setFMessage('msg_employee','Something went wrong!, please try again latter.');
			}
		}else{
			if ($rtm) {
				setFMessage('msg_employee','Employee deactivated successfuly');
			} else {
				setFMessage('msg_employee','Something went wrong!, please try again latter.');
			}
		}

		redirect(base_url('employee').'/'.$emp_id);
	}
	//End deactive_employee

	public function set_employee_role()
	{
		if(!hasPermission('set_employee_role')){ redirect(base_url('/')); return false;};

		$data['title'] = 'Set Employee Role';
		$data['regBranchList'] = all('regional_branch_info','id, name');
		$data['roles'] = all('roles');
		$reg_branch = get('reg_branch');
		$branch = get('branch');
		if (!empty($reg_branch) && !empty($branch)) {
			$data['empList'] = $this->Employee_model->serachEmployeeWithRole($reg_branch, $branch);
		}

	    view('Employee.Set_employee_role', $data);
	}

	public function set_role()
	{
		if(!hasPermission('set_employee_role')){ redirect(base_url('/')); return false;};
		$rtm = update('users', ['usertype' => post('role_id')], ['user_id' => post('employee_id')]);
		echo json_encode($rtm);
	}

	// employee information delete
	public function delete_employee(){
		$employee_id = $this->uri->segment(3);

		$employee_info = $this->Employee_model->fetchEmployee($employee_id);

		unlink("uploads/employee/".$employee_info->photo);

		$del = $this->db->where("id",$employee_id)->delete("employee_info");

		if($del):
			$this->session->set_flashdata("msg","Employee delation successfuly");
		else:
			$this->session->set_flashdata("msg","Fail to delete employee information");
		endif;

		redirect("search_employee");

	}

}
//End class Employee
