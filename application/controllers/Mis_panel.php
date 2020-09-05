<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mis_panel extends Base_Controller {

	public function __construct(){
		parent::__construct();
		//$this->load->model('Accounts_model');
	}

	// somiti member
	public function mis_somiti_member()
	{
		$data['title'] 			= 'Somiti and Member Related';
		//$data['regBranchList'] 	= all('regional_branch_info');
		
		view('Reports.Mis.SomitiMemeber', $data);
	}

	// somiti member admission , deletion , saving report
	public function mis_pomis2()
	{
		$data['title'] 			= 'POMIS-2';
		//$data['regBranchList'] 	= all('regional_branch_info');
		
		view('Reports.Mis.pomis2', $data);
	}
	
	 // mis_pomis2a report
	public function mis_pomis2A()
	 {
	  $data['title']    = 'POMIS-2A';
	  //$data['regBranchList']  = all('regional_branch_info');
	  
	  view('Reports.Mis.pomis2A', $data);
	 }
	 
	  // mis_pomis3 report
	public function mis_pomis3()
	 {
	  $data['title']    = 'POMIS-3';
	  //$data['regBranchList']  = all('regional_branch_info');
	  
	  view('Reports.Mis.pomis3', $data);
	 }
	
	 // pomis 5 part 1
	 public function mis_pomis5_part1(){
	 	$data['title']    = 'POMIS-5 Part 1';
		view('Reports.Mis.pomis5_part1', $data);
	 }
	 
	  // pomis 5 part 2
	 public function mis_pomis5_part2(){
	 	$data['title']    = 'POMIS-5 Part 2';
		view('Reports.Mis.pomis5_part2', $data);
	 }
	 
	  // mis_pomis5 report
	public function mis_pomis5a()
	 {
	  $data['title']    = 'POMIS-5.A';
	  //$data['regBranchList']  = all('regional_branch_info');
	  
	  view('Reports.Mis.pomis5a', $data);
	 }
	 
	 // pomis 5B
	 public function mis_pomis5b(){
	 	$data['title']    = 'POMIS-5.B';
		view('Reports.Mis.pomis5b', $data);
	 }

	 // all employee list
	 public function employeeList(){
	 	$data['title']    = 'Employee List';
		view('Reports.Mis.employeeList', $data);
	 }
}