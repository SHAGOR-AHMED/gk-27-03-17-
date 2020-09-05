<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		if(auth('logged_in')){
			redirect(base_url('dashboard'));
			return false;
		}else{
			view('Login');
		}
	}


	public function post_login(){
		if (isset($_POST['login'])) {
			fromVRules('username', 'Username', 'required|trim');
			fromVRules('password', 'Password', 'required|trim|min_length[5]');
			
			if (!isVRulePassed()){
					view('Login');
			}else{
				//checking the user match the criteria
				$user = find('users', ['id', 'username', 'user_id','usertype', 'branch_id', 'created_at'], ['username' => trim(e(post('username'))), 'password' => sha1(trim(e(post('password')))), 'active' => 1]);
				//if login success then store the user some info in session
				if(count($user) > 0){
					$this->session->set_userdata('id', $user->id);
					$this->session->set_userdata('userID', $user->user_id);
					$this->session->set_userdata('username', $user->username);
					$this->session->set_userdata('usertype', $user->usertype);
					$this->session->set_userdata('log_branch', $user->branch_id);
					$this->session->set_userdata('created_at', $user->created_at);
					$this->session->set_userdata('name', find('employee_info', 'emp_name', ['id' => $user->user_id])->emp_name);
					create('user_logs', ['session_id' =>  session_id(), 'user_id' => $user->user_id, 'username' => $user->username, 'ip_address' => getIP(), 'platform' => $this->agent->platform(), 'browser' => $this->agent->browser(), 'login' => unix_to_human(now('Asia/Dhaka')), 'user_type' => $user->usertype]);
					$data['message'] = '';
					redirect('dashboard');
				}else{
					setFMessage('message', 'Username or Password incorrect!');
					redirect(base_url('login'));
				}
			}

		}else{
			view('Login');
		}
	}


	// //Start d
	// public function d(){
	// 	dd(unix_to_human(now('Asia/Dhaka')));
	// }
	// //End d

	public function logout(){
		update('user_logs', ['logout' =>  unix_to_human(now('Asia/Dhaka'))], ['session_id' => session_id()]);
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

	//Start get_attendence
	public function get_attendence(){
		view('Attendence');
	}
	//End get_attendence

	//Start post_attendence
	public function post_attendence(){
		if (isset($_POST['attendence'])) {
			fromVRules('username', 'Username', 'required|trim');
			fromVRules('password', 'Password', 'required|trim|min_length[5]');
			
			if (!isVRulePassed()){
					view('Attendence');
			}else{
				//checking the user match the criteria
				$user = find('users', ['*'], ['username' => trim(e(post('username'))), 'password' => sha1(trim(e(post('password'))))]);
				if(count($user) > 0){
					$type = e(post('type'));
					$date = explode(' ', unix_to_human(now('Asia/Dhaka')));
					$att = find('employee_attendence','entry_time, exit_time, date', ['user_id' => $user->user_id, 'date' => $date[0] ]);
					if($type == '1'){
						if(count($att)>0){
							if(!empty($att->entry_time)){
								setFMessage('message', 'Attendence has already counted today!');
								redirect(base_url('attendence'));
							}
						}else{
							create('employee_attendence', ['user_id' => $user->user_id, 'entry_time' =>  $date[1], 'date' => $date[0]]);
							setFMessage('message', 'Attendence counted successfully');
							redirect(base_url('attendence'));
						}

					}else{
						if(count($att)>0){
							if(!empty($att->exit_time)){
								setFMessage('message', 'Exit has already counted today!');
								redirect(base_url('attendence'));
							}else{
								update('employee_attendence', ['exit_time' =>  $date[1]], ['user_id' => $user->user_id, 'date' => $date[0]]);
								setFMessage('message', 'Exit counted successfully!');
								redirect(base_url('attendence'));
							}

						}else{
							setFMessage('message', 'Your attendence don\'t count today!');
							redirect(base_url('attendence'));
						}
					}
				}else{
					setFMessage('message', 'Username or Password incorrect!');
					redirect(base_url('attendence'));
				}
			}

		}else{
			view('Attendence');
		}
	}
	//End post_attendence

	// user creation
	public function create_user(){
		$data['regBranchList'] = all('regional_branch_info','id, name');
		view('inc.Header',$data);
		view('user.create');
		view('inc.Footer');
	}

	// save user data
	public function save_user(){
		if(isset($_POST['create'])):
			extract($_POST);

			if($userType == 1):
				$utype = "super_admin";
				$branch = 786;
			else:
				$utype = 5;
			endif;

			$uid = $this->db->order_by("id","DESC")->limit(1)->get("users")->row()->user_id + 1;

			$data = array(
					"id" => '',
					"user_id" => $uid,
					"username" => $username,
					"password" => sha1($password),
					"branch_id" => $branch,
					"usertype"	=> $utype,
					"active" => 1
				);

			$ins = $this->db->insert("users",$data);

			if($ins):
				$this->session->set_flashdata("msg","New User create successfully");
			else:
				$this->session->set_flashdata("msg","Fail to create new user.Try again");
			endif;

			redirect(base_url("create_user"));


		endif;
	}

	// user reporting
	public function user_report(){
		$data['userList'] = $this->db->get("users")->result();
		view('inc.Header',$data);
		view('user.report');
		view('inc.Footer');
	}

	// user delation
	public function delete_user(){
		$user_id = $this->uri->segment(3);

		$del = $this->db->where("id",$user_id)->delete("users");

		if($del):
			$this->session->set_flashdata("msg","User delete successfully");
		else:
			$this->session->set_flashdata("msg","Fail to delete user");
		endif;

		redirect(base_url("user_report"));

	}

	// edit user
	public function edit_user(){
		$user_id = $this->uri->segment(3);

		$data['regBranchList'] = all('regional_branch_info','id, name');
		$data['user_info'] = $this->db->where("id",$user_id)->get("users")->row();

		view('inc.Header',$data);
		view('user.edit');
		view('inc.Footer');

	}


// db handle start
public function hellodb(){
        // Load the DB utility class
        $this->load->dbutil();

// Backup your entire database and assign it to a variable
        $backup = $this->dbutil->backup();

// Load the file helper and write the file to your server
//        $this->load->helper('file');
//        write_file('assets/db/mybackup.zip', $backup);

// Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download('mybackup.zip', $backup);
    }

    public function table_list(){
        $tables = $this->db->list_tables();
        echo '<pre>';
        print_r($tables);
        echo '</pre>';
    }

    public function empty_all_table(){
    	$tables = $this->db->list_tables();
    	for($i = 0;$i <= count($tables);$i++):
    		$tr = $this->db->truncate($tables[$i]);
    		
    		if($tr === true):
    			echo 'tables---> '.$tables[$i].'  done.<br/>';
    		else:
    			echo 'tables---> '.$tables[$i],'  fail.<br/>';
    		endif;

    	endfor;
    }
// db handle end

	// update user
	public function update_user(){
		if(isset($_POST['update'])):
			extract($_POST);

			if($userType == 1):
				$utype = "super_admin";
				$branch = 786;
			else:
				$utype = 5;
			endif;

			$data = array(
					"username" => $username,
					"password" => sha1($password),
					"branch_id" => $branch,
					"usertype"	=> $utype,
					"active" => 1
				);

			$up = $this->db->where("id",$user_id)->update("users",$data);

			if($up):
				$this->session->set_flashdata("msg","User data modify");
			else:
				$this->session->set_flashdata("msg","Fail to update user data");
			endif;

			redirect(base_url("user_report"));

		endif;
	}

}//end of User Class
