<?php 
//Start class Somiti_model
class Somiti_model extends CI_Model {

        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();
            
        }

        //Start fetchSomiti
        public function fetchSomiti($somiti_info){
        	$this->db->select('somiti_info.*, branch_info.id as branchID, branch_info.name as branchName, regional_branch_info.id as regBranchID, regional_branch_info.name as regBranchName, districts.id as distID, districts.name as disctrictName, upazilas.id as upazilaID,upazilas.name as upazilaName');
        	$this->db->from('somiti_info');
        	$this->db->join('regional_branch_info', 'regional_branch_info.id = somiti_info.reg_branch_id', 'left');
        	$this->db->join('branch_info', 'branch_info.id = somiti_info.branch_id', 'left');
        	$this->db->join('districts', 'somiti_info.zila = districts.id', 'left');
        	$this->db->join('upazilas', 'somiti_info.upazila = upazilas.id', 'left');
        	$this->db->where('somiti_info.id', $somiti_info);
        	$query = $this->db->get();
        	return $query->row();
        }
        //End fetchSomiti

        // get branch list
        function branchList( $reg_id ){
            return $this->db->where("reg_branch_id",$reg_id)->get("branch_info")->result();
        }

}
//End class Somiti_model

