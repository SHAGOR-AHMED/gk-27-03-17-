<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends Base_Controller {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->model('Member_model');

    }

	//Start getBranchList
	public function getBranchList(){
		$branchList = find('branch_info', ['id', 'reg_branch_id', 'name'], ['reg_branch_id' => e(post('regional_branch'))], '*');
		echo json_encode($branchList);
	}
	//End getBranchList

    //Start getSomitiList
    public function getSomitiList(){
    	$somitiList = find('somiti_info', ['id','name'], ['branch_id' => e(post('branch_id'))], '*');
    	echo json_encode($somitiList);
    }
    //End getSomitiList

	public function get_member_form()
	{
		if(!hasPermission('add_member')){ redirect(base_url('/')); return false;}

		$data['title'] = 'Add new member';
		$data['districts'] = all('districts');
		$data['regBranchList'] = all('regional_branch_info');
		$data['somitiList'] = all('somiti_info');
		view('Member.Get_member_form', $data);
	}

	//Start generateMemberId
	public function generateMemberId($reg_branch, $branch, $somiti){
		$total_current_row = find('member_info', ['id'], ['somiti' => $somiti],'*');
		$str_len = strlen(count($total_current_row));
		$str_len = ($str_len==0)? 1 : $str_len;

		$reg_branch_len = strlen($reg_branch);
		$reg_branch_prefix = str_repeat('0', 3-$reg_branch_len);

		$branch_len = strlen($branch);
		$branch_prefix = str_repeat('0', 3-$branch_len);

		$somiti_len = strlen($somiti);
		$somiti_prefix = str_repeat('0', 4-$somiti_len);

		$formated_id = $reg_branch_prefix.$reg_branch.$branch_prefix.$branch.$somiti_prefix.$somiti.str_repeat('0', 4-$str_len);
		return $formated_id.''.(count($total_current_row)+1);

	}
	//End generateMemberId

	//Start getUpazillaList
	public function getUpazillaList(){
		$upazillaList = find('upazilas', ['id', 'name'], ['district_id' => e(post('district'))], '*');
		echo json_encode($upazillaList);
	}
	//End getUpazillaList

	public function member_create_step_one(){
		if(!hasPermission('add_member')){ redirect(base_url('/')); return false;}

		$message = '';
		$flag = false;
		$user_id = $this->generateMemberId(e(post('reg_branch')), e(post('branch')), e(post('somiti')));
		//upload image
		$config['upload_path'] = './uploads/member';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['max_size']	= '512';
		$config['max_width']  = '400';
		$config['max_height']  = '400';
		$config['file_name']  = $user_id;
		$config['overwrite'] = TRUE;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload() == FALSE)
		{
			$status = str_replace(array("<p>","</p>"), "", $this->upload->display_errors());
			$flag = FALSE;
		}
		else
		{
			$flag = TRUE;
		}

		// getting image name
		$path = $_FILES['userfile']['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);
		$photo = $user_id.".".$ext;

		//binding data in an array
		$data = [
			'organization' => e(post('organization')),
			'somiti' => e(post('somiti')),
			'upazilla' => e(post('upazilla')),
			'zilla' => e(post('zilla')),
			'user_id' => $user_id,
			'name' => e(post('name')),
			'photo' => $photo,
			'father_or_husband' => e(post('father')),
			'mother' => e(post('mother')),
			'age' => e(post('age')),
			'gender' => e(post('gender')),
			'joining_date' => e(post('joining_date')),
			'occupation' => e(post('occupation')),
			'maritial_status' => e(post('marital')),
			'educational_status' => e(post('education')),
			'address' => e(post('address')),
			'parmanent_address' => e(post('parmanent_address')),
			'self_home' => e(post('house')),
			'where_live' => e(post('where_live')),
			'total_room' => e(post('number_of_rooms')),
			'roof_type' => e(post('roof_type')),
			'living_type' => e(post('living_type')),
			'water_source' => e(post('water_source')),
			'water_source_self' => e(post('self_water_source')),
			'sanitary' => e(post('sanitery_type')),
			'nationality' => e(post('nationality')),
			'nid' => e(post('nid')),
			'phone' => e(post('phone')),
			'member_type' => e(post('member_type')),
			'ref_person' => e(post('ref_name')),
			'total_member' => e(post('total_member')),
			'total_child' => e(post('total_child')),
			'first_step_loan' => e(post('loan_amount')),
			'active' => 1
		];
		//storing data to database
		if(post('member_id')=='0'){
			$rtm = create('member_info', $data, true);
		}else{
			$rtm = update('member_info', $data, ['id' => post('member_id')]);
		}

		if($rtm){
			if(!$flag){
				echo $status."|warning";
				delete('member_info', ['id' => $rtm]);
				return false;
			}
			$user = find('member_info', ['user_id'], ['id' => $rtm]);
			$message = 'Member created successfully! Proceed to next step|success|'.$user->user_id;
		}else{
			$message = 'Member can not create at this moment!|warning';
		}
		echo $message;
	}


	//Start member_create_step_two
	public function member_create_step_two(){

		$member_family_assets = [
			'user_id' => e(post('member_id')),
			'cultivable' => e(post('cultivable_land')),
			'residential' => e(post('residential_land')),
			'cow' => e(post('cow')),
			'buffalo' => e(post('buffalo')),
			'goat' => e(post('goat')),
			'duck' => e(post('duck')),
			'hen' => e(post('hen')),
			'tree' => e(post('tree')),
			'teen_sheet_house' => e(post('teen_sheet_house')),
			'mats_house' => e(post('mats_house')),
			'others' => e(post('other')),
			'food_lacking' => e(post('food_lacking'))
		];

		$rtn1 = create_update('member_family_assets', $member_family_assets, ['user_id' => e(post('member_id'))]);

		$member_family_earning = [
			'user_id' => e(post('member_id')),
			'primary_monthly_earnings' => e(post('primary_earnings')),
			'secondary_monthly_earnings' => e(post('secondary_earnings')),
			'savings_amount' => e(post('savings_amount')),
			'loan_ngo_name' => e(post('ngo_name')),
			'loan_amount' => e(post('loan_amount')),
			'vgf_card' => e(post('vgf')),
			'project' => e(post('project_name'))
		];

		$rtn2 = create_update('member_family_earning', $member_family_earning, ['user_id' => e(post('member_id'))]);

		$member_family_info = count(post('family_member_name'));
		$members_name = post('family_member_name');
		$relations = post('relation');
		$family_marital_status = post('family_marital_status');
		$age = post('age');
		$educational_status = post('educational_status');
		$primary_occupation = post('primary_occupation');
		$secondary_occupation = post('secondary_occupation');

		for ($i=0; $i < $member_family_info; $i++) {
			if(!empty($members_name[$i])){
				$family_info = [
					'user_id' => post('member_id'),
					'family_member_name' => $members_name[$i],
					'relation' => $relations[$i],
					'marital' => $family_marital_status[$i],
					'age' => $age[$i],
					'education' => $educational_status[$i],
					'primary_occupation' => $primary_occupation[$i],
					'secondary_occupation' => $secondary_occupation[$i],
				];
				create_update('member_family_info', $family_info, ['user_id' => e(post('member_id')), 'family_member_name' => $members_name[$i]]);
			}
		}


		if($rtn1 && $rtn2){
			echo "Information successfully added. Proceed to next step.|success|".e(post('member_id'));
		}else{
			echo "Something went wrong, please try again latter. |warning|".e(post('member_id'));
		}

	}
	//End member_create_step_two

	//Start member_create_step_three
	public function member_create_step_three(){
		$expense_details = [
			[ 'user_id' => e(post('member_id')), 'type' => 'Rice', 'amount' => e(post('rice')), 'price' => e(post('rice_price')) ],
			[ 'user_id' => e(post('member_id')), 'type' => 'Peas', 'amount' => e(post('peas')), 'price' => e(post('peas_price')) ],
			[ 'user_id' => e(post('member_id')), 'type' => 'Fish', 'amount' => e(post('fish')),	'price' => e(post('fish_price')) ],
			[ 'user_id' => e(post('member_id')), 'type' => 'Egg', 'amount' => e(post('egg')),	'price' => e(post('egg_price'))  ],
			[ 'user_id' => e(post('member_id')), 'type' => 'Vegitable',	'amount' => e(post('vegitable')), 'price' => e(post('vegitable_price')) ],
			[ 'user_id' => e(post('member_id')), 'type' => 'Salt', 'amount' => e(post('salt')),	'price' => e(post('salt_price')) ],
			[ 'user_id' => e(post('member_id')), 'type' => 'Oil', 'amount' => e(post('oil')), 'price' => e(post('oil_price')) ],
			[ 'user_id' => e(post('member_id')), 'type' => 'Treatment',	'amount' => e(post('treatment')), 'price' => e(post('treatment_expense')) ],
			[ 'user_id' => e(post('member_id')), 'type' => 'Clothes', 'amount' => e(post('clothes')), 'price' => e(post('clothes_expense')) ],
			[ 'user_id' => e(post('member_id')), 'type' => 'Education', 'amount' => e(post('education')), 'price' => e(post('education_expense')) ],
			[ 'user_id' => e(post('member_id')), 'type' => 'Ceremony', 'amount' => e(post('ceremony')), 'price' => e(post('ceremony_expense')) ],
			[ 'user_id' => e(post('member_id')), 'type' => 'Other', 'amount' => e(post('other')), 'price' => e(post('other_expense')) ],

		];
		$rtm = create('member_expense_details', $expense_details, false, true);
		if($rtm){
			echo "Member information successfully added!|success";
		}else{
			echo "Something went wrong!|warning";
		}
	}
	//End member_create_step_three

	//Start search_members
	public function search_members(){
		if(!hasPermission('search_member')){ redirect(base_url('/')); return false;}

		$data['title'] = 'Search Members';
		$data['regBranchList'] = all('regional_branch_info',['id','name']);
		//search members
		$somiti = get('somiti');
		if(!empty($reg_branch) || !empty($branch) || !empty($somiti)){
			// $data['membersList'] = find('member_info', ['*'], ['somiti' => $somiti ], '*');
			$data['membersList'] = $this->Member_model->searchMember($somiti);
			// dd($data);
		}
		view('Member.Search_members', $data);
	}
	//End search_members


	//Start single_member_info
	public function single_member_info(){
		if(!hasPermission('view_member')){ redirect(base_url('/')); return false;}

		$member_id = segment(2);
		$data['title'] = 'Member Info';
		if(!empty($member_id)){
			$data['member'] = $this->Member_model->single_member_info($member_id);
		}
		view('Member.Single_member_info', $data);
	}
	//End single_member_info

	//Start edit_member_info
	public function edit_member_info(){
		if(!hasPermission('edit_member')){ redirect(base_url('/')); return false;}

		$member_id = segment(3);
		if(!empty($member_id)){
			$data['member'] = $this->Member_model->single_member_info($member_id);
		}
		// dd($data['member']);
		$data['title'] = 'Update member info';
		$data['regBranchList'] = all('regional_branch_info');
		$data['somitiList'] = all('somiti_info');
		$data['districts'] = all('districts');
		// dd($data['member']);
		view('Member.Get_member_update_form', $data);
	}
	//End edit_member_info


	//Start member_info_update
	public function member_info_update(){
		if(!hasPermission('edit_member')){ redirect(base_url('/')); return false;}

		$message = '';
		$flag = false;
		$status = '';
		$user_id = e(post('member_id'));
		//upload image
		$config['upload_path'] = './uploads/member';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['max_size']	= '512';
		$config['max_width']  = '400';
		$config['max_height']  = '400';
		$config['file_name']  = $user_id;
		$config['overwrite'] = TRUE;

		$this->load->library('upload', $config);

		if ( $this->upload->do_upload() == FALSE)
		{
			$status = str_replace(array("<p>","</p>"), "", $this->upload->display_errors());
			$flag = FALSE;
		}
		else
		{
			$flag = TRUE;
		}

		// getting image name
		$path = $_FILES['userfile']['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);
		if(empty($path) && empty($ext)){
			$photo = e(post('photo'));
		}else{
			$photo = $user_id.".".$ext;
			echo $status;
		}

		//binding data in an array
		$data = [
			'organization' => e(post('organization')),
			'somiti' => e(post('somiti')),
			'upazilla' => e(post('upazilla')),
			'zilla' => e(post('zilla')),
			'user_id' => $user_id,
			'name' => e(post('name')),
			'photo' => $photo,
			'father_or_husband' => e(post('father')),
			'mother' => e(post('mother')),
			'age' => e(post('age')),
			'gender' => e(post('gender')),
			'joining_date' => e(post('joining_date')),
			'occupation' => e(post('occupation')),
			'maritial_status' => e(post('marital')),
			'educational_status' => e(post('education')),
			'address' => e(post('address')),
			'parmanent_address' => e(post('parmanent_address')),
			'self_home' => e(post('house')),
			'where_live' => e(post('where_live')),
			'total_room' => e(post('number_of_rooms')),
			'roof_type' => e(post('roof_type')),
			'living_type' => e(post('living_type')),
			'water_source' => e(post('water_source')),
			'water_source_self' => e(post('self_water_source')),
			'sanitary' => e(post('sanitery_type')),
			'nationality' => e(post('nationality')),
			'nid' => e(post('nid')),
			'phone' => e(post('phone')),
			'member_type' => e(post('member_type')),
			'ref_person' => e(post('ref_name')),
			'total_member' => e(post('total_member')),
			'total_child' => e(post('total_child')),
			'first_step_loan' => e(post('loan_amount')),
			'active' => 1
		];
		//storing data to database
		$rtm = update('member_info', $data, ['user_id' => post('member_id')]);
		if($rtm){
			echo "Member information updated! |success|".$photo;
		}else{
			echo "Something went wrong, please try again latter!";
		}

	}
	//End member_info_update

    public function member_kyc_form_report()
    {
        if(!hasPermission('kyc_profile_form')){ redirect(base_url('/')); return false;}
        $data['member'] = $this->Member_model->single_member_info(segment(2));
        $data['total_expense'] = $this->Member_model->member_total_expense(segment(2));
        makePDF('Reports/Member/Kyc_profile_form', $data, 'KYC Profile Form-'.segment(2));
    }


   // delete function for somiti
	public function delete_member_info(){
		$member_id = $this->uri->segment(3);
		$del = $this->db->where("id",$member_id)->delete("member_info");

		if($del):
			$this->session->set_flashdata("msg","Member info deleted successfully");
		else:
			$this->session->set_flashdata("msg","Fail to delete member information");
		endif;

		redirect(base_url("search_members"));

	}

}//end of Member Class
