<?php

//Start class Lon_model
class Loan_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function get_loans_header_info($loan_serial_no, $member_id){
    	$this->db->select('member_info.name, member_info.father_or_husband, loan_info.loan_amount, loan_info.total_amount, loan_info.loan_purpose, loan_info.opening_date, loan_info.closing_date, somiti_info.id as somiti_id, somiti_info.name as somiti_name');
    	$this->db->from('loan_info');
    	$this->db->join('member_info', 'member_info.user_id = loan_info.member_id', 'left');
    	$this->db->join('somiti_info', 'somiti_info.id = loan_info.somiti_id', 'left');
		$query = $this->db->get();
		return $query->row();
    }



}
//End class Lon_model
?>
