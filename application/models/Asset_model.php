<?php 

//Start class Asset_model
class Asset_model extends CI_Model {

        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();
            
        }

        //Start getSubCatList
        public function getSubCatList(){
        	$this->db->select('asset_sub_category.*, asset_category.id as catID, asset_category.name as catName');
        	$this->db->from('asset_sub_category');
        	$this->db->join('asset_category', 'asset_category.id = asset_sub_category.asset_category_id', 'left');
        	$this->db->order_by('asset_sub_category.id', 'desc');
        	$query = $this->db->get();
        	return $query->result();
        }
        //End getSubCatList

        //Start getAssetList
        public function getAssetList($reg_branch, $branch, $location_id){
            $this->db->select('asset_info.*, asset_category.id as catID, asset_category.name as catName, asset_sub_category.id as subCatID, asset_sub_category.name as subCatName, asset_location.id as lcoationID, asset_location.name as locationName');
            $this->db->from('asset_info');
            $this->db->join('asset_category', 'asset_category.id = asset_info.asset_category_id', 'left');
            $this->db->join('asset_sub_category', 'asset_sub_category.id = asset_info.asset_sub_category_id', 'left');
            $this->db->join('asset_location', 'asset_location.id = asset_info.asset_location_id', 'left');
            $this->db->order_by('asset_category.id', 'desc');
            $this->db->where('asset_info.reg_branch_id', $reg_branch);
            $this->db->where('asset_info.branch_id', $branch);
            if(!empty($location_id)){
                $this->db->where('asset_info.asset_location_id', $location_id);
            }
            $this->db->where('asset_info.active', 1);
            $query = $this->db->get();
            return $query->result();
        }
        //End getAssetList

        //Start getSingleAssetList
        public function getSingleAssetList($asset_id){
            $this->db->select('asset_info.*, asset_category.id as catID, asset_category.name as catName, asset_sub_category.id as subCatID, asset_sub_category.name as subCatName, asset_location.id as lcoationID, asset_location.name as locationName, branch_info.id as branchID, branch_info.name as branchName');
            $this->db->from('asset_info');
            $this->db->join('asset_category', 'asset_category.id = asset_info.asset_category_id', 'left');
            $this->db->join('asset_sub_category', 'asset_sub_category.id = asset_info.asset_sub_category_id', 'left');
            $this->db->join('branch_info', 'branch_info.id = asset_info.branch_id', 'left');
            $this->db->join('asset_location', 'asset_location.id = asset_info.asset_location_id', 'left');
            $this->db->limit(1);
            $this->db->where('asset_info.id', $asset_id);
            $query = $this->db->get();
            return $query->row();
        }
        //End getSingleAssetList


        //Start getDamagedAssetList
        public function getDamagedAssetList($reg_branch, $branch, $location_id){
            $this->db->select('asset_info.*, asset_category.id as catID, asset_category.name as catName, asset_sub_category.id as subCatID, asset_sub_category.name as subCatName, asset_location.id as lcoationID, asset_location.name as locationName');
            $this->db->from('asset_info');
            $this->db->join('asset_category', 'asset_category.id = asset_info.asset_category_id', 'left');
            $this->db->join('asset_sub_category', 'asset_sub_category.id = asset_info.asset_sub_category_id', 'left');
            $this->db->join('asset_location', 'asset_location.id = asset_info.asset_location_id', 'left');
            $this->db->order_by('asset_category.id', 'desc');
            $this->db->where('asset_info.reg_branch_id', $reg_branch);
            $this->db->where('asset_info.branch_id', $branch);
            if(!empty($location_id)){
                $this->db->where('asset_info.asset_location_id', $location_id);
            }
            $this->db->where('asset_info.damaged_asset_quantity !=', 0);
            $this->db->where('asset_info.active', 1);
            $query = $this->db->get();
            return $query->result();
        }
        //End getDamagedAssetList

}
//End class Asset_model

