<?php

//Start class Attendence_model
class Attendence_model extends CI_Model {

        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();
            
        }

        //Start searchAttendence
        public function searchAttendence($branch_id, $employee, $from, $to){
        	
            $this->db->select('employee_attendence.entry_time, employee_attendence.exit_time, employee_attendence.date, employee_info.emp_name, employee_info.emp_designation, branch_info.name as branch_name');
            $this->db->from('employee_attendence');
            $this->db->join('employee_info','employee_attendence.user_id = employee_info.id', 'left');
            $this->db->join('branch_info','employee_info.branch_id = branch_info.id', 'left');
            $this->db->where('branch_info.id',$branch_id);
            
            if(!empty($employee)){
                $this->db->where('employee_info.id', $employee);
            }

	        if(!empty($from)){
	            $this->db->where('date(employee_attendence.created_at)>=', $from);
	        }

	        if(!empty($to)){
	            $this->db->where('date(employee_attendence.created_at)<=', $to);
	        }

            $query = $this->db->get();
            return $query->result();

        }
        //End searchAttendence

}
//End class Attendence_model