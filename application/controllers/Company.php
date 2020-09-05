<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Start class Company
class Company extends Base_Controller {


	public function __construct(){
		parent::__construct();

	}

	//Start company_info
	public function company_info(){
		if(!hasPermission('company_info')){ redirect(base_url('/')); return false;};

		$data['title'] = 'Company Info';
		$data['company'] = find('company_info','*',['id' => '_default']);
		view('Company.Company_info_view', $data);
	}
	//End company_info

	//Start edit_company_info
	public function edit_company_info(){
		if(!hasPermission('company_info_edit')){ redirect(base_url('/')); return false;};

		$data['company'] = find('company_info','*',['id' => '_default']);
		view('Company.Company_info_update', $data);
	}
	//End edit_company_info

	//Start company_info_update
	public function update_company_info(){
		if(!hasPermission('company_info_edit')){ redirect(base_url('/')); return false;};

		$flag = false;
		$status = '';
		//upload image
		$config['upload_path'] = './public/img';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['max_size']	= '512';
		$config['max_width']  = '400';
		$config['max_height']  = '400';
		$config['file_name']  = 'logo';
		$config['overwrite'] = TRUE;

		$this->load->library('upload', $config);



		// getting image name
		$path = $_FILES['userfile']['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);
		if(empty($path) && empty($ext)){
			$photo = e(post('photo'));
		}else{
			if ( ! $this->upload->do_upload())
			{
				$status = str_replace(array("<p>","</p>"), "", $this->upload->display_errors());
				setFMessage('msg_company', $status);
				redirect(base_url('edit_company_info'));
			}
			$photo = 'logo'.".".$ext;
		}
		$data = [
			'name' => e(post('name')),
			'address' => e(post('address')),
			'email' => e(post('email')),
			'phone' => e(post('phone')),
			'fax' => e(post('fax')),
			'tin' => e(post('tin')),
			'vat' => e(post('vat')),
			'mra_no' => e(post('mra')),
			'photo' => $photo

		];
		$rtm = update('company_info', $data, ['id' => '_default']);
		if ($rtm) {
			setFMessage('msg_company','Company information updated successfuly');
		} else {
			setFMessage('msg_company','Something went wrong!, please try again latter.');
		}

		redirect(base_url('company_info_view'));

	}
	//End company_info_update

	public function get_office_form(){
		if(!hasPermission('company_info')){ redirect(base_url('/')); return false;};

		$data['title'] = 'Branch Office';
		view('Company.Branch_office_create', $data);
	}


	//Start create_branch_office
	public function create_branch_office(){
		if(!hasPermission('company_info')){ redirect(base_url('/')); return false;};

		$data = [
			'branch_name' => e(post('branch_office_name')),
			'address' => e(post('address')),
			'email' => e(post('email')),
			'phone' => e(post('phone')),
			'fax' => e(post('fax'))
		];

		$rtm = create('branch_office_info', $data);
		if ($rtm) {
			setFMessage('msg_branch_office','Branch office created successfuly');
		} else {
			setFMessage('msg_branch_office','Something went wrong!, please try again latter.');
		}

		redirect(base_url('get_office_form'));

	}
	//End create_branch_office

	//Start search_branch_office
	public function search_branch_office(){
		if(!hasPermission('company_info')){ redirect(base_url('/')); return false;};

		$data['branchOfficeList'] = all('branch_office_info');

		view('Company.Search_branch_office', $data);
	}
	//End search_branch_office

	//Start edit_branch_office
	public function edit_branch_office(){
		if(!hasPermission('company_info')){ redirect(base_url('/')); return false;};

		$data['title'] = 'Update Branch';
		$data['branch_office'] = find('branch_office_info','*',['id' => segment(3)]);
		view('Company.Edit_branch_office', $data);
	}
	//End edit_branch_office

	//Start update_branch_office
	public function update_branch_office(){
		if(!hasPermission('company_info')){ redirect(base_url('/')); return false;};

		$id = e(post('hidden_id'));
		$data = [
			'branch_name' => e(post('branch_office_name')),
			'address' => e(post('address')),
			'email' => e(post('email')),
			'phone' => e(post('phone')),
			'fax' => e(post('fax'))
		];

		$rtm = update('branch_office_info', $data, ['id' => $id]);
		if ($rtm) {
			setFMessage('msg_branch_office','Branch office updated successfuly');
		} else {
			setFMessage('msg_branch_office','Something went wrong!, please try again latter.');
		}

		redirect(base_url('edit/branch_office').'/'.$id);
	}
	//End update_branch_office


}
//End class Company
