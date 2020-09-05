<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Start class Asset_details
class Asset_details extends Base_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->model('Asset_model');
	}

	//Start asset_allocation
	public function asset_allocation(){
		$data['title'] = "Asset allocation";
		$data['regionalbranchList'] = all('regional_branch_info');
		$data['categoryList'] = all('asset_category');
		$data['asset_locationList'] = all('asset_location');
		view('Asset_details.Asset_allocation', $data);
	}
	//End asset_allocation

	//Start getSubCatList
	public function getSubCatList(){
		$data = find('asset_sub_category', '*', ['asset_category_id' => e(post('category'))], '*');
		echo json_encode($data);
	}
	//End getSubCatList

	//Start create_asset_allocation
	public function create_asset_allocation(){
		$data = [

				'asset_category_id' => e(post('category_name')),
				'asset_sub_category_id	' => e(post('sub_category_name')),
				'reg_branch_id' => e(post('reg_branch')),
				'branch_id' => e(post('branch')),
				'asset_location_id' => e(post('location_name')),
				'quantity' => e(post('asset_quantity')),
				'unit_price' => e(post('asset_unit_price')),
				'purchase_date' => e(post('purchase_date')),
				'issue_date' => e(post('issue_date')),
				'asset_used_by' => e(post('asset_used_by')),
				'description' => e(post('asset_description')),
				'issued_by' => auth('id')
		];
		$rtm = create('asset_info', $data);
		if ($rtm) {
			setFMessage('msg','Asset allocated successfuly');
		} else {
			setFMessage('msg','Something went wrong!, please try again latter.');
		}
		redirect(base_url('asset_allocation'));
	}
	//End create_asset_allocation

	//Start search_asset
	public function search_asset(){
		$data['title'] = 'Search asset';
		$data['asset_locationList'] = all('asset_location');
		$reg_branch = e(get('reg_branch'));
		$branch = e(get('branch'));
		$location_id = e(get('location'));
		if(!empty($reg_branch) && !empty($branch)){
			$data['assetList'] = $this->Asset_model->getAssetList($reg_branch, $branch, $location_id);
		}
		$data['regionalbranchList'] = all('regional_branch_info');
		view('Asset_details.Search_asset', $data);
	}
	//End search_asset

	//Start edit_asset
	public function edit_asset(){
		$data['title'] = 'Edit asset';
		$asset_id = segment(3);
		$data['regionalbranchList'] = all('regional_branch_info');
		$data['categoryList'] = all('asset_category');
		$data['asset_locationList'] = all('asset_location');
		$data['asset'] = $this->Asset_model->getSingleAssetList($asset_id);
		view('Asset_details.Edit_asset', $data);
	}
	//End edit_asset

	//Start update_asset_allocation
	public function update_asset_allocation(){
		$asset_id = e(post('asset_id'));
		$data = [

				'asset_category_id' => e(post('category_name')),
				'asset_sub_category_id	' => e(post('sub_category_name')),
				'reg_branch_id' => e(post('reg_branch')),
				'branch_id' => e(post('branch')),
				'asset_location_id' => e(post('location_name')),
				'quantity' => e(post('asset_quantity')),
				'damaged_asset_quantity' => e(post('damaged_asset_quantity')),
				'unit_price' => e(post('asset_unit_price')),
				'purchase_date' => e(post('purchase_date')),
				'issue_date' => e(post('issue_date')),
				'asset_used_by' => e(post('asset_used_by')),
				'description' => e(post('asset_description')),
				'issued_by' => auth('id'),
				'updated_at' => date('Y-m-d H:m:s')
		];

		if(post('damaged_asset_quantity') != 0){
			$data['damaged_date'] = date('Y-m-d H:m:s');
		}

		$rtm = update('asset_info', $data, ['id' => $asset_id]);
		if ($rtm) {
			setFMessage('msg','Asset allocation updated successfuly');
		} else {
			setFMessage('msg','Something went wrong!, please try again latter.');
		}
		redirect(base_url('edit/asset').'/'.$asset_id);
	}
	//End update_asset_allocation


	//Start damaged_asset
	public function damaged_asset(){
		$data['title'] = 'Damaged asset';
		$data['regionalbranchList'] = all('regional_branch_info');
		$data['asset_locationList'] = all('asset_location');
		$reg_branch = e(get('reg_branch'));
		$branch = e(get('branch'));
		$location_id = e(get('location'));
		if(!empty($reg_branch) && !empty($branch)){
			$data['assetList'] = $this->Asset_model->getDamagedAssetList($reg_branch, $branch, $location_id);
		}
		view('Asset_details.Damaged_asset', $data);
	}
	//End damaged_asset
}
//End class Asset_details
?>