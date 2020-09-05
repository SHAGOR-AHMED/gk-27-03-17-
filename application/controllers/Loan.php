<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Loan extends Base_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->model('Loan_model');
	}

	public function loan_sanction()
	{
		if(!hasPermission('loan_sanction')){ redirect(base_url('/')); return false;};

		$data['title'] = 'Loan sanction';
		$data['regBranchList'] = all('regional_branch_info');
		$data['branchList'] = all('branch_info');
		$data['somitiList'] = all('somiti_info');
		view('Loans.Loan_sanction', $data);
	}

	public function get_loan_serial(){
		$serial = 1;
		$loan = find('loan_info', '*', ['somiti_id' => post('somiti_id'), 'member_id' => post('member_id'), 'active' => 0], null, [], true, 'id desc');
		if(count($loan)){
			$serial = $loan->loan_serial_no+1;
		}
		echo json_encode($serial);
	}

	public function create_loan(){
		if(!hasPermission('loan_sanction')){ redirect(base_url('/')); return false;};
		//check if the member is eligible for loan
		$isEligiable = find('loan_info', '*', ['somiti_id' => post('somiti'), 'member_id' => post('member'), 'active' => 1], '*');
		if(count($isEligiable)){
			setFMessage('message', '<script>alert("You must close your previous loan.");</script>');
			redirect(base_url('/loan_sanction'));
			return false;
		}
		$data = [
			'reg_branch_id' => post('reg_branch_name'),
			'branch_id' => post('branch'),
			'somiti_id' => post('somiti'),
			'member_id' => post('member'),
			'loan_serial_no' => post('loan_serial'),
			'loan_type' => post('loan_type'),
			'interest_in_percentage' => post('loan_in_percentage'),
			'loan_amount' => post('loan_amount'),
			'interest_amount' => post('loan_interest'),
			'total_amount' => post('total_amount'),
			'loan_purpose' => post('loan_purpose'),
			'opening_date' => post('loan_opening_date'),
			'closing_date' => post('loan_closing_date'),
			'user_id' => auth('user_id')
		];
		$rtm = create('loan_info', $data);
		if($rtm){
			setFMessage('message', 'Loan has been created successfully');
			redirect(base_url('/loan_sanction'));
		}else{
			setFMessage('message', 'Loan can not create at this moment! Please try again latter');
			redirect(base_url('/loan_sanction'));
		}
	}

	public function installment(){
		if(!hasPermission('loan_installment')){ redirect(base_url('/')); return false;};

		$data['title'] = 'Loan installment';
		$data['regBranchList'] = all('regional_branch_info');
		$data['branchList'] = all('branch_info');
		$data['somitiList'] = all('somiti_info');
		view('Loans.Loan_installment', $data);
	}

	public function get_member_loan_serial(){
		$serials = find('loan_info', 'loan_serial_no', ['somiti_id' => post('somiti_id'), 'member_id' => post('member_id'), 'active' => 1]);
		echo json_encode($serials);
	}

	//calculate colletcatble loan, collectable interert
	//advanced/due amount for a specific member
	public function get_member_loan_info()
	{
		$data = [ 'collectable_amount' => 0, 'collectable_interest' => 0, 'message' => '', 'amount' => 0, 'week_no' => '' ];
		$somiti_id = post('somiti_id');
		$member_id = post('member_id');
		$loan_serial_no = post('loan_serial');
		$given_installment_date = post('installment_date');
		$loan_type = 'weekly';
		$number_of_day_from_first_installment = 0;
		$number_to_multiply = 0;
		$collectable_amount = 0;
		$collectable_interest = 0;

		//calculate the collectable amount while it is weekly, monthly, yearly
		$loan_info = find('loan_info', '*', ['somiti_id' => $somiti_id, 'member_id' => $member_id, 'loan_serial_no' => $loan_serial_no, 'active' => 1]);

		if(!empty($loan_info)){
			$loan_type = $loan_info->loan_type;

			if($loan_type == 'Weekly'){
				$collectable_amount = ($loan_info->loan_amount)/46;
				$collectable_interest = ($loan_info->interest_amount)/46;
			}
			if($loan_type == 'Monthly'){
				$collectable_amount = ($loan_info->loan_amount)/12;
				$collectable_interest = ($loan_info->interest_amount)/12;
			}
			if($loan_type == 'Seasonal'){
				$collectable_amount = ($loan_info->loan_amount)/2;
				$collectable_interest = ($loan_info->interest_amount)/2;
			}

			$data['collectable_amount'] = round($collectable_amount, 2);
			$data['collectable_interest'] = round($collectable_interest, 2);
		}

		//get the first installment date if exitst
		$loan_first_installment = find('loan_installment', '*', ['somiti_id' => $somiti_id, 'member_id' => $member_id, 'loan_serial_no' => $loan_serial_no], null, [], 'id asc');
		//get the last installment date
		$loan_last_installment = find('loan_installment', '*', ['somiti_id' => $somiti_id, 'member_id' => $member_id, 'loan_serial_no' => $loan_serial_no], null, [], true, 'id desc');
		//get What would be the current week no
		$loans = find('loan_installment', '*', ['somiti_id' => $somiti_id, 'member_id' => $member_id, 'loan_serial_no' => $loan_serial_no], '*');
		if(!empty($loans)){
			$data['week_no'] = (count($loans)+1);
		}
		//if it is first installment then there can not be a previous / advance balance
		if(count($loan_first_installment)){
			$first_loan_date = $loan_first_installment->installment_date;
			$from=date_create($first_loan_date);
			$to=(date_create($given_installment_date));
			$diff=date_diff($from,$to);
			$number_of_day_from_first_installment = $diff->format('%a');
		}

		if($number_of_day_from_first_installment > 0){
			if($loan_type == 'Weekly'){
				$number_to_multiply = round($number_of_day_from_first_installment/6);
			}
			if($loan_type == 'Monthly'){
				$number_to_multiply = round($number_of_day_from_first_installment/30);
			}
			if($loan_type == 'Seasonal'){
				$number_to_multiply = round($number_of_day_from_first_installment/180);
			}

			//calculate the the money and check is it advanced or due
			$payable_amount =  $number_to_multiply*($collectable_amount+$collectable_interest);

			//get the last actual amount and interet to check if the balance is in advanced or due
			$total_paid = ($loan_last_installment->total_collected_amount+$loan_last_installment->total_collected_interest);

			if($total_paid > $payable_amount){
				$data['message'] = 'You have advanced amount of';
				$data['amount'] = round(($total_paid-$payable_amount), 2);
			}
			if($total_paid == $payable_amount){
				$data['message'] = 'You don\'t have advanced or due';
				$data['amount'] = round(($total_paid-$payable_amount), 2);
			}
			if($total_paid < $payable_amount){
				$data['message'] = 'You have due amount of';
				$data['amount'] = round(($payable_amount-$total_paid) ,2);
			}


		}

		echo json_encode($data);

	}

	public function create_loan_installment(){
		if(!hasPermission('loan_installment')){ redirect(base_url('/')); return false;};

		// storing values
		$reg_branch_id = post('reg_branch_name');
		$branch_id = post('branch');
		$somiti_id = post('somiti');
		$member_id = post('member');
		$loan_serial_no = post('loan_serial');
		$installment_date = post('installment_date');
		$week_no = post('week_no');
		$collectable_amount = post('collectable_amount');
		$collectable_interest = post('collectable_interest');
		$actual_amount = post('actual_amount');
		$actual_interest = post('actual_interest');

		$installment = find('loan_installment', 'id', ['somiti_id' => $somiti_id, 'member_id' => $member_id, 'loan_serial_no' => $loan_serial_no], '*');
		$first_installment = find('loan_info', '*', ['somiti_id' => $somiti_id, 'member_id' => $member_id, 'loan_serial_no' => $loan_serial_no]);
		$last_installment = find('loan_installment', '*', ['somiti_id' => $somiti_id, 'member_id' => $member_id, 'loan_serial_no' => $loan_serial_no], null, [], true, 'id desc');
		if(count($installment)>=1){
			$total_collected_amount = ($last_installment->total_collected_amount)+$actual_amount;
			$total_collected_interest = ($last_installment->total_collected_interest)+$actual_interest;
			$remaining_amount = ($last_installment->remaining_amount)-$actual_amount;
			$remaining_interest = ($last_installment->remaining_interest)-$actual_interest;
		}else{
			$total_collected_amount = $actual_amount;
			$total_collected_interest = $actual_interest;
			$remaining_amount = ($first_installment->loan_amount)-$actual_amount;
			$remaining_interest = ($first_installment->interest_amount)-$actual_interest;
		}

		$data = [
			'reg_branch_id' => $reg_branch_id,
			'branch_id' => $branch_id,
			'somiti_id' => $somiti_id,
			'member_id' => $member_id,
			'loan_serial_no' => $loan_serial_no,
			'installment_date' => $installment_date,
			'week_no' => $week_no,
			'collectable_amount' => $collectable_amount,
			'collectable_interest' => $collectable_interest,
			'actual_amount' => $actual_amount,
			'actual_interest' => $actual_interest,
			'total_collected_amount' => $total_collected_amount,
			'total_collected_interest' => $total_collected_interest,
			'remaining_amount' => $remaining_amount,
			'remaining_interest' => $remaining_interest,
			'received_by' => auth('user_id')
		];
		$rtm = create('loan_installment', $data);
		echo json_encode($rtm);
	}

	public function loan_details(){
		if(!hasPermission('search_loan_installment')){ redirect(base_url('/')); return false;};

		$data['title'] = 'Loan installment info';
		$data['regBranchList'] = all('regional_branch_info');
		$data['branchList'] = all('branch_info');
		$data['somitiList'] = all('somiti_info');
		$loan_serial_no = get('loan_serial');
		$member_id = get('member_id');
		$data['loan_serial'] = $loan_serial_no;
		$data['member_id'] = $member_id;
		$data['loans'] = find('loan_installment', '*', ['loan_serial_no' => $loan_serial_no, 'member_id' => $member_id], '*');
		view('Loans.Search_member_installment', $data);
	}

	public function get_member_all_loan_serial(){
		$serials = find('loan_info', 'loan_serial_no', ['somiti_id' => post('somiti_id'), 'member_id' => post('member_id')], '*');
		echo json_encode($serials);
	}

	public function loan_installment_report(){
		$data['title'] = 'Loan installment info';
		$loan_serial_no = post('loan_serial');
		$member_id = post('member_id');
		$data['loans_header_info'] = $this->Loan_model->get_loans_header_info($loan_serial_no, $member_id);
		$data['loans'] = find('loan_installment', '*', ['loan_serial_no' => $loan_serial_no, 'member_id' => $member_id], '*');
		makePDF('Reports/Loans/Member_loans', $data, 'Loan Installment Report');
	}

}//end of Loan
?>
