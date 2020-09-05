<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loan_saving_form extends Base_Controller {

	public function __construct(){
		parent::__construct();
		//$this->load->model('Accounts_model');
	}

	// somiti member
	public function loan_information()
	{
		$data['title'] 			= 'Loan Information';
		$data['regBranchList'] = all('regional_branch_info');
		$data['branchList'] = all('branch_info');
		$data['somitiList'] = all('somiti_info');
		
		view('saving_collection_form.loan.loan_history', $data);
	}
	
	public function loan_collection()
	{
		$data['title'] 			= 'Loan Collection';
		$data['regBranchList'] = all('regional_branch_info');
		$data['branchList'] = all('branch_info');
		$data['somitiList'] = all('somiti_info');
		
		view('saving_collection_form.collection.loan_collection', $data);
	}
	
	public function saving_information()
	{
		$data['title'] 			= 'Saving Information';
		$data['regBranchList'] = all('regional_branch_info');
		$data['branchList'] = all('branch_info');
		$data['somitiList'] = all('somiti_info');
		
		view('saving_collection_form.savings.saving_information', $data);
	}

	// savings opening balance
	public function saving_opening(){
		$data['title'] 			= 'Saving Opening';
		$data['regBranchList'] = all('regional_branch_info');
		$data['branchList'] = all('branch_info');
		$data['somitiList'] = all('somiti_info');
		
		view('saving_collection_form.savings.saving_first_time_setup', $data);	
	}

	// openig savings update
	public function opening_savings_update(){
		if(isset($_POST['save'])):
			extract($_POST);

			$success = 0;
			$ins = 0;
			$update = 0;

			// insert or update data
		for($i = 0;$i < count($mem_id);$i++):
			
			if($amount[$i] != 0 && $amount[$i] != ''):

				$exits = $this->db->where("member_id",$mem_id[$i])->get("saving_log")->num_rows();
// echo $payment_date[$i];exit;
				// $mDate = explode("/",$payment_date[$i]);
				// $modify_date = $mDate[2].'-'.$mDate[0].'-'.$mDate[1];

				if($exits):
					$upData = array(
							"amount"		 => $amount[$i],
							"saving_type" 	 => 1,
							"pay_date" 		 => $payment_date[$i],
							"payment_month"  => $month[$i],
							"week_no" 		 => $week[$i],
							"save_or_widrow" => 1
						);

					$update = $this->db->where("member_id",$mem_id[$i])->update("saving_log",$upData);

				else:

					$data = array(
							"id" 			 => '',
							"member_id" 	 => $mem_id[$i],
							"amount" 		 => $amount[$i],
							"saving_type" 	 => 1,
							"pay_date" 		 => $modify_date,
							"payment_month"  => $month[$i],
							"week_no" 		 => $week[$i],
							"save_or_widrow" => 1
						);

					$ins = $this->db->insert("saving_log",$data);
				endif;
			endif;

				if($ins || $update):
					$success++;
				endif;

		endfor;

		redirect('loan_saving_form/saving_opening','location');

		endif;
	}


// loan collection panel
	public function loan_collection_update(){
		if(isset($_POST['update'])):
			
			extract($_POST);
			$tm = date("m");

			

			for($i = 0;$i < count($member_id);$i++):
					
					// first week capital
					if($capital1[$i]):
						$data1 = array(
								"member_id" => $member_id[$i],
								"week_no"	=> 1,
								"month_no"	=> $tm
							);
					// print_r($data);
						$get_existence = $this->db->get_where("loan_collection",$data1)->num_rows();
						if(!$get_existence):
							$insData1 = array(
									"id"	=>'',
									"member_id" => $member_id[$i],
									"capital"	=> $capital1[$i],
									"charge"	=> $service1[$i],
									"week_no"	=> 1,
									"month_no"	=> $tm
								);
						// print_r($insData);
							$ins1 = $this->db->insert("loan_collection",$insData1);

							if($ins1):
								$this->session->set_flashdata("msg","loan collection save successfully");
							else:
								$this->session->set_flashdata("msg","loan collection save fail");
							endif;

						endif;
					endif;

					// second week capital
					if($capital2[$i]):
						$data2 = array(
								"member_id" => $member_id[$i],
								"week_no"	=> 2,
								"month_no"	=> $tm
							);
					// print_r($data);
						$get_existence = $this->db->get_where("loan_collection",$data2)->num_rows();
						if(!$get_existence):
							$insData2 = array(
									"id"	=>'',
									"member_id" => $member_id[$i],
									"capital"	=> $capital2[$i],
									"charge"	=> $service2[$i],
									"week_no"	=> 2,
									"month_no"	=> $tm
								);
						// print_r($insData);
							$ins2 = $this->db->insert("loan_collection",$insData2);

							if($ins2):
								$this->session->set_flashdata("msg","loan collection save successfully");
							else:
								$this->session->set_flashdata("msg","loan collection save fail");
							endif;

						endif;
					endif;

					// third week capital
					if($capital3[$i]):
						$data3 = array(
								"member_id" => $member_id[$i],
								"week_no"	=> 3,
								"month_no"	=> $tm
							);
					// print_r($data);
						$get_existence = $this->db->get_where("loan_collection",$data3)->num_rows();
						if(!$get_existence):
							$insData3 = array(
									"id"	=>'',
									"member_id" => $member_id[$i],
									"capital"	=> $capital3[$i],
									"charge"	=> $service3[$i],
									"week_no"	=> 3,
									"month_no"	=> $tm
								);
						// print_r($insData);
							$ins3 = $this->db->insert("loan_collection",$insData3);

							if($ins3):
								$this->session->set_flashdata("msg","loan collection save successfully");
							else:
								$this->session->set_flashdata("msg","loan collection save fail");
							endif;

						endif;
					endif;

					// fourth week capital
					if($capital4[$i]):
						$data4 = array(
								"member_id" => $member_id[$i],
								"week_no"	=> 4,
								"month_no"	=> $tm
							);
					// print_r($data);
						$get_existence4 = $this->db->get_where("loan_collection",$data4)->num_rows();
						if(!$get_existence4):
							$insData4 = array(
									"id"	=>'',
									"member_id" => $member_id[$i],
									"capital"	=> $capital4[$i],
									"charge"	=> $service4[$i],
									"week_no"	=> 4,
									"month_no"	=> $tm
								);
						// print_r($data4);
						// print_r($insData4);
						// exit;
							$ins4 = $this->db->insert("loan_collection",$insData4);

							if($ins4):
								$this->session->set_flashdata("msg","loan collection save successfully");
							else:
								$this->session->set_flashdata("msg","loan collection save fail");
							endif;

						endif;
					endif;

					// fifth week capital
					if($capital5[$i]):
						$data5 = array(
								"member_id" => $member_id[$i],
								"week_no"	=> 5,
								"month_no"	=> $tm
							);
					// print_r($data);
						$get_existence5 = $this->db->get_where("loan_collection",$data5)->num_rows();
						if(!$get_existence5):
							$insData5 = array(
									"id"	=>'',
									"member_id" => $member_id[$i],
									"capital"	=> $capital5[$i],
									"charge"	=> $service5[$i],
									"week_no"	=> 5,
									"month_no"	=> $tm
								);
						// print_r($insData);
							$ins5 = $this->db->insert("loan_collection",$insData5);

							if($ins5):
								$this->session->set_flashdata("msg","loan collection save successfully");
							else:
								$this->session->set_flashdata("msg","loan collection save fail");
							endif;

						endif;
					endif;
				
			endfor;

		endif;

		// redirection to previous page
		redirect("loan_collection","location");
	}


	// savings section start
	public function saving_collection_update(){
		if(isset($_POST['update'])):
			extract($_POST);

			$tm = date("m");

			$ins_data = array();

			for($i = 0;$i < count($member_id);$i++):
				
////////////////////////////// general saving part ///////////////////////////////////////
				
				// First week
					$data = array(
							"member_id"		=> $member_id[$i],
							"payment_month" => $tm,
							"week_no"		=> 1,
							"saving_type"	=> 1,
							"save_or_widrow"=> 1
						);
				// print_r($data);
					$get_existence = $this->db->get_where("saving_log",$data)->num_rows();
				
					if(!$get_existence):
						if(($saving_collection1[$i] != '') || ($saving_collection1[$i] != 0) ):
							$data1 = array(
									"id" => '',
									"member_id" => $member_id[$i],
									"amount"	=> $saving_collection1[$i],
									"saving_type" => 1,
									"payment_month" => $tm,
									"week_no"		=> 1,
									"save_or_widrow" => 1
								);

							array_push($ins_data, $data1);

						endif;
					endif;

					// second week
					$data = array(
							"member_id"		=> $member_id[$i],
							"payment_month" => $tm,
							"week_no"		=> 2,
							"saving_type"	=> 1,
							"save_or_widrow"=> 1
						);
					// print_r($data);
					$get_existence = $this->db->get_where("saving_log",$data)->num_rows();
				
					if(!$get_existence):
						if(($saving_collection2[$i] != '') || ($saving_collection2[$i] != 0) ):
							$data1 = array(
									"id" => '',
									"member_id" => $member_id[$i],
									"amount"	=> $saving_collection2[$i],
									"saving_type" => 1,
									"payment_month" => $tm,
									"week_no"		=> 2,
									"save_or_widrow" => 1
								);

							array_push($ins_data, $data1);

						endif;
					endif;

					// third week
					$data = array(
							"member_id"		=> $member_id[$i],
							"payment_month" => $tm,
							"week_no"		=> 3,
							"saving_type"	=> 1,
							"save_or_widrow"=> 1
						);
					// print_r($data);
					$get_existence = $this->db->get_where("saving_log",$data)->num_rows();
				
					if(!$get_existence):
						if(($saving_collection3[$i] != '') || ($saving_collection3[$i] != 0) ):
							$data1 = array(
									"id" => '',
									"member_id" => $member_id[$i],
									"amount"	=> $saving_collection3[$i],
									"saving_type" => 1,
									"payment_month" => $tm,
									"week_no"		=> 3,
									"save_or_widrow" => 1
								);

							array_push($ins_data, $data1);

						endif;
					endif;

					// fourth week
					$data = array(
							"member_id"		=> $member_id[$i],
							"payment_month" => $tm,
							"week_no"		=> 4,
							"saving_type"	=> 1,
							"save_or_widrow"=> 1
						);
					// print_r($data);
					$get_existence = $this->db->get_where("saving_log",$data)->num_rows();
				
					if(!$get_existence):
						if(($saving_collection4[$i] != '') || ($saving_collection4[$i] != 0) ):
							$data1 = array(
									"id" => '',
									"member_id" => $member_id[$i],
									"amount"	=> $saving_collection4[$i],
									"saving_type" => 1,
									"payment_month" => $tm,
									"week_no"		=> 4,
									"save_or_widrow" => 1
								);

							array_push($ins_data, $data1);

						endif;
					endif;

					// fifth week
					$data = array(
							"member_id"		=> $member_id[$i],
							"payment_month" => $tm,
							"week_no"		=> 5,
							"saving_type"	=> 1,
							"save_or_widrow"=> 1
						);
					// print_r($data);
					$get_existence = $this->db->get_where("saving_log",$data)->num_rows();
				
					if(!$get_existence):
						if(($saving_collection5[$i] != '') || ($saving_collection5[$i] != 0) ):
							$data1 = array(
									"id" => '',
									"member_id" => $member_id[$i],
									"amount"	=> $saving_collection5[$i],
									"saving_type" => 1,
									"payment_month" => $tm,
									"week_no"		=> 5,
									"save_or_widrow" => 1
								);

							array_push($ins_data, $data1);

						endif;
					endif;


//////////////////////////////// sessa saving part //////////////////////////////////////////////

					// First week
					$data = array(
							"member_id"		=> $member_id[$i],
							"payment_month" => $tm,
							"week_no"		=> 1,
							"saving_type"	=> 2,
							"save_or_widrow"=> 1
						);
				// print_r($data);
					$get_existence = $this->db->get_where("saving_log",$data)->num_rows();
				
					if(!$get_existence):
						if(($sessa_saving_collection1[$i] != '') || ($sessa_saving_collection1[$i] != 0) ):
							$data1 = array(
									"id" => '',
									"member_id" => $member_id[$i],
									"amount"	=> $sessa_saving_collection1[$i],
									"saving_type" => 2,
									"payment_month" => $tm,
									"week_no"		=> 1,
									"save_or_widrow" => 1
								);

							array_push($ins_data, $data1);

						endif;
					endif;

					// second week
					$data = array(
							"member_id"		=> $member_id[$i],
							"payment_month" => $tm,
							"week_no"		=> 2,
							"saving_type"	=> 2,
							"save_or_widrow"=> 1
						);
					// print_r($data);
					$get_existence = $this->db->get_where("saving_log",$data)->num_rows();
				
					if(!$get_existence):
						if(($sessa_saving_collection2[$i] != '') || ($sessa_saving_collection2[$i] != 0) ):
							$data1 = array(
									"id" => '',
									"member_id" => $member_id[$i],
									"amount"	=> $sessa_saving_collection2[$i],
									"saving_type" => 2,
									"payment_month" => $tm,
									"week_no"		=> 2,
									"save_or_widrow" => 1
								);

							array_push($ins_data, $data1);

						endif;
					endif;

					// third week
					$data = array(
							"member_id"		=> $member_id[$i],
							"payment_month" => $tm,
							"week_no"		=> 3,
							"saving_type"	=> 2,
							"save_or_widrow"=> 1
						);
					// print_r($data);
					$get_existence = $this->db->get_where("saving_log",$data)->num_rows();
				
					if(!$get_existence):
						if(($sessa_saving_collection3[$i] != '') || ($sessa_saving_collection3[$i] != 0) ):
							$data1 = array(
									"id" => '',
									"member_id" => $member_id[$i],
									"amount"	=> $sessa_saving_collection3[$i],
									"saving_type" => 2,
									"payment_month" => $tm,
									"week_no"		=> 3,
									"save_or_widrow" => 1
								);

							array_push($ins_data, $data1);

						endif;
					endif;

					// fourth week
					$data = array(
							"member_id"		=> $member_id[$i],
							"payment_month" => $tm,
							"week_no"		=> 4,
							"saving_type"	=> 2,
							"save_or_widrow"=> 1
						);
					// print_r($data);
					$get_existence = $this->db->get_where("saving_log",$data)->num_rows();
				
					if(!$get_existence):
						if(($sessa_saving_collection4[$i] != '') || ($sessa_saving_collection4[$i] != 0) ):
							$data1 = array(
									"id" => '',
									"member_id" => $member_id[$i],
									"amount"	=> $sessa_saving_collection4[$i],
									"saving_type" => 2,
									"payment_month" => $tm,
									"week_no"		=> 4,
									"save_or_widrow" => 1
								);

							array_push($ins_data, $data1);

						endif;
					endif;

					// fifth week
					$data = array(
							"member_id"		=> $member_id[$i],
							"payment_month" => $tm,
							"week_no"		=> 5,
							"saving_type"	=> 2,
							"save_or_widrow"=> 1
						);
					// print_r($data);
					$get_existence = $this->db->get_where("saving_log",$data)->num_rows();
				
					if(!$get_existence):
						if(($sessa_saving_collection5[$i] != '') || ($sessa_saving_collection5[$i] != 0) ):
							$data1 = array(
									"id" => '',
									"member_id" => $member_id[$i],
									"amount"	=> $sessa_saving_collection5[$i],
									"saving_type" => 2,
									"payment_month" => $tm,
									"week_no"		=> 5,
									"save_or_widrow" => 1
								);

							array_push($ins_data, $data1);

						endif;
					endif;


					// save widraw amount
					if( ($widrawAmount[$i] != 0 ) &&  ($widrawAmount[$i] != '') ):
						$widrawDataIns = array(
								"id" 			 => '',
								"member_id" 	 => $member_id[$i],
								"amount" 		 => $widrawAmount[$i],
								"saving_type" 	 => 1,
								"payment_month"  => $tm,
								"week_no" 		 => 0,
								"save_or_widrow" => 2
							);

						array_push($ins_data, $widrawDataIns);

					endif;
					
			endfor;

			

			// echo '<pre>';
			// print_r($widrawAmount);
			// print_r($widrawDataIns);exit;

		// total insert data

			if(!empty($ins_data)):
				$ins = $this->db->insert_batch("saving_log",$ins_data);
			
				if($ins):
					$this->session->set_flashdata("msg","Data successfully update");
				else:
					$this->session->set_flashdata("msg","Data fail to update");
				endif;

			endif;

			// redirection
			redirect("loan_saving_form/saving_information","location");

		endif;
	}
	// savings section end

}