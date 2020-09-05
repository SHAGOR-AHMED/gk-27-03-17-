
      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <?php if(hasPermission('company_info') || hasPermission('company_info_edit')): ?>
            <li class="treeview">
              <a href="javascript:">
                <i class="fa fa-building"></i> <span>GK Panel</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?=  base_url('company_info_view'); ?>"><i class="fa fa-eye"></i>GK Info</a></li>
              </ul>
            </li>
            <?php endif; ?>

            <?php if(hasPermission('authorization')): ?>
            <li>
              <a href="<?= base_url('authorization'); ?>">
                <i class="fa fa-lock"></i> <span>Authorization</span> <i class="fa fa-angle-right pull-right"></i>
              </a>
            </li>
            <?php endif; ?>

            <?php if(hasPermission('asset_category') || hasPermission('asset_sub_category') || hasPermission('asset_location') || hasPermission('asset_allocation') || hasPermission('search_asset') || hasPermission('search_damaged_asset')): ?>
            <li class="treeview">
              <a href="javascript:">
                <i class="fa fa-industry"></i> <span>Asset Management</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <?php if(hasPermission('asset_category')): ?>
                  <li><a href="<?=  base_url('category'); ?>"><i class="fa fa-wrench"></i>Asset category</a></li>
                <?php endif; ?>
                <?php if(hasPermission('asset_sub_category')): ?>
                  <li><a href="<?=  base_url('sub_category'); ?>"><i class="fa fa-cog"></i>Asset sub-category</a></li>
                <?php endif; ?>
                <?php if(hasPermission('asset_location')): ?>
                  <li><a href="<?=  base_url('location'); ?>"><i class="fa fa-cogs"></i>Asset location</a></li>
                <?php endif; ?>
                <?php if(hasPermission('asset_allocation')): ?>
                  <li><a href="<?=  base_url('asset_allocation'); ?>"><i class="fa fa-map-marker"></i>Asset allocation</a></li>
                <?php endif; ?>
                <?php if(hasPermission('search_asset')): ?>
                  <li><a href="<?=  base_url('search_asset'); ?>"><i class="fa fa-search"></i>Search asset</a></li>
                <?php endif; ?>
                <?php if(hasPermission('search_damaged_asset')): ?>
                  <li><a href="<?=  base_url('damaged_asset'); ?>"><i class="fa fa-search-minus"></i>Damaged asset</a></li>
                <?php endif; ?>
              </ul>
            </li>
            <?php endif; ?>

            <?php if(hasPermission('add_employee') || hasPermission('edit_employee') || hasPermission('search_employee') || hasPermission('view_attendance')): ?>
            <li class="treeview">
              <a href="javascript:">
                <i class="fa fa-user"></i> <span>Employee Panel</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <?php if(hasPermission('add_employee')): ?>
                  <li><a href="<?=  base_url('get_employee_form'); ?>"><i class="fa fa-user-plus"></i>Add employee</a></li>
                <?php endif; ?>
                <?php if(hasPermission('search_employee')): ?>
                  <li><a href="<?=  base_url('search_employee'); ?>"><i class="fa fa-search"></i>Search employee</a></li>
                <?php endif; ?>
                <?php if(hasPermission('view_attendance')): ?>
                  <li><a href="<?=  base_url('show_attendence'); ?>"><i class="fa fa-search"></i>Employee Attendence</a></li>
                <?php endif; ?>
                <?php if(hasPermission('set_employee_role')): ?>
                  <li><a href="<?=  base_url('set_employee_role'); ?>"><i class="fa fa-plus"></i>Set Employee Role</a></li>
                <?php endif; ?>
              </ul>
            </li>
            <?php endif; ?>

            <?php if(hasPermission('add_regional_branch') || hasPermission('edit_regional_branch') || hasPermission('search_regional_branch')): ?>
            <li class="treeview">
              <a href="javascript:">
                <i class="fa fa-building"></i> <span>Regional Branch</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <?php if(hasPermission('add_regional_branch')): ?>
                  <li><a href="<?=  base_url('get_reg_branch_form'); ?>"><i class="fa fa-plus"></i> Add regional branch </a></li>
                <?php endif; ?>
                <?php if(hasPermission('search_regional_branch')): ?>
                  <li><a href="<?=  base_url('search_regional_branch'); ?>"><i class="fa fa-search"></i> Search regional branch</a></li>
                <?php endif; ?>
              </ul>
            </li>
            <?php endif; ?>

            <?php if(hasPermission('add_branch') || hasPermission('edit_branch') || hasPermission('search_branch')): ?>
            <li class="treeview">
              <a href="javascript:">
                <i class="fa fa-building-o"></i> <span>Branch Panel</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <?php if(hasPermission('add_branch')): ?>
                  <li><a href="<?=  base_url('get_branch_form'); ?>"><i class="fa fa-plus"></i> Add branch </a></li>
                <?php endif; ?>
                <?php if(hasPermission('search_branch')): ?>
                  <li><a href="<?=  base_url('search_branch'); ?>"><i class="fa fa-search"></i> Search branch</a></li>
                <?php endif; ?>
              </ul>
            </li>
            <?php endif; ?>

            <?php if(hasPermission('add_somiti') || hasPermission('edit_somiti') || hasPermission('search_somiti')): ?>
            <li class="treeview">
              <a href="javascript:">
                <i class="fa fa-home"></i> <span>Somiti Panel</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <?php if(hasPermission('add_somiti')): ?>
                  <li><a href="<?=  base_url('get_somiti_form'); ?>"><i class="fa fa-plus"></i> Add somiti </a></li>
                <?php endif; ?>
                <?php if(hasPermission('search_somiti')): ?>
                  <li><a href="<?=  base_url('search_somiti'); ?>"><i class="fa fa-search"></i> Search somiti</a></li>
                <?php endif; ?>
              </ul>
            </li>
            <?php endif; ?>

            <?php if(hasPermission('add_member') || hasPermission('search_member')): ?>
            <li class="treeview">
              <a href="javascript:">
                <i class="fa fa-users"></i> <span>Member's Panel</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              
                <?php if(hasPermission('add_member')): ?>
                <li><a href="<?=  base_url('get_member_form'); ?>"><i class="fa fa-user-plus"></i> Add member </a></li>
                <?php endif; ?>

                <?php if(hasPermission('search_member')): ?>
                <li><a href="<?=  base_url('search_members'); ?>"><i class="fa fa-search"></i> Search member</a></li>
                <?php endif; ?>
              
                <!-- somiti member info start -->
                <li><a href="<?=  base_url('somiti/somiti_member'); ?>"><i class="fa fa-search"></i> Somiti member</a></li>
                <!-- somiti member info end -->

              </ul>
            </li>
            <?php endif; ?>

            <!-- project management section start -->
            
            <li class="treeview">
              <a href="javascript:">
                <i class="fa fa-users"></i> <span>Project management</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                
                <li><a href="<?=  base_url('new_project'); ?>"><i class="fa fa-user-plus"></i> Add New project </a></li>
                
              </ul>
            </li>
            
            <!-- project management section end -->

           <?php if(hasPermission('savings_installment') || hasPermission('member_installment_info') || hasPermission('search_installment_info') || hasPermission('savings_interest')): ?>
            <li class="treeview">
              <a href="javascript:">
                <i class ="fa fa-money"></i> <span>Savings Panel</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                
                <li>
                  <a href="<?=  base_url('/saving_information'); ?>"><i class="fa fa-bar-chart"></i>Saving Information</a>
                </li>

                <li>
                  <a href="<?=  base_url('loan_saving_form/saving_opening'); ?>"><i class="fa fa-bar-chart"></i>Savings Opening</a>
                </li>

                <!-- <?php if(hasPermission('savings_installment')): ?>
                  <li><a href="<?=  base_url('savings_installment'); ?>"><i class="fa fa-bar-chart"></i>Savings Installment </a></li>
                <?php endif; ?>
                <?php if(hasPermission('member_installment_info')): ?>
                  <li><a href="<?=  base_url('search_member_savings_installment'); ?>"><i class="fa fa-search"></i> Member Installment info</a></li>
                <?php endif; ?>
                <?php if(hasPermission('search_installment_info')): ?>
                  <li><a href="<?=  base_url('search_savings_installment'); ?>"><i class="fa fa-search"></i> Search Installment info</a></li>
                <?php endif; ?>
                <?php if(hasPermission('savings_interest')): ?>
                  <li><a href="<?=  base_url('savings_interest'); ?>"><i class="fa fa-search"></i> Savings Interest</a></li>
                <?php endif; ?> -->

              </ul>
            </li>
            <?php endif; ?>

            <?php if(hasPermission('loan_sanction') || hasPermission('loan_installment') || hasPermission('search_loan_installment')): ?>
            <li class="treeview">
              <a href="javascript:">
                <i class="fa fa-money"></i> <span>Loan Panel</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              
                <?php if(hasPermission('loan_sanction')): ?>
                  <li><a href="<?=  base_url('/loan_sanction'); ?>"><i class="fa fa-bar-chart"></i>Loan sanction</a></li>
                <?php endif; ?>

                <li>
                  <a href="<?=  base_url('/loan_history'); ?>"><i class="fa fa-bar-chart"></i>Loan Information</a>
                </li>
                
                <li>
                  <a href="<?=  base_url('/loan_collection'); ?>"><i class="fa fa-bar-chart"></i>Loan Collection</a>
                </li>
                
              <!--   <?php if(hasPermission('loan_installment')): ?>
                  <li><a href="<?=  base_url('/loan_installment'); ?>"><i class="fa fa-search"></i> Loan Installment</a></li>
                <?php endif; ?>
                
                <?php if(hasPermission('search_loan_installment')): ?>
                  <li><a href="<?=  base_url('/loan_details'); ?>"><i class="fa fa-search"></i> Search loan installment</a></li>
                <?php endif; ?> -->
              
              </ul>
            </li>
            <?php endif; ?>

            <!-- head office panel start -->
            <?php if(hasPermission('headoffice') ): ?>
            <li class="treeview">
              <a href="javascript:">
                <i class="fa fa-money"></i> <span>Head Office Accounts</span> <i class="fa fa-angle-left pull-right"></i>
              </a>

              <ul class="treeview-menu">
                <li><a href="<?=  base_url('/pksf_balance_sheet'); ?>"><i class="fa fa-bar-chart"></i>PKSF Balance Sheet</a></li>
                <li><a href="<?=  base_url('/non_pksf_balance_sheet'); ?>"><i class="fa fa-bar-chart"></i>NON-PKSF Balance Sheet</a></li>
                <li><a href="<?=  base_url('/total_balance_sheet'); ?>"><i class="fa fa-bar-chart"></i>Main Balance Sheet</a></li>
              </ul>
            
            </li>

          <?php endif; ?>
          <!-- end of head office account -->

            <li class="treeview">
              <a href="javascript:">
                <i class="fa fa-money"></i> <span>Accounts Panel</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li><a href="<?=  base_url('/chart_of_accounts'); ?>"><i class="fa fa-bar-chart"></i>Chart of Accounts</a></li>
                  <li><a href="<?=  base_url('/voucher'); ?>"><i class="fa fa-bar-chart"></i>Add Voucher</a></li>
                  <li><a href="<?=  base_url('/search_voucher'); ?>"><i class="fa fa-bar-chart"></i>Search Voucher</a></li>
                  <li><a href="<?=  base_url('/accounts_opening'); ?>"><i class="fa fa-bar-chart"></i>Opening Balance</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="javascript:">
                <i class="fa fa-money"></i> <span>Accounts Report</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li><a href="<?=  base_url('/balance_sheet'); ?>"><i class="fa fa-bar-chart"></i>Balance Sheet</a></li>
                  <li><a href="<?=  base_url('/income_statement'); ?>"><i class="fa fa-bar-chart"></i>Income Expanse</a></li>
                  <li><a href="<?=  base_url('/cash_flow'); ?>"><i class="fa fa-bar-chart"></i>Cash Flow</a></li>
                  <li><a href="<?=  base_url('/trial_balance'); ?>"><i class="fa fa-bar-chart"></i>Trial Balance</a></li>                  
                  <li><a href="<?=  base_url('/tran_ledger'); ?>"><i class="fa fa-bar-chart"></i>Transaction Ledger</a></li> 
                  <li><a href="<?=  base_url('/voucher_report'); ?>"><i class="fa fa-bar-chart"></i>Voucher Report</a></li>                  
              </ul>
            </li>

            <!-- mis panel menu start -->
            <li class="treeview">
              <a href="javascript:">
                <i class="fa fa-money"></i> <span>MIS Report</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  
                  <li><a href="<?=  base_url('/pomis1'); ?>"><i class="fa fa-bar-chart"></i>POMIS-1</a></li>
                  
                  <li><a href="<?=  base_url('/pomis2'); ?>"><i class="fa fa-bar-chart"></i>POMIS-2</a></li>
              
                  <li><a href="<?=  base_url('/pomis2a'); ?>"><i class="fa fa-bar-chart"></i>POMIS-2A</a></li>

                  <li><a href="<?= base_url('/pomis3'); ?>"><i class="fa fa-bar-chart"></i>POMIS-3</a></li>

                  <li><a href="javascript:void(0);"><i class="fa fa-bar-chart"></i>POMIS-4</a></li>

                  <li><a href="<?= base_url('/pomis5_part1'); ?>"><i class="fa fa-bar-chart"></i>POMIS-5 Part 1</a></li>
				  
                  <li><a href="<?= base_url('/pomis5_part2'); ?>"><i class="fa fa-bar-chart"></i>POMIS-5 Part 2</a></li>
                  
                  <li><a href="<?= base_url('/pomis5a'); ?>"><i class="fa fa-bar-chart"></i>POMIS-5.A</a></li>

                  <li><a href="<?= base_url('/pomis5b'); ?>"><i class="fa fa-bar-chart"></i>POMIS-5.B</a></li>

                  <li><a href="<?= base_url('/employee_list'); ?>"><i class="fa fa-bar-chart"></i>All Employee List</a></li>
              
              </ul>

            <?php if(hasPermission('user') ): ?>
            <li class="treeview">
              <a href="javascript:">
                <i class="fa fa-money"></i> <span>User</span> <i class="fa fa-angle-left pull-right"></i>
              </a>

              <ul class="treeview-menu">
                <li><a href="<?=  base_url('/create_user'); ?>"><i class="fa fa-bar-chart"></i>Create User</a></li>
                <li><a href="<?=  base_url('/user_report'); ?>"><i class="fa fa-bar-chart"></i>User Report</a></li>
              </ul>
            
            </li>

          <?php endif; ?>

            </li>
            <!-- mis panel menu end -->
			
			<!-- saving_collection_form start -->
            <!-- <li class="treeview">
              <a href="javascript:">
                <i class="fa fa-money"></i> <span> Loan Saving & Collection </span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  
                  
                  
              
              </ul>
            </li> -->
            <!-- saving_collection_form end -->

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
