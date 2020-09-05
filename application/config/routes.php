<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
//user
$route['login'] = "User/index";
$route['login_attempt'] = 'User/post_login';
$route['logout'] = 'User/logout';
$route['dashboard'] = 'Dashboard/index';
$route['attendence'] = 'User/get_attendence';
$route['attendence_attempt'] = 'User/post_attendence';

// company
$route['company_info_view'] = 'Company/company_info';
$route['edit_company_info'] = 'Company/edit_company_info';
$route['update_company_info'] = 'Company/update_company_info';
$route['get_office_form'] = 'Company/get_office_form';
$route['create_branch_office'] = 'Company/create_branch_office';
$route['search_branch_office'] = 'Company/search_branch_office';
$route['edit/branch_office/(:any)'] = 'Company/edit_branch_office';
$route['update_branch_office'] = 'Company/update_branch_office';

//authorization
$route['authorization'] = 'Authorization/index';
$route['create_role'] = 'Authorization/create_role';
$route['get_extra_roles'] = 'Authorization/get_extra_roles';
$route['remove_role'] = 'Authorization/remove_role';
$route['assign_permission'] = 'Authorization/assign_permission';
$route['getPermissionList'] = 'Authorization/getPermissionList';
$route['remove_permission'] = 'Authorization/remove_permission';

// asset_management
$route['category'] = 'Asset_management/category';
$route['add_asset_category'] = 'Asset_management/add_asset_category';
$route['get_asset_category_list'] = 'Asset_management/get_asset_category_list';
$route['update_asset_category'] = 'Asset_management/update_asset_category';


$route['sub_category'] = 'Asset_management/sub_category';
$route['add_asset_sub_category'] = 'Asset_management/add_asset_sub_category';
$route['get_asset_sub_category_list'] = 'Asset_management/get_asset_sub_category_list';
$route['update_asset_sub_category'] = 'Asset_management/update_asset_sub_category';


$route['location'] = 'Asset_management/location';
$route['add_asset_location'] = 'Asset_management/add_asset_location';
$route['getAssetLocationList'] = 'Asset_management/getAssetLocationList';
$route['update_asset_location'] = 'Asset_management/update_asset_location';

$route['asset_allocation'] = 'Asset_details/asset_allocation';
$route['getSubCatList'] = 'Asset_details/getSubCatList';
$route['create_asset_allocation'] = 'Asset_details/create_asset_allocation';
$route['search_asset'] = 'Asset_details/search_asset';
$route['edit/asset/(:num)'] = 'Asset_details/edit_asset';
$route['update_asset_allocation'] = 'Asset_details/update_asset_allocation';
$route['damaged_asset'] = 'Asset_details/damaged_asset';

// employee
$route['get_employee_form'] = 'Employee/get_employee_form';
$route['create_employee'] = 'Employee/create_employee';
$route['search_employee'] = 'Employee/search_employee';
$route['employee/(:any)'] = 'Employee/view_employee_info';
$route['edit/employee/(:any)'] = 'Employee/edit_employee';
$route['delete/employee/(:any)'] = 'Employee/delete_employee';
$route['update_employee'] = 'Employee/update_employee';
$route['active_deactive_employee/(:any)'] = 'Employee/active_deactive_employee';
$route['set_employee_role'] = 'Employee/set_employee_role';
$route['set_role'] = 'Employee/set_role';

//member
$route['get_member_form'] = "Member/get_member_form";
$route['member_create_step_one'] = "Member/member_create_step_one";
$route['member_create_step_two'] = "Member/member_create_step_two";
$route['member_create_step_three'] = "Member/member_create_step_three";
$route['getUpazillaList'] = "Member/getUpazillaList";
$route['search_members'] = "Member/search_members";
$route['member/(:any)'] = "Member/single_member_info";
$route['edit/member/(:any)'] = "Member/edit_member_info";
$route['delete/member/(:any)'] = "Member/delete_member_info";
$route['member_info_update'] = "Member/member_info_update";
$route['getSomitiList'] = "Member/getSomitiList";

//somiti
$route['get_somiti_form'] = 'Somiti/get_somiti_form';
$route['getBranchList'] = "Somiti/getBranchList";
$route['create_somiti'] = "Somiti/create_somiti";
$route['search_somiti'] = "Somiti/search_somiti";
$route['edit/somiti/(:num)'] = "Somiti/edit_somiti";
$route['delete/somiti/(:num)'] = "Somiti/delete_somiti";
$route['update_somiti'] = "Somiti/update_somiti";
$route['getEmp'] = 'Somiti/getEmp';

//branch
$route['get_branch_form'] = 'Branch/get_branch_form';
$route['create_branch'] = 'Branch/post_branch';
$route['search_branch'] = "Branch/search_branch";
$route['edit/branch/(:num)'] = "Branch/edit_branch";
$route['delete/branch/(:num)'] = "Branch/delete_branch";
$route['update_branch'] = "Branch/update_branch";

//reg. branch
$route['get_reg_branch_form'] = 'Regional_branch/get_reg_branch_form';
$route['create_reg_branch'] = 'Regional_branch/post_reg_branch';
$route['search_regional_branch'] = "Regional_branch/search_regional_branch";
$route['edit/regional_branch/(:num)'] = "Regional_branch/edit_regional_branch";
$route['update_reg_branch'] = "Regional_branch/update_reg_branch";
$route['delete/regional_branch/(:num)'] = "Regional_branch/delete_reg_branch";

//addendence
$route['show_attendence'] = 'Attendence/index';
$route['getEmpoyeeList'] = 'Attendence/getEmpoyeeList';

