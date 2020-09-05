<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Start class Authorization
class Authorization extends Base_Controller {


	public function index(){
		if(!hasPermission('authorization')){ redirect(base_url('/')); return false;};
		$data['title'] = 'Authorization management';
		$data['roles'] = find('roles', '*', [], '*', [], true, 'name asc');
		$data['permissions'] = find('permissions', '*', [], '*', [], true, 'label asc');
		view('Authorization.Authorization_management', $data);
	}

	public function create_role()
	{
		if(!hasPermission('authorization')){ redirect(base_url('/')); return false;};
		$rtm = create('roles', ['name' => post('role_name')]);
		echo json_encode($rtm);
	}

	public function get_extra_roles()
	{
		if(!hasPermission('authorization')){ redirect(base_url('/')); return false;};
		$extra_roles = find('roles', '*', ['id >' => '5'], '*');
		echo json_encode($extra_roles);
	}

	public function remove_role()
	{
		if(!hasPermission('authorization')){ redirect(base_url('/')); return false;};
	    $rtm = delete('roles', ['id' => post('role_id')]);
		echo json_encode($rtm);
	}

	public function assign_permission(){
		if(!hasPermission('authorization')){ redirect(base_url('/')); return false;};
		$permission_role = find('permission_role', '*', ['role_id' => post('role'), 'permission_id' => post('permission')], '*');
		if(count($permission_role)){
			return false;
		}
		$data = [
			'role_id' => post('role'),
			'permission_id' => post('permission')
		];
		$rtm = create('permission_role', $data);
		echo json_encode($rtm);
	}

	public function getPermissionList(){
		if(!hasPermission('authorization')){ redirect(base_url('/')); return false;};
		$this->db->select('permissions.label as label, permissions.id as permission_id, permission_role.id as permission_role_id');
		$this->db->from('permissions');
		$this->db->join('permission_role', 'permission_role.permission_id = permissions.id', 'left');
		$this->db->where('permission_role.role_id', post('role'));
		$this->db->order_by('permissions.label', 'asc');
		$query = $this->db->get();
		$permissions = $query->result();
		echo json_encode($permissions);
	}

	public function remove_permission(){
		if(!hasPermission('authorization')){ redirect(base_url('/')); return false;};
		$rtm = delete('permission_role', ['id' => post('permission_role_id')]);
		echo json_encode($rtm);
	}

}//end of Authorization
