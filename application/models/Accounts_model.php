<?php

//Start class Accounts_model
class Accounts_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function newVoucherNo()
    {
        $this->db->select('max(cast(SUBSTRING_INDEX(voucher_no,"-",-1) as UNSIGNED)) AS MaxNo', FALSE);
        $this->db->from('acc_voucher');
        $MaxNo = $this->db->get()->row()->MaxNo;
        return 'V-'.str_pad(($MaxNo+1), 5, "0", STR_PAD_LEFT);
    }

    public function findAllSubHeads($where = array()){
    	
        $this->db->select('acc_sub_heads.*, acc_heads.name as head_name');
        $this->db->from('acc_sub_heads');
        $this->db->join('acc_heads','acc_heads.id = acc_sub_heads.head_id', 'left');
        $this->db->where($where);
        $this->db->order_by('acc_heads.id asc, acc_sub_heads.name asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function findAllTranHeads($where = array()) {
        
        $this->db->select('acc_tran_heads.*, acc_sub_heads.name as sub_head_name, acc_heads.name as head_name');
        $this->db->from('acc_tran_heads');
        $this->db->join('acc_sub_heads','acc_sub_heads.id = acc_tran_heads.sub_head_id', 'left');
        $this->db->join('acc_heads','acc_heads.id = acc_sub_heads.head_id', 'left');
        $this->db->where($where);
        $this->db->order_by('acc_heads.id asc, acc_sub_heads.name asc, acc_tran_heads.name asc');
        $query = $this->db->get();
        return $query->result();
    }


    public function findOpening($where = array(), $reg_branch = 0, $branch = 0) {
        $this->db->select('acc_tran_heads.*, acc_voucher_details.debit, acc_voucher_details.credit, acc_sub_heads.name as sub_head_name, acc_heads.name as head_name');
        $this->db->from('acc_tran_heads');
        $this->db->join('acc_sub_heads','acc_sub_heads.id = acc_tran_heads.sub_head_id', 'left');
        $this->db->join('acc_heads','acc_heads.id = acc_sub_heads.head_id', 'left');
        $this->db->join('acc_voucher_details','acc_voucher_details.tran_head = acc_tran_heads.id and acc_voucher_details.voucher_id = 0 and reg_branch_id = "'.$reg_branch.'" and branch_id = "'.$branch.'"', 'left');
        $this->db->where($where);
        $this->db->order_by('acc_heads.id asc, acc_sub_heads.name asc, acc_tran_heads.name asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function searchVoucher($where){
        $this->db->select('*');
        $this->db->from('acc_voucher');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function getVoucherInfo($id){
        $this->db->select('acc_voucher.*, regional_branch_info.name as reg_branch_name, branch_info.name as branch_name');
        $this->db->from('acc_voucher');
        $this->db->join('regional_branch_info','regional_branch_info.id = acc_voucher.reg_branch_id', 'left');
        $this->db->join('branch_info','branch_info.id = acc_voucher.branch_id', 'left');
        $this->db->where(array("acc_voucher.id" => $id));
        $query = $this->db->get();
        return $query->row();
    }

    public function getTranList($where = array()){
        $this->db->select('acc_voucher_details.*, acc_tran_heads.name as tran_head_name, acc_sub_heads.name as sub_head_name, acc_heads.name as head_name');
        $this->db->from('acc_voucher_details');
        $this->db->join('acc_tran_heads','acc_tran_heads.id = acc_voucher_details.tran_head', 'left');
        $this->db->join('acc_sub_heads','acc_sub_heads.id = acc_voucher_details.sub_head', 'left');
        $this->db->join('acc_heads','acc_heads.id = acc_sub_heads.head_id', 'left');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function getTranListWithTranHead($id){
        $list = $this->getTranList(array("acc_voucher_details.voucher_id" => $id));
        foreach ($list as $v) {
            $v->tranHeads = find('acc_tran_heads', '*', ['sub_head_id' => $v->sub_head], '*');
        }

        return $list;
    }

    public function getAccountsBalance($where){
        $this->db->select('acc_tran_heads.name as tran_head_name, acc_sub_heads.name as sub_head_name, acc_heads.name as head_name, acc_sub_heads.head_id, acc_voucher_details.sub_head, acc_voucher_details.tran_head, sum(acc_voucher_details.debit - acc_voucher_details.credit) as debit_balance, sum(acc_voucher_details.credit - acc_voucher_details.debit) as credit_balance');
        $this->db->from('acc_voucher_details');
        $this->db->join('acc_tran_heads','acc_tran_heads.id = acc_voucher_details.tran_head', 'left');
        $this->db->join('acc_sub_heads','acc_sub_heads.id = acc_voucher_details.sub_head', 'left');
        $this->db->join('acc_heads','acc_heads.id = acc_sub_heads.head_id', 'left');
        $this->db->where($where);
        $this->db->group_by("acc_voucher_details.tran_head");
        $this->db->order_by("acc_heads.name asc, acc_sub_heads.name asc");
        $query = $this->db->get();
        return $query->result();
    }

    public function getPkNonPkAccountsBalance($where,$branch){
        $this->db->select('acc_tran_heads.name as tran_head_name, acc_sub_heads.name as sub_head_name, acc_heads.name as head_name, acc_sub_heads.head_id, acc_voucher_details.sub_head, acc_voucher_details.tran_head, sum(acc_voucher_details.debit - acc_voucher_details.credit) as debit_balance, sum(acc_voucher_details.credit - acc_voucher_details.debit) as credit_balance');
        $this->db->from('acc_voucher_details');
        $this->db->join('acc_tran_heads','acc_tran_heads.id = acc_voucher_details.tran_head', 'left');
        $this->db->join('acc_sub_heads','acc_sub_heads.id = acc_voucher_details.sub_head', 'left');
        $this->db->join('acc_heads','acc_heads.id = acc_sub_heads.head_id', 'left');
        $this->db->where($where);
        $this->db->where_in("branch_id",$branch);
        $this->db->group_by("acc_voucher_details.tran_head");
        $this->db->order_by("acc_heads.name asc, acc_sub_heads.name asc");
        $query = $this->db->get();
        return $query->result();
    }

    // main account history
    public function getMainAccountsBalance($where){
        $this->db->select('acc_tran_heads.name as tran_head_name, acc_sub_heads.name as sub_head_name, acc_heads.name as head_name, acc_sub_heads.head_id, acc_voucher_details.sub_head, acc_voucher_details.tran_head, sum(acc_voucher_details.debit - acc_voucher_details.credit) as debit_balance, sum(acc_voucher_details.credit - acc_voucher_details.debit) as credit_balance');
        $this->db->from('acc_voucher_details');
        $this->db->join('acc_tran_heads','acc_tran_heads.id = acc_voucher_details.tran_head', 'left');
        $this->db->join('acc_sub_heads','acc_sub_heads.id = acc_voucher_details.sub_head', 'left');
        $this->db->join('acc_heads','acc_heads.id = acc_sub_heads.head_id', 'left');
        $this->db->where($where);
        $this->db->group_by("acc_voucher_details.tran_head");
        $this->db->order_by("acc_heads.name asc, acc_sub_heads.name asc");
        $query = $this->db->get();
        return $query->result();
    }

    public function getAccountsTotalBalance($where){
        $this->db->select('sum(acc_voucher_details.debit - acc_voucher_details.credit) as debit_balance, sum(acc_voucher_details.credit - acc_voucher_details.debit) as credit_balance');
        $this->db->from('acc_voucher_details');
        $this->db->join('acc_sub_heads','acc_sub_heads.id = acc_voucher_details.sub_head', 'left');
        $this->db->join('acc_heads','acc_heads.id = acc_sub_heads.head_id', 'left');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->row();
    }

    public function getPkNonPkAccountsTotalBalance($where,$branch){
        $this->db->select('sum(acc_voucher_details.debit - acc_voucher_details.credit) as debit_balance, sum(acc_voucher_details.credit - acc_voucher_details.debit) as credit_balance');
        $this->db->from('acc_voucher_details');
        $this->db->join('acc_sub_heads','acc_sub_heads.id = acc_voucher_details.sub_head', 'left');
        $this->db->join('acc_heads','acc_heads.id = acc_sub_heads.head_id', 'left');
        $this->db->where($where);
        $this->db->where_in("branch_id",$branch);
        $query = $this->db->get();
        return $query->row();
    }

    // main get total balance
    public function getMainAccountsTotalBalance($where){
        $this->db->select('sum(acc_voucher_details.debit - acc_voucher_details.credit) as debit_balance, sum(acc_voucher_details.credit - acc_voucher_details.debit) as credit_balance');
        $this->db->from('acc_voucher_details');
        $this->db->join('acc_sub_heads','acc_sub_heads.id = acc_voucher_details.sub_head', 'left');
        $this->db->join('acc_heads','acc_heads.id = acc_sub_heads.head_id', 'left');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->row();
    }


    public function getTranLedger($where = array()){
        $this->db->select('acc_voucher_details.*, acc_voucher.voucher_caption');
        $this->db->from('acc_voucher_details');
         $this->db->join('acc_voucher','acc_voucher.id = acc_voucher_details.voucher_id', 'left');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function getVoucherList($where = array()){
        $this->db->select('*');
        $this->db->from('acc_voucher');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function getVoucherListDetails($where = array()){
        $list = $this->getVoucherList($where);

        foreach ($list as $v) {
            $v->transections = $this->getTranList(array("acc_voucher_details.voucher_id" => $v->id));
        }

        return $list;
    }

    // main balance sheet report calculation
    function headWiseTotal($head_id,$pk_non_pk,$sDate,$eDate){
        
        $branch_array = $this->db->query("SELECT GROUP_CONCAT(id) as id FROM `branch_info` WHERE pksf_non_pksf = $pk_non_pk")->row()->id;

        $query = $this->db->query("SELECT SUM(debit) as debit,SUM(credit) as credit FROM `acc_voucher_details` WHERE branch_id IN($branch_array) AND voucher_date >= '$sDate' AND voucher_date <= '$eDate' AND tran_head = $head_id;")->row();

        return $total = $query->debit - $query->credit;

    }

}
//End class Accounts_model
?>