//savings
$route['savings_installment'] = 'Savings/installment';
$route['getMemberList'] = 'Savings/getMemberList';
$route['create_savings_installment'] = 'Savings/create_installment';
$route['savings_installment/(:any)/(:num)'] = 'Savings/member_installment_info';
$route['search_member_savings_installment'] = 'Savings/search_member_installment';
$route['search_savings_installment'] = 'Savings/search_installment';
$route['savings_interest'] = 'Savings/savings_interest';

//loan
$route['loan_sanction'] = 'Loan/loan_sanction';
$route['get_loan_serial'] = 'Loan/get_loan_serial';
$route['get_member_loan_info'] = 'Loan/get_member_loan_info';
$route['create_loan'] = 'Loan/create_loan';
$route['loan_installment'] = 'Loan/installment';
$route['get_member_loan_serial'] = 'Loan/get_member_loan_serial';
$route['create_loan_installment'] = 'Loan/create_loan_installment';
$route['loan_details'] = 'Loan/loan_details';
$route['get_member_all_loan_serial'] = 'Loan/get_member_all_loan_serial';

//Accounts
$route['chart_of_accounts'] = 'Accounts/chart_of_accounts';
$route['create_head'] = 'Accounts/create_head';
$route['getHeads'] = 'Accounts/getHeads';
$route['update_head'] = 'Accounts/update_head';
$route['create_sub_head'] = 'Accounts/create_sub_head';
$route['getSubHeads'] = 'Accounts/getSubHeads';
$route['getSubHeadsDropdown'] = 'Accounts/getSubHeadsDropdown';
$route['create_tran_head'] = 'Accounts/create_tran_head';
$route['getTranHeads'] = 'Accounts/getTranHeads';

$route['accounts_opening'] = 'Accounts/opening';
$route['accounts_opening_show'] = 'Accounts/opening_show';
$route['opening_create'] = 'Accounts/opening_create';
$route['voucher'] = 'Accounts/voucher';
$route['voucher_create'] = 'Accounts/voucher_create';
$route['search_voucher'] = 'Accounts/search_voucher';
$route['voucher/(:any)'] = "Accounts/voucher_info/$1";
$route['edit/voucher/(:any)'] = "Accounts/voucher_edit/$1";
$route['delete/voucher/(:any)'] = "Accounts/voucher_delete/$1";

//REPORTS ACCOUNTS
$route['voucher_print/(:any)'] = 'Accounts/voucher_info/$1/P';
$route['balance_sheet'] = 'Accounts/balance_sheet';
$route['balance_sheet_report'] = 'Accounts/balance_sheet_report';

$route['pksf_balance_sheet'] = 'Accounts/pksf_balance_sheet';
$route['pksf_balance_sheet_report'] = 'Accounts/pksf_balance_sheet_report';

$route['non_pksf_balance_sheet'] = 'Accounts/non_pksf_balance_sheet';
$route['non_pksf_balance_sheet_report'] = 'Accounts/non_pksf_balance_sheet_report';

$route['total_balance_sheet'] = 'Accounts/total_balance_sheet';
$route['total_balance_sheet_report'] = 'Accounts/main_balance_sheet_report';

$route['income_statement'] = 'Accounts/income_statement';
$route['income_statement_report'] = 'Accounts/income_statement_report';
$route['cash_flow'] = 'Accounts/cash_flow';
$route['cash_flow_report'] = 'Accounts/cash_flow_report';
$route['trial_balance'] = 'Accounts/trial_balance';
$route['trial_balance_report'] = 'Accounts/trial_balance_report';
$route['tran_ledger'] = 'Accounts/tran_ledger';
$route['tran_ledger_report'] = 'Accounts/tran_ledger_report';
$route['voucher_report'] = 'Accounts/voucher_report';
$route['voucher_report_view'] = 'Accounts/voucher_report_view';


// mis reports start
$route['pomis1'] = 'Mis_panel/mis_somiti_member';
$route['pomis2'] = 'Mis_panel/mis_pomis2';
$route['pomis2a'] = 'Mis_panel/mis_pomis2A';
$route['pomis3'] = 'Mis_panel/mis_pomis3';
$route['pomis5_part1'] = 'Mis_panel/mis_pomis5_part1';
$route['pomis5_part2'] = 'Mis_panel/mis_pomis5_part2';
$route['pomis5a'] = 'Mis_panel/mis_pomis5a';
$route['pomis5b'] = 'Mis_panel/mis_pomis5b';
$route['employee_list'] = 'Mis_panel/employeeList';
// mis reports end

// loan and collection
$route['loan_history'] = 'loan_saving_form/loan_information';
$route['loan_collection'] = 'loan_saving_form/loan_collection';
$route['saving_information'] = 'loan_saving_form/saving_information';
// loan and collection

// user section start
$route['create_user'] = 'user/create_user';
$route['user_report'] = 'user/user_report';
// user section end

//============================================******************************===============================================
//reports- savings
$route['installment_report'] = 'Savings/installment_report';
$route['installment_report_by_date'] = 'Savings/installment_report_by_date';
$route['savings_interest_report_by_date'] = 'Savings/savings_interest_report_by_date';
//reports- loans
$route['loan_installment_report'] = 'Loan/loan_installment_report';
//reports-
$route['member_kyc_form/(:any)'] = 'Member/member_kyc_form_report';

//demo
$route['demo'] = 'Dashboard/demo';

// project management section
$route['new_project'] = 'ProjectManagement/add_project';
$route['projectUpdate/(:num)/(:num)'] = 'ProjectManagement/project_status_update';
$route['save_project'] = 'ProjectManagement/project_insert';
$route['projectEdit/(:num)'] = 'ProjectManagement/project_edit';
$route['update_project'] = 'ProjectManagement/project_update';
