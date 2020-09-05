<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Start class Attendence
class Attendence extends Base_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->model('Attendence_model');
	}

	public function index(){
		$data['title'] = 'Show attendence';
		$data['regionalbranchList'] = all('regional_branch_info');
		$branch_id = e(get('branch'));
		$employee = e(get('employee'));
		$from = e(get('from'));
		$to = e(get('to'));
		if(!empty($branch_id)){
			$data['attendenceList'] = $this->Attendence_model->searchAttendence($branch_id, $employee, $from, $to);
		}
		view('Attendence.Show_attendence', $data);
	}

	//Start getEmpoyeeList
	public function getEmpoyeeList(){
		$data = find('employee_info', ['id', 'emp_name'], ['branch_id', e(post('branch'))], '*');
		echo json_encode($data);
	}
	//End getEmpoyeeList

}
//End class Attendence
?>