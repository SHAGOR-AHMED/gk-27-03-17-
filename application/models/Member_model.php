<?php

//Start class Member_model
class Member_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();

    }

    //Start single_member_info
    public function single_member_info($member_id){
    	$this->db->select('member_info.*, somiti_info.id as somitiID, somiti_info.name as somitiName, somiti_info.branch_id, somiti_info.reg_branch_id, regional_branch_info.name as regBrName, branch_info.name as brName, branch_info.address as brAddress, districts.name as districtName, upazilas.name as upazillaName, member_family_assets.cultivable, member_family_assets.residential, member_family_earning.primary_monthly_earnings, member_family_earning.secondary_monthly_earnings');
    	$this->db->from('member_info');
    	$this->db->join('somiti_info', 'member_info.somiti = somiti_info.id', 'left');
        $this->db->join('branch_info', 'somiti_info.branch_id = branch_info.id', 'left');
        $this->db->join('regional_branch_info', 'branch_info.reg_branch_id = regional_branch_info.id', 'left');
        $this->db->join('districts', 'districts.id = member_info.zilla', 'left');
        $this->db->join('upazilas', 'upazilas.id = member_info.upazilla', 'left');
        $this->db->join('member_family_assets', 'member_family_assets.user_id = member_info.user_id', 'left');
        $this->db->join('member_family_earning', 'member_family_earning.user_id = member_info.user_id', 'left');
    	$this->db->where('member_info.user_id', $member_id);
    	$query = $this->db->get();
    	return $query->row();
    }
    //End single_member_info

    //Start searchMember
    public function searchMember($somiti_id){
        $this->db->select('member_info.*, somiti_info.name AS somotiName, branch_info.name AS brName, regional_branch_info.name AS regBrName, districts.name AS zila, upazilas.name AS upazila');
        $this->db->from('member_info');
        $this->db->join('somiti_info', 'member_info.somiti = somiti_info.id', 'left');
        $this->db->join('branch_info', 'somiti_info.branch_id = branch_info.id', 'left');
        $this->db->join('regional_branch_info', 'branch_info.reg_branch_id = regional_branch_info.id', 'left');
        $this->db->join('districts', 'member_info.Zilla = districts.id', 'left');
        $this->db->join('upazilas', 'member_info.upazilla = upazilas.id', 'left');
        $this->db->where('somiti_info.id', $somiti_id);
        $query = $this->db->get();
        return $query->result();
    }
    //End searchMember

    public function member_total_expense($member_id)
    {
        $this->db->select_sum('price');
         $this->db->from('member_expense_details');
         $this->db->where(['user_id' => $member_id]);
         $query = $this->db->get();
         return $query->row()->price;
    }

}
//End class Member_model

?>
