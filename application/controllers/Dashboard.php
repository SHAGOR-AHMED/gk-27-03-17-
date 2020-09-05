<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Base_Controller {

	public function index()
	{

		$data = [ 'title' => 'Dashboard' ];
		$data['total_regional_branch'] = count(all('regional_branch_info'));
		$data['total_branch'] = count(all('branch_info'));
		$data['total_somiti'] = count(all('somiti_info'));
		$data['total_member'] = count(all('member_info'));
		$data['total_asset'] = $this->total_asset();
		$data['total_usable_asset'] = ($this->total_asset()) - ($this->total_damaged_asset());
		view('Dashboard.Dashboard', $data);
	}

	//Start total_asset
	public function total_asset(){
	    $this->db->select_sum('quantity');
	    $this->db->from('asset_info');
	    $query = $this->db->get();
	    return $query->row()->quantity;
	}
	//End total_asset

	//Start total_damaged_asset
	public function total_damaged_asset(){
	    $this->db->select_sum('damaged_asset_quantity');
	    $this->db->from('asset_info');
	    $query = $this->db->get();
	    return $query->row()->damaged_asset_quantity;
	}
	//End total_damaged_asset

	//Start demo
	public function demo(){
		$extra_roles = find('roles', '*', ['id >' => '5'], '*');
		dd($extra_roles);
	}
	//End demo

}//end of Dashboard Class
