<?php

//Start class Branch_model
class Branch_model extends CI_Model {

        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();
            
        }


        //Start fetchBranch
        public function fetchBranch($branch_id){
        	$this->db->select('branch_info.*, regional_branch_info.id as regBranchID, regional_branch_info.name as regBranchName, districts.id as distID, districts.name as disctrictName, upazilas.id as upazilaID,upazilas.name as upazilaName');
        	$this->db->from('branch_info');
        	$this->db->join('regional_branch_info', 'regional_branch_info.id = branch_info.reg_branch_id', 'left');
        	$this->db->join('districts', 'branch_info.zila = districts.id', 'left');
        	$this->db->join('upazilas', 'branch_info.upazila = upazilas.id', 'left');
        	$this->db->where('branch_info.id', $branch_id);
        	$query = $this->db->get();
        	return $query->row();
        }
        //End fetchBranch

}
//End class Branch_model

