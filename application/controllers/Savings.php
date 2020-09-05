<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Savings extends Base_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->model('Savings_model');

	}

	public function installment(){
		if(!hasPermission('savings_installment')){ redirect(base_url('/')); return false;};

		$data['title'] = 'Installment management';
		$data['regBranchList'] = all('regional_branch_info');
		$data['branchList'] = all('branch_info');
		$data['somitiList'] = all('somiti_info');
		view('Savings.Installment', $data);
	}

	public function getMemberList(){
		$member = find('member_info', ['*'], ['somiti' => e(post('somiti'))], '*');
		echo json_encode($member);
	}

	public function create_installment(){
		if(!hasPermission('savings_installment')){ redirect(base_url('/')); return false;};

		$balance = 0;
		$deposit = post('diposit');
		$withdraw = post('withdraw');
		if($deposit >0 || $withdraw >0){

			$installment = find('savings_installment', ['*'], ['somiti_id' => post('somiti'), 'member_id' => post('member')], '*', [], true, 'id desc');
			// if already have a diposit
			if(count($installment)){
				//if diposit then add the diposit money else deduct the withdraw money
				if($deposit>0){
					$balance = ($installment[0]->balance)+$deposit;
				}else{
					if($installment[0]->balance >= $withdraw){
						$balance = ($installment[0]->balance)-$withdraw;
					}else{
						echo 'Insufficient balance!';
						return false;
					}
				}
			}else{
				$balance = $deposit;
			}

			$data = [
				'reg_branch_id' => post('reg_branch_name'),
				'branch_id' => post('branch'),
				'somiti_id' => post('somiti'),
				'member_id' => post('member'),
				'classification' => post('classification'),
				'installment_date' => post('installment_date'),
				'week_no' => post('no_of_week'),
				'details' => post('details'),
				'deposit' => $deposit,
				'withdraw' => $withdraw,
				'balance' => $balance,
				'received_by' => auth('user_id')
			];
			$rtm = create('savings_installment', $data);
			if($rtm){
				echo 'Request successfull.';
			}else{
				echo 'Savings can not create at this time, try agin latter.';
			}
		}else{
			echo "You must enter amount in diposit or withdraw field.";
			return false;
		}
	}


	public function member_installment_info(){
		if(!hasPermission('member_installment_info')){ redirect(base_url('/')); return false;};
		$data['title'] = 'Member installment information';
		$data['installmentList'] = $this->Savings_model->single_member_installment_info(urldecode(segment(2)), segment(3));
		view('Savings.Member_installment_info', $data);
	}

	public function search_member_installment(){
		if(!hasPermission('member_installment_info')){ redirect(base_url('/')); return false;};

		$data['title'] = 'Member installment information';
		$data['regBranchList'] = all('regional_branch_info');
		$reg_branch = get('reg_branch_name');

		$member_id = get('member');
		$classification = urldecode(get('classification'));

		if(!empty($classification) && !empty($member_id)){
			$data['installmentList'] = $this->Savings_model->single_member_installment_info($classification, $member_id);
			$data['member_id'] = $member_id;
			$data['classification'] = $classification;
		}
		view('Savings.Search_member_installment', $data);
	}

	public function search_installment(){
		if(!hasPermission('search_installment_info')){ redirect(base_url('/')); return false;};

		$data['title'] = 'Member installment information';
		$data['regBranchList'] = all('regional_branch_info');
		$reg_branch = get('reg_branch_name');
		$branch = get('branch');
		$somiti = get('somiti');
		$installment_date = get('installment_date');
		if(!empty($installment_date)){
			$data['installmentList'] = $this->Savings_model->search_installment_info($reg_branch, $branch, $somiti, $installment_date);
		}
		view('Savings.Search_installment', $data);
	}

	public function installment_report(){
		$data['installmentList'] = $this->Savings_model->single_member_installment_info(post('classification'), post('member_id'));
		$data['member'] = find('member_info', '*', ['user_id' => post('member_id')]);
		$data['classification'] = post('classification');
		makePDF('Reports/Savings/Installment', $data, 'Savings Installment Report');
	}

	public function installment_report_by_date(){
		$reg_branch = post('reg_branch_name');
		$branch = post('branch');
		$somiti = post('somiti');
		$installment_date = post('installment_date');
		if(!empty($installment_date)){
			$data['somiti'] = find('somiti_info', '*', ['id' => $somiti]);
			$data['installment_date'] = $installment_date;
			$data['installmentList'] = $this->Savings_model->search_installment_info($reg_branch, $branch, $somiti, $installment_date);
		}
		makePDF('Reports/Savings/Installment_by_date', $data, 'Installment Report by date');
	}

	public function savings_interest(){
		if(!hasPermission('savings_interest')){ redirect(base_url('/')); return false;};

		$data['title'] = 'Savings interest';
		$data['regBranchList'] = all('regional_branch_info');
		$somiti = get('somiti');
		$first_date = get('first_installment_date');
		$second_date = get('second_installment_date');
		$data['interests'] = '';
		$data['from'] = $first_date;
		$data['to'] = $second_date;
		if(!empty($first_date)){
			$data['somiti'] = find('somiti_info', '*', ['id' => $somiti]);
			$data['interests'] = $this->Savings_model->get_savings_interest($somiti, $first_date, $second_date);
		}
		view('Savings.Savings_interest', $data);
	}

	public function savings_interest_report_by_date(){
		$somiti = post('somiti');
		$first_date = post('first_installment_date');
		$second_date = post('second_installment_date');
		$data['from'] = $first_date;
		$data['to'] = $second_date;
		if(!empty($first_date)){
			$data['somiti'] = find('somiti_info', '*', ['id' => $somiti]);
			$data['interests'] = $this->Savings_model->get_savings_interest($somiti, $first_date, $second_date);
		}
		makePDF('Reports/Savings/Savings_interest', $data, 'Savings interest');
	}



}//end of Savings
?>
