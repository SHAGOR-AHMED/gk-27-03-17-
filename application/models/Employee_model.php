<?php
//Start class Employee_model
class Employee_model extends CI_Model {

        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();

        }

        //Start fetchEmployee
        public function fetchEmployee($emp_id){

            $this->db->select('employee_info.*, branch_info.name as brName');
            $this->db->from('employee_info');
            $this->db->join('branch_info','branch_info.id = employee_info.branch_id', 'left');
            $this->db->where('employee_info.id',$emp_id);
            $query = $this->db->get();
            return $query->row();

        }
        //End fetchEmployee

        //Start serachEmployee
        public function serachEmployee($reg_branch_id, $branch_id){
            $this->db->select('*');
            $this->db->from('employee_info');
            $this->db->where('employee_info.reg_branch_id',$reg_branch_id);
            $this->db->where('employee_info.branch_id', $branch_id);
            $query = $this->db->get();
            return $query->result();
        }

        //Start serachEmployee
        public function employeeListConcat($reg_branch_id, $branch_id){
            $this->db->select('GROUP_CONCAT(id) as id,GROUP_CONCAT(emp_name) as name');
            $this->db->from('employee_info');
            $this->db->where('employee_info.reg_branch_id',$reg_branch_id);
            $this->db->where('employee_info.branch_id', $branch_id);
            $query = $this->db->get();
            return $query->row();
        }

        //End serachEmployee

        //Start serachEmployee
        public function serachEmployeeWithRole($reg_branch_id, $branch_id){
            $this->db->select('employee_info.*, users.usertype');
            $this->db->from('employee_info');
            $this->db->where('employee_info.reg_branch_id',$reg_branch_id);
            $this->db->where('employee_info.branch_id', $branch_id);
            $this->db->join('users','users.user_id = employee_info.id', 'left');
            $query = $this->db->get();
            return $query->result();
        }
        //End serachEmployee

}
//End class Employee_model
