<?php

//Start class Savings_model
class Savings_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();

    }

    //Start single_member_installment_info
    public function single_member_installment_info($savings_classification, $member_id){
    	$this->db->select('savings_installment.*, employee_info.emp_name as employee_name');
    	$this->db->from('savings_installment');
    	$this->db->join('employee_info', 'savings_installment.received_by = employee_info.id', 'left');
    	$this->db->where('savings_installment.classification', $savings_classification);
    	$this->db->where('savings_installment.member_id', $member_id);
    	$query = $this->db->get();
    	return $query->result();
    }
    //End single_member_installment_info

    //Start search_installment_info
    public function search_installment_info($reg_barnch, $branch, $somiti, $installment_date){
        $this->db->select('savings_installment.*, employee_info.emp_name as employee_name, member_info.name as member_name');
        $this->db->from('savings_installment');
        $this->db->join('employee_info', 'savings_installment.received_by = employee_info.id', 'left');
        $this->db->join('member_info', 'savings_installment.member_id = member_info.user_id', 'left');
        $this->db->where('savings_installment.reg_branch_id', $reg_barnch);
        $this->db->where('savings_installment.branch_id', $branch);
        $this->db->where('savings_installment.somiti_id', $somiti);
        $this->db->where('savings_installment.installment_date', $installment_date);
        $query = $this->db->get();
        return $query->result();
    }
    //End search_installment_info

    public function get_savings_interest($somiti, $first_date, $second_date){
        $query = "select final_result.*, member_info.name, member_info.joining_date from(

                                SELECT * FROM savings_installment WHERE id IN ( SELECT MAX(id) FROM savings_installment WHERE installment_date <= '$first_date' GROUP BY member_id )
                                 UNION ALL

                                SELECT * FROM savings_installment WHERE id IN ( SELECT MAX(id) FROM savings_installment WHERE (installment_date BETWEEN '$first_date' AND '$second_date') GROUP BY member_id )

                                ) as final_result
                                Join member_info ON member_info.user_id = final_result.member_id
                                WHERE final_result.somiti_id = $somiti";
        $result = $this->db->query($query);
        $data_set = $result->result();

        // binding data
        $data = [];
        foreach ($data_set as $first_installment) {
            $c_arr['member_id'] = $first_installment->member_id;
            $c_arr['name'] = $first_installment->name;
            $c_arr['joining_date'] = $first_installment->joining_date;
            $c_arr['first_balance'] = $first_installment->balance;
            foreach ($data_set as $second_installment) {
                if($first_installment->member_id == $second_installment->member_id){
                    $c_arr['second_balance'] = $second_installment->balance;
                }
            }
            array_push($data, $c_arr);
        }

        $userdupe=array();
        foreach ($data as $index=>$t) {
            if (isset($userdupe[$t["member_id"]])) {
                unset($data[$index]);
                continue;
            }
            $userdupe[$t["member_id"]]=true;
        }
        return $data;
    }

}
//End class Savings_model

?>
