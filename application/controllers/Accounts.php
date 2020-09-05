<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts extends Base_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Accounts_model');
	}

	public function chart_of_accounts()
	{
		$data['title'] = 'Chart of accounts';
		view('Accounts.Chart_of_accounts', $data);
	}

	public function create_head()
	{
		$rtm = create_update('acc_heads', ['name' => post('head_name')], ['name' => post('head_name')]);
		echo json_encode($rtm);
	}

	public function getHeads()
	{
		$heads = all('acc_heads');
		echo json_encode($heads);
	}

	public function update_head()
	{
		$rtm = update('acc_heads', ['name' => post('head_name')], ['id' => post('head_id')]);
		echo json_encode($rtm);
	}

	public function create_sub_head()
	{
		$sub_head_id = post('sub_head_id');
		if(empty($sub_head_id)) {
			$rtm = create_update('acc_sub_heads', ['head_id' => post('head'), 'name' => post('sub_head_name')],  ['head_id' => post('head'), 'name' => post('sub_head_name')]);
		} else {
			$rtm = update('acc_sub_heads', ['head_id' => post('head'), 'name' => post('sub_head_name')],  ['id' => post('sub_head_id')]);
		}
		
		echo json_encode($rtm);
	}

	public function getSubHeads()
	{
		$sub_heads = find('acc_sub_heads', '*', ['head_id' => post('head')], '*');
		echo json_encode($sub_heads);
	}

	public function getSubHeadsDropdown()
	{
		$sub_heads = $this->Accounts_model->findAllSubHeads();
		$head_id = 0;
		$output = '';
		foreach($sub_heads as $v) {
			if($head_id != $v->head_id){
				if(!empty($output)) $output .= '</optgroup>';
				$output .= '<optgroup label="'.$v->head_name.'">';
				$head_id = $v->head_id;
			}

			$output .= '<option value="'.$v->id.'">'.$v->name.'</option>';
		}

		echo $output;
	}


	public function create_tran_head()
	{
		$tran_head_id = post('tran_head_id');
		if(empty($tran_head_id)) {
			$rtm = create_update('acc_tran_heads', ['sub_head_id' => post('sub_head'), 'name' => post('tran_head_name')],  ['sub_head_id' => post('sub_head'), 'name' => post('tran_head_name')]);
		} else {
			$rtm = update('acc_tran_heads', ['sub_head_id' => post('sub_head'), 'name' => post('tran_head_name')],  ['id' => post('tran_head_id')]);
		}
		
		echo json_encode($rtm);
	}

	public function getTranHeads()
	{
		$tran_heads = find('acc_tran_heads', '*', ['sub_head_id' => post('subhead')], '*');
		echo json_encode($tran_heads);
	}

	public function opening()
	{
		$data['title'] 			= 'Account Opening';
		$data['regBranchList'] 	= all('regional_branch_info');
		
		view('Accounts.Opening', $data);
	}

	public function opening_show()
	{
		if($this->session->userdata("log_branch") == 786):
			$reg_branch 	= post('reg_branch');
			$branch 		= post('branch');
		else:
			$branch = $this->session->userdata("log_branch");
			$reg_branch = $this->db->where("id",$branch)->get("branch_info")->row()->reg_branch_id;
		endif;
		
		$voucher_date 	= post('voucher_date');

		$data['reg_branch'] 	= $reg_branch;
		$data['branch'] 		= $branch;
		$data['voucher_date'] 	= $voucher_date;

		$data['tran_heads'] = $this->Accounts_model->findOpening(array(), $reg_branch, $branch);

		view('Accounts.OpeningHead', $data);
	}

	public function opening_create()
	{

		if($this->session->userdata("log_branch") == 786):
			$reg_branch_id 	= post('reg_branch');
			$branch_id 		= post('branch');
		else:
			$branch_id = $this->session->userdata("log_branch");
			$reg_branch_id = $this->db->where("id",$branch_id)->get("branch_info")->row()->reg_branch_id;
		endif;
		
		$voucher_date 			= post('voucher_date');

		$sub_head_array 		= post('sub_head');
		$tran_head_array 		= post('tran_head');
		$debit_amount_array 	= post('debit_amount');
		$credit_amount_array 	= post('credit_amount');

		delete('acc_voucher_details', ['voucher_id' => 0, 'reg_branch_id' => $reg_branch_id, 'branch_id' => $branch_id]);

		foreach ($sub_head_array as $k => $v) {
			if(!empty($debit_amount_array[$k]) || !empty($credit_amount_array[$k])){
				$voucher_details = [					
					'reg_branch_id' => $reg_branch_id,
					'branch_id' => $branch_id,
					'voucher_date' => $voucher_date,					
					'sub_head' => $sub_head_array[$k],
					'tran_head' => $tran_head_array[$k],
					'debit' => $debit_amount_array[$k],
					'credit' => $credit_amount_array[$k],
					'created_by' => auth('user_id'),
					'created_at' => unix_to_human(now('Asia/Dhaka'))
				];

				create('acc_voucher_details', $voucher_details);
			}
		}

		redirect(base_url('accounts_opening'));
	}


	public function voucher()
	{
		$data['title'] 			= 'Voucher';
		$data['regBranchList'] 	= all('regional_branch_info');
		$data['sub_heads'] 		= $this->Accounts_model->findAllSubHeads();

		view('Accounts.NewVoucher', $data);
	}

	public function voucher_create()
	{
		$voucher_id = post("voucher_id");

		if($this->session->userdata("log_branch") == 786):
			$reg_branch 	= post('reg_branch');
			$branch_id 		= post('branch');
		else:
			$branch_id = $this->session->userdata("log_branch");
			$reg_branch = $this->db->where("id",$branch_id)->get("branch_info")->row()->reg_branch_id;
		endif;

		$voucher=[
			'voucher_caption' => post('voucher_caption'),
			'reg_branch_id' => $reg_branch,
			'branch_id' => $branch_id,
			'voucher_date' => post('voucher_date'),
			'created_by' => auth('user_id'),
			'created_at' => unix_to_human(now('Asia/Dhaka'))
		];

		if(empty($voucher_id)) {
			$voucher['voucher_no'] = $this->Accounts_model->newVoucherNo();
			$voucher_id = create('acc_voucher', $voucher, true);
		} else {
			update('acc_voucher', $voucher, ['id' => $voucher_id]);
			delete('acc_voucher_details', ['voucher_id' => $voucher_id]);
		}
		
		$sub_head_array 	= post('sub_head');
		$tran_head_array 	= post('tran_head');
		$debit_amount_array = post('debit_amount');
		$credit_amount_array = post('credit_amount');

		foreach ($sub_head_array as $k => $v) {
			if(!empty($debit_amount_array[$k]) || !empty($credit_amount_array[$k])){
				$voucher_details = [
					'voucher_id' => $voucher_id,
					'voucher_date' => post('voucher_date'),
					'reg_branch_id' => $reg_branch,
					'branch_id' => $branch_id,					
					'sub_head' => $sub_head_array[$k],
					'tran_head' => $tran_head_array[$k],
					'debit' => $debit_amount_array[$k],
					'credit' => $credit_amount_array[$k],
					'created_by' => auth('user_id'),
					'created_at' => unix_to_human(now('Asia/Dhaka'))
				];

				create('acc_voucher_details', $voucher_details);
			}
		}

		if(isset($voucher['voucher_no'])){
			setFMessage('msg', 'Voucher created successfully. Voucher No: '.$voucher['voucher_no']);
		} else if($voucher_id){
			setFMessage('msg', 'Voucher updated successfully.');
		} else {
			setFMessage('msg', 'Something went wrong!');
		}
		redirect(base_url('voucher'));
	}


	public function search_voucher() {

		$data['title'] 			= 'Search Voucher';
		$data['regBranchList'] 	= all('regional_branch_info');
		if($this->session->userdata("log_branch") == 786):
			$reg_branch 	= post('reg_branch');
			$branch 		= post('branch');
		else:
			$branch = $this->session->userdata("log_branch");
			$reg_branch = $this->db->where("id",$branch)->get("branch_info")->row()->reg_branch_id;
		endif;

		$from_date 		= get('from_date');
		$to_date 		= get('to_date');

		if(( !empty($from_date) && !empty($to_date) ) ){
			$where = array('reg_branch_id' => $reg_branch, 'branch_id' => $branch, 'voucher_date >=' => $from_date, 'reg_branch_id <=' => $to_date);
			$data['voucherList'] = $this->Accounts_model->searchVoucher($where);
		}
		view('Accounts.Search_voucher', $data);
	}

	/**
	 * @param $id integer
	 * @param $view charecter, value: V / P
	 *
	 */
	public function voucher_info($id, $view = 'V') {
		$data['voucherInfo'] 	= $this->Accounts_model->getVoucherInfo($id);
		$data['tranList'] 		= $this->Accounts_model->getTranList(array("voucher_id" => $id));
		
		if($view == 'V') {
			view('Accounts.Voucher_info', $data);
		} else {
			makePDF('Reports/Accounts/voucher_info', $data, 'Voucher # '.$data['voucherInfo']->voucher_no);
		}
		
	}

	public function voucher_edit($id) {
		$data['voucherInfo'] 	= $this->Accounts_model->getVoucherInfo($id);
		$data['tranList'] 		= $this->Accounts_model->getTranListWithTranHead($id);

		// $data['regBranchList'] 	= all('regional_branch_info');
		// $data['branchList'] 	= find('branch_info', ['id', 'reg_branch_id', 'name'], ['reg_branch_id' => $data['voucherInfo']->reg_branch_id], '*');
	
		$data['sub_heads'] 		= $this->Accounts_model->findAllSubHeads();

		view('Accounts.EditVoucher', $data);
	}


	public function voucher_delete($id) {
		delete('acc_voucher', ['id' => $id]);
		delete('acc_voucher_details', ['voucher_id' => $id]);

		echo json_encode(true);
	}
	//End search_members


	public function balance_sheet()
	{
		$data['title'] 			= 'Balance Sheet';
		$data['regBranchList'] 	= all('regional_branch_info');
		
		view('Reports.Accounts.BalanceSheet', $data);
	}

	public function balance_sheet_report()
	{

		if($this->session->userdata("log_branch") == 786):
			$reg_branch 	= post('reg_branch');
			$branch 		= post('branch');
		else:
			$branch = $this->session->userdata("log_branch");
			$reg_branch = $this->db->where("id",$branch)->get("branch_info")->row()->reg_branch_id;
		endif;

		$date 			= post('date');
		$print_view 	= post('print_view');

		$data['reg_branch'] 	= $reg_branch;
		$data['branch'] 		= $branch;
		$data['date'] 			= $date;

		$data['companyinfo']	= find("company_info", "*");
		$data['regBranchInfo']	= find("regional_branch_info", "*", array("id" => $reg_branch));
		$data['branchInfo']		= find("branch_info", "*", array("id" => $branch));

		$asset = 1;
		$liability = 2;
		$equity = 3;
		$income = 4;
		$expense = 5;

		$where = array('acc_heads.id' => $asset, 'voucher_date <=' => $date, 'branch_id' => $branch);
		$data['assetList'] = $this->Accounts_model->getAccountsBalance($where);

		$where = array('acc_heads.id' => $liability, 'voucher_date <=' => $date, 'branch_id' => $branch);
		$data['liabilityList'] = $this->Accounts_model->getAccountsBalance($where);

		$where = array('acc_heads.id' => $equity, 'voucher_date <=' => $date, 'branch_id' => $branch);
		$data['equityList'] = $this->Accounts_model->getAccountsBalance($where);

		$where = array('acc_heads.id' => $income, 'voucher_date <=' => $date, 'branch_id' => $branch);
		$data['incomeInfo'] = $this->Accounts_model->getAccountsTotalBalance($where);

		$where = array('acc_heads.id' => $expense, 'voucher_date <=' => $date, 'branch_id' => $branch);
		$data['expenseInfo'] = $this->Accounts_model->getAccountsTotalBalance($where);

		if($print_view == 0) {
			view('Reports.Accounts.BalanceSheetView', $data);
		} else {
			makePDF('Reports/Accounts/BalanceSheetPrint', $data, 'Balance Sheet # As of '.$data['date']);
		}
	}


	public function pksf_balance_sheet()
	{
		$data['title'] 			= 'PKSF Balance Sheet';
		
		view('Reports.Accounts.pksf_balance_sheet', $data);
	}

	// pksf balance sheet report
	public function pksf_balance_sheet_report()
	{

		$date 			= post('date');
		$print_view 	= post('print_view');
		$data['date'] 	= $date;

		$data['reg_branch_info'] = "All PKSF Regional Branch";
		$data['branchInfo'] = "All PKSF Branch";

		$data['companyinfo']	= find("company_info", "*");

		$asset = 1;
		$liability = 2;
		$equity = 3;
		$income = 4;
		$expense = 5;

		$branch_array = $this->db->query("SELECT GROUP_CONCAT(id) as id FROM `branch_info` WHERE pksf_non_pksf = 1")->row()->id;

		$where = array('acc_heads.id' => $asset, 'voucher_date <=' => $date);
		$data['assetList'] = $this->Accounts_model->getPkNonPkAccountsBalance($where,$branch_array);

		$where = array('acc_heads.id' => $liability, 'voucher_date <=' => $date);
		$data['liabilityList'] = $this->Accounts_model->getPkNonPkAccountsBalance($where,$branch_array);

		$where = array('acc_heads.id' => $equity, 'voucher_date <=' => $date);
		$data['equityList'] = $this->Accounts_model->getPkNonPkAccountsBalance($where,$branch_array);

		$where = array('acc_heads.id' => $income, 'voucher_date <=' => $date);
		$data['incomeInfo'] = $this->Accounts_model->getPkNonPkAccountsTotalBalance($where,$branch_array);

		$where = array('acc_heads.id' => $expense, 'voucher_date <=' => $date);
		$data['expenseInfo'] = $this->Accounts_model->getPkNonPkAccountsTotalBalance($where,$branch_array);

		if($print_view == 0) {
			view('Reports.Accounts.pksf_balance_sheet_view', $data);
		} else {
			makePDF('Reports/Accounts/pk_non_pk_balance_sheet_print', $data, 'Balance Sheet # As of '.$data['date']);
		}
	}

	// non pksf section
	public function non_pksf_balance_sheet()
	{
		$data['title'] 			= 'NON-PKSF Balance Sheet';
		
		view('Reports.Accounts.non_pksf_balance_sheet', $data);
	}

	// pksf balance sheet report
	public function non_pksf_balance_sheet_report()
	{

		$date 			= post('date');
		$print_view 	= post('print_view');
		$data['date'] 	= $date;

		$data['reg_branch_info'] = "All NON-PKSF Regional Branch";
		$data['branchInfo'] = "All NON-PKSF Branch";

		$data['companyinfo']	= find("company_info", "*");

		$asset = 1;
		$liability = 2;
		$equity = 3;
		$income = 4;
		$expense = 5;

		$branch_array = $this->db->query("SELECT GROUP_CONCAT(id) as id FROM `branch_info` WHERE pksf_non_pksf = 2")->row()->id;

		$where = array('acc_heads.id' => $asset, 'voucher_date <=' => $date);
		$data['assetList'] = $this->Accounts_model->getPkNonPkAccountsBalance($where,$branch_array);

		$where = array('acc_heads.id' => $liability, 'voucher_date <=' => $date);
		$data['liabilityList'] = $this->Accounts_model->getPkNonPkAccountsBalance($where,$branch_array);

		$where = array('acc_heads.id' => $equity, 'voucher_date <=' => $date);
		$data['equityList'] = $this->Accounts_model->getPkNonPkAccountsBalance($where,$branch_array);

		$where = array('acc_heads.id' => $income, 'voucher_date <=' => $date);
		$data['incomeInfo'] = $this->Accounts_model->getPkNonPkAccountsTotalBalance($where,$branch_array);

		$where = array('acc_heads.id' => $expense, 'voucher_date <=' => $date);
		$data['expenseInfo'] = $this->Accounts_model->getPkNonPkAccountsTotalBalance($where,$branch_array);

		if($print_view == 0) {
			view('Reports.Accounts.pksf_balance_sheet_view', $data);
		} else {
			makePDF('Reports/Accounts/pk_non_pk_balance_sheet_print', $data, 'Balance Sheet # As of '.$data['date']);
		}
	}

	// main balance sheet
	
	public function total_balance_sheet()
	{
		$data['title'] 			= 'Final Balance Sheet';
		
		view('Reports.Accounts.main_balance_sheet', $data);
	}

	
	public function main_balance_sheet_report()
	{

		$year 			= post('year');
		$start_date 	= $year.'-07-31';
		$end_date 		= ($year+1).'-06-31';
		$print_view 	= post('print_view');

		$data['this_year_start'] = $start_date;
		$data['this_year_end'] = $end_date;

		$data['last_year_start'] = ($year - 1).'-07-31';
		$data['last_year_end'] = $year.'-06-31';

		$data['date'] 	= $year.' - '.($year+1).'( July - June )';
		$data['last_year'] = ($year - 1).' - '.$year.'( July - June )';

		$data['companyinfo']	= find("company_info", "*");

		// $asset = 1;
		// $liability = 2;
		// $equity = 3;
		// $income = 4;
		// $expense = 5;

		// $where = array('acc_heads.id' => $asset, 'voucher_date <=' => $end_date, 'voucher_date >=' => $start_date);
		// $data['assetList'] = $this->Accounts_model->getMainAccountsBalance($where);

		// // print_r($data);exit;

		// $where = array('acc_heads.id' => $liability, 'voucher_date <=' => $end_date, 'voucher_date >=' => $start_date);
		// $data['liabilityList'] = $this->Accounts_model->getMainAccountsBalance($where);

		// $where = array('acc_heads.id' => $equity, 'voucher_date <=' => $end_date, 'voucher_date >=' => $start_date);
		// $data['equityList'] = $this->Accounts_model->getMainAccountsBalance($where);

		// $where = array('acc_heads.id' => $income, 'voucher_date <=' => $end_date, 'voucher_date >=' => $start_date);
		// $data['incomeInfo'] = $this->Accounts_model->getMainAccountsTotalBalance($where);

		// $where = array('acc_heads.id' => $expense, 'voucher_date <=' => $end_date, 'voucher_date >=' => $start_date);
		// $data['expenseInfo'] = $this->Accounts_model->getMainAccountsTotalBalance($where);

		$data['head'] = $this->db->get("acc_heads")->result();

		if($print_view == 0) {
			view('Reports.Accounts.main_balance_sheet_view', $data);
		} else {
			makePDF('Reports/Accounts/main_balance_sheet_view', $data, 'Balance Sheet # As of '.$data['date']);
		}
	}

	// end of main balance sheet

	public function income_statement()
	{
		$data['title'] 			= 'Income Statement';
		$data['regBranchList'] 	= all('regional_branch_info');
		
		view('Reports.Accounts.IncomeStatement', $data);
	}

	public function income_statement_report()
	{

		if($this->session->userdata("log_branch") == 786):
			$reg_branch 	= post('reg_branch');
			$branch 		= post('branch');
		else:
			$branch = $this->session->userdata("log_branch");
			$reg_branch = $this->db->where("id",$branch)->get("branch_info")->row()->reg_branch_id;
		endif;

		$from_date 		= post('from_date');
		$to_date 		= post('to_date');
		$print_view 	= post('print_view');

		$data['reg_branch'] 	= $reg_branch;
		$data['branch'] 		= $branch;
		$data['from_date'] 		= $from_date;
		$data['to_date'] 		= $to_date;

		$data['companyinfo']	= find("company_info", "*");
		$data['regBranchInfo']	= find("regional_branch_info", "*", array("id" => $reg_branch));
		$data['branchInfo']		= find("branch_info", "*", array("id" => $branch));

		$income = 4;
		$expense = 5;

		$where = array('acc_heads.id' => $income, 'voucher_date >=' => $from_date, 'voucher_date <=' => $to_date, 'branch_id' => $branch);
		$data['incomeList'] = $this->Accounts_model->getAccountsBalance($where);

		$where = array('acc_heads.id' => $expense, 'voucher_date >=' => $from_date, 'voucher_date <=' => $to_date, 'branch_id' => $branch);
		$data['expenseList'] = $this->Accounts_model->getAccountsBalance($where);

		if($print_view == 0) {
			view('Reports.Accounts.IncomeStatementView', $data);
		} else {
			makePDF('Reports/Accounts/IncomeStatementPrint', $data, 'Income Statement From '.$data['from_date'].' To '.$data['to_date'] );
		}
	}


	public function cash_flow()
	{
		$data['title'] 			= 'Cash Flow';
		$data['regBranchList'] 	= all('regional_branch_info');

		$cash_sub_head = 1;
		$data['cashList'] = find("acc_tran_heads", "*", array("sub_head_id" => $cash_sub_head), 20000);
		
		view('Reports.Accounts.CashFlow', $data);
	}

	public function cash_flow_report()
	{
		if($this->session->userdata("log_branch") == 786):
			$reg_branch 	= post('reg_branch');
			$branch 		= post('branch');
		else:
			$branch = $this->session->userdata("log_branch");
			$reg_branch = $this->db->where("id",$branch)->get("branch_info")->row()->reg_branch_id;
		endif;

		$cash_id 		= post('cash_id');
		$from_date 		= post('from_date');
		$to_date 		= post('to_date');
		$print_view 	= post('print_view');

		$data['reg_branch'] 	= $reg_branch;
		$data['branch'] 		= $branch;
		$data['from_date'] 		= $from_date;
		$data['to_date'] 		= $to_date;

		$data['companyinfo']	= find("company_info", "*");
		$data['regBranchInfo']	= find("regional_branch_info", "*", array("id" => $reg_branch));
		$data['branchInfo']		= find("branch_info", "*", array("id" => $branch));
		$data['cashInfo']		= find("acc_tran_heads", "*", array("id" => $cash_id));

		$income = 4;
		$expense = 5;

		$where = array('acc_voucher_details.tran_head' => $cash_id, 'acc_voucher_details.voucher_date <' => $from_date, 'acc_voucher_details.branch_id' => $branch);
		$data['pervBalance'] = $this->Accounts_model->getAccountsTotalBalance($where);

		$where = array('acc_voucher_details.tran_head' => $cash_id, 'acc_voucher_details.voucher_date >=' => $from_date, 'acc_voucher_details.voucher_date <=' => $to_date, 'acc_voucher_details.branch_id' => $branch);
		$data['tranList'] = $this->Accounts_model->getTranLedger($where);

		if($print_view == 0) {
			view('Reports.Accounts.CashFlowView', $data);
		} else {
			makePDF('Reports/Accounts/CashFlowPrint', $data, 'Cash Flow From '.$data['from_date'].' To '.$data['to_date'] );
		}
	}

	public function trial_balance()
	{
		$data['title'] 			= 'Trial Balance';
		$data['regBranchList'] 	= all('regional_branch_info');
		
		view('Reports.Accounts.TrialBalance', $data);
	}

	public function trial_balance_report()
	{
		if($this->session->userdata("log_branch") == 786):
			$reg_branch 	= post('reg_branch');
			$branch 		= post('branch');
		else:
			$branch = $this->session->userdata("log_branch");
			$reg_branch = $this->db->where("id",$branch)->get("branch_info")->row()->reg_branch_id;
		endif;

		$date 			= post('date');
		$print_view 	= post('print_view');

		$data['reg_branch'] 	= $reg_branch;
		$data['branch'] 		= $branch;
		$data['date'] 			= $date;

		$data['companyinfo']	= find("company_info", "*");
		$data['regBranchInfo']	= find("regional_branch_info", "*", array("id" => $reg_branch));
		$data['branchInfo']		= find("branch_info", "*", array("id" => $branch));

		$asset = 1;
		$liability = 2;
		$equity = 3;
		$income = 4;
		$expense = 5;

		$where = array('acc_heads.id' => $asset, 'voucher_date <=' => $date, 'branch_id' => $branch);
		$data['assetList'] = $this->Accounts_model->getAccountsBalance($where);

		$where = array('acc_heads.id' => $liability, 'voucher_date <=' => $date, 'branch_id' => $branch);
		$data['liabilityList'] = $this->Accounts_model->getAccountsBalance($where);

		$where = array('acc_heads.id' => $equity, 'voucher_date <=' => $date, 'branch_id' => $branch);
		$data['equityList'] = $this->Accounts_model->getAccountsBalance($where);

		$where = array('acc_heads.id' => $income, 'voucher_date <=' => $date, 'branch_id' => $branch);
		$data['incomeList'] = $this->Accounts_model->getAccountsBalance($where);

		$where = array('acc_heads.id' => $expense, 'voucher_date <=' => $date, 'branch_id' => $branch);
		$data['expenseList'] = $this->Accounts_model->getAccountsBalance($where);

		if($print_view == 0) {
			view('Reports.Accounts.TrialBalanceView', $data);
		} else {
			makePDF('Reports/Accounts/TrialBalancePrint', $data, 'Trial Balance As on '.$data['date'] );
		}
	}


	public function tran_ledger()
	{
		$data['title'] 			= 'Cash Flow';
		$data['regBranchList'] 	= all('regional_branch_info');

		$data['headList'] = $this->Accounts_model->findAllTranHeads();
		
		view('Reports.Accounts.TranLedger', $data);
	}

	public function tran_ledger_report()
	{
		if($this->session->userdata("log_branch") == 786):
			$reg_branch 	= post('reg_branch');
			$branch 		= post('branch');
		else:
			$branch = $this->session->userdata("log_branch");
			$reg_branch = $this->db->where("id",$branch)->get("branch_info")->row()->reg_branch_id;
		endif;

		$tran_head_id 	= post('tran_head_id');
		$from_date 		= post('from_date');
		$to_date 		= post('to_date');
		$print_view 	= post('print_view');

		$data['reg_branch'] 	= $reg_branch;
		$data['branch'] 		= $branch;
		$data['from_date'] 		= $from_date;
		$data['to_date'] 		= $to_date;

		$data['companyinfo']	= find("company_info", "*");
		$data['regBranchInfo']	= find("regional_branch_info", "*", array("id" => $reg_branch));
		$data['branchInfo']		= find("branch_info", "*", array("id" => $branch));
		$data['headInfo']		= find("acc_tran_heads", "*", array("id" => $tran_head_id));

		$where = array('acc_voucher_details.tran_head' => $tran_head_id, 'acc_voucher_details.voucher_date <' => $from_date, 'acc_voucher_details.branch_id' => $branch);
		$data['pervBalance'] = $this->Accounts_model->getAccountsTotalBalance($where);

		$where = array('acc_voucher_details.tran_head' => $tran_head_id, 'acc_voucher_details.voucher_date >=' => $from_date, 'acc_voucher_details.voucher_date <=' => $to_date, 'acc_voucher_details.branch_id' => $branch);
		$data['tranList'] = $this->Accounts_model->getTranLedger($where);

		if($print_view == 0) {
			view('Reports.Accounts.TranLedgerView', $data);
		} else {
			makePDF('Reports/Accounts/TranLedgerPrint', $data, 'Accounts Ledger # '.$data['headInfo']->name.' From '.$data['from_date'].' To '.$data['to_date'] );
		}
	}


	public function voucher_report()
	{
		$data['title'] 			= 'Voucher Report';
		$data['regBranchList'] 	= all('regional_branch_info');
		
		view('Reports.Accounts.VoucherReport', $data);
	}

	public function voucher_report_view()
	{
		if($this->session->userdata("log_branch") == 786):
			$reg_branch 	= post('reg_branch');
			$branch 		= post('branch');
		else:
			$branch = $this->session->userdata("log_branch");
			$reg_branch = $this->db->where("id",$branch)->get("branch_info")->row()->reg_branch_id;
		endif;

		$from_date 		= post('from_date');
		$to_date 		= post('to_date');
		$print_view 	= post('print_view');

		$data['reg_branch'] 	= $reg_branch;
		$data['branch'] 		= $branch;
		$data['from_date'] 		= $from_date;
		$data['to_date'] 		= $to_date;

		$data['companyinfo']	= find("company_info", "*");
		$data['regBranchInfo']	= find("regional_branch_info", "*", array("id" => $reg_branch));
		$data['branchInfo']		= find("branch_info", "*", array("id" => $branch));

		$where = array('voucher_date >=' => $from_date, 'voucher_date <=' => $to_date, 'branch_id' => $branch);
		$data['tranList'] = $this->Accounts_model->getVoucherListDetails($where);

		if($print_view == 0) {
			view('Reports.Accounts.VoucherReportView', $data);
		} else {
			makePDF('Reports/Accounts/VoucherReportPrint', $data, 'Voucher From '.$data['from_date'].' To '.$data['to_date'] );
		}
	}

	/// ACCOUNTS REPORT

}//end of Accounts
