<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Start class Asset_management
class Asset_management extends Base_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->model('Asset_model');

	}

	public function category(){
		$data['title'] = 'Asset Category';
		view('Asset_management.Category', $data);
	}

	//Start add_asset_category
	public function add_asset_category(){
		$rtm = create('asset_category', ['name' => e(post('add_input_category'))]);
		echo json_encode($rtm);
	}
	//End add_asset_category

	//Start get_asset_category_list
	public function get_asset_category_list(){
		$data = all('asset_category', '*', 'desc');
		echo json_encode($data);
	}
	//End get_asset_category_list

	//Start update_asset_category
	public function update_asset_category(){
		$rtm = update('asset_category', ['name' => e(post('update_input_category'))], ['id' => e(post('asset_cat_id'))]);
		echo json_encode($rtm);
	}
	//End update_asset_category

	//Start sub_category
	public function sub_category(){
		$data['title'] = 'Asset Sub Category';
		$data['categoryList'] = all('asset_category');
		// dd($data);
		view('Asset_management.Sub_category', $data);
	}
	//End sub_category

	//Start add_asset_sub_category
	public function add_asset_sub_category(){
		$data = [
			'asset_category_id' => e(post('category_name')),
			'name' => e(post('sub_category_name'))
		];
		$rtm = create('asset_sub_category', $data);
		echo json_encode($rtm);
	}
	//End add_asset_sub_category

	//Start get_asset_sub_category_list
	public function get_asset_sub_category_list(){
		$data = $this->Asset_model->getSubCatList();
		echo json_encode($data);
	}
	//End get_asset_sub_category_list

	//Start update_asset_sub_category
	public function update_asset_sub_category(){
		$data = [
			'asset_category_id' => e(post('update_category_name')),
			'name' => e(post('update_sub_category_name'))
		];
		$rtm = update('asset_sub_category', $data, ['id' => e(post('sub_cat_id'))]);
		echo json_encode($rtm);
	}
	//End update_asset_sub_category

	//Start location
	public function location(){
		$data['title'] = 'Asset Location';
		view('Asset_management.Location', $data);
	}
	//End location

	//Start add_asset_location
	public function add_asset_location(){
		$data = [
			'name' => e(post('location_name')),
			'description' => e(post('location_description'))
		];
		$rtm = create('asset_location', $data);
		echo json_encode($rtm);
	}
	//End add_asset_location

	//Start getAssetLocationList
	public function getAssetLocationList(){
		$data = all('asset_location', '*', 'desc');
		echo json_encode($data);
	}
	//End getAssetLocationList

	//Start update_asset_location
	public function update_asset_location(){
		$data = [
			'name' => e(post('update_location_name')),
			'description' => e(post('update_location_description'))
		];
		$rtm = update('asset_location', $data, ['id' => e(post('asset_location_id'))]);
		echo json_encode($rtm);
	}
	//End update_asset_location

}
//End class Asset_management
?>
