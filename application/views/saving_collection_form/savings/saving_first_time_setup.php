<?php view('inc.Header'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>for <?= (isset($title))? $title : ''; ?></small>
      </h1>
    </section>

<style type="text/css">
	

	@media print {
  body * {
    visibility: hidden;
  }

  #prntBtn,#update{
    visibility: hidden;
  }

  .box-header, .box-header * ,.box-body, .box-body * {
    visibility: visible;
  }

  .box-header, .box-header *{
  	font-size : 13px;
  }

  .box-header table{
  	margin-left: -1600px;
  }

  .content{
  	margin-top: -4300px;
  }

  #heading-bar{
  	display: block;
  	visibility: visible;
  }

  @page {size: landscape}

}

</style>

<?php 
	if($this->session->flashdata("msg") != ''):
?>

<section>
	<div class="row">
		<div class="col-md-offset-2 col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<?= $this->session->flashdata("msg") ?>
				</div>
			</div>
		</div>
</section>

<?php endif; ?>

    <!-- Main content -->
    <section class="content">
    	<div class="panel-body">
      			<div class="row">
                	<form action="" method="post" role="form" class="form-inline">
	                  
	                  <div class="form-group col-sm-offset-1">
	                      <label for="reg_branch_name">Regional Branch Name <span class="text-red">*</span></label>
	                      <select class="form-control" name="reg_branch_name" id="reg_branch_name" onchange="getBranchList(this);" required>
	                        <option value="">Select Branch Name</option>
	                        <?php if(!empty($regBranchList)){ foreach ($regBranchList as $reg_branch) { ?>
	                          <option value="<?= $reg_branch->id; ?>"><?= $reg_branch->name; ?></option>
	                        <?php } } ?>
	                      </select>
	                  </div>

	                  <div class="form-group">
	                      <label for="branch">Branch <span class="text-red">*</span></label>
	                      <select class="form-control" name="branch" id="branch" onchange="getSomitiList(this);" required>
	                        <option value="">Select Branch</option>
	                      </select>
	                  </div>

	                  <div class="form-group">
	                      <label for="somiti">Somiti <span class="text-red">*</span></label>
	                      <select class="form-control" name="somiti" id="somiti" onchange="getMemberList(this);" required>
	                        <option value="">Select Somiti</option>
	                      </select>
	                  </div>

	                  <div class="form-group">
	                  	<button type="submit" name="search" id="search" class="btn btn-primary">Search</button>
	                  </div>

	                  <div class="form-group">
	                  	<button type="button" class="btn btn-info" id="prntBtn" style="margin-left: 100px;" onclick="window.print();" >Print</button>
	                  </div>

      			</form>
      		</div>
      	</div>
      <?php
		if(isset($_POST['search'])):
			extract($_POST);

			$somiti_info = $this->db->query("SELECT si.name,ei.emp_name FROM `somiti_info` si,employee_info ei WHERE si.emp_id = ei.id AND si.id = $somiti")->row();
			// print_r($somiti_info);
			$member_list = $this->db->where("somiti",$somiti)->get("member_info")->result();
		endif;
	?>

	      <!-- Default box -->
	      <div class="box box-info">
	        <div class="box-header with-border">
	          <h3 class="box-title">
	          	<div class="panel panel-default" style="margin: 0px !important;padding: 0px !important;margin-left: 300px !important;">
	          		<div class="panel-body" style="margin: 0px !important;padding: 0px !important;">
	          			<table class="table" style="margin: 0px !important;padding: 0px !important;">
	          				<tr>
	          					<td> শাখার নামঃ </td>
	          					<td colspan="3"> গণস্ব্যাস্থ কেন্দ্র </td>
	          					<td> সমিতির নামঃ </td>
	          					<td colspan="3"><?php if(isset($somiti_info->name)):echo $somiti_info->name;endif; ?></td>
	          				</tr>

	          				<tr>
	          					<td> কর্মীর নামঃ </td>
	          					<td colspan="3"><?php if(isset($somiti_info->emp_name)):echo $somiti_info->emp_name;endif; ?></td>
	          					<td>মাসের নামঃ</td>
	          					<td><?= date("M") ?></td>
	          					<td>সালঃ</td>
	          					<td><?= date("Y") ?></td>
	          				</tr>
	          			</table>
	          		</div>
	          	</div>
	          </h3>
	          <div class="box-tools pull-right"></div>
	        </div>

	        <div class="box-body">
	        	<table class="table">
	        		<thead>
	        			<tr>
		        			<th>SI</th>
		        			<th>Member ID</th>
		        			<th>Member Name</th>
		        			<th>Month</th>
		        			<th>Week</th>
		        			<th>Amount</th>
		        			<th>Payment Date</th>
	        			</tr>
	        		</thead>
	        		
<?php
	if(isset($_POST['search'])):
?>
				<form action="opening_savings_update" class="form-inline" role="form" method="post">
	        		<tbody>

	        	<?php
	        		$si = 0;
	        		foreach($member_list as $mlist):
	        			$si++;

	        			$prev_info = $this->db->where("member_id",$mlist->user_id)->get("saving_log")->row();

	        	?>

	        			<tr>
	        				<td><?= $si ?></td>
	        				<td>
	        					<?= $mlist->user_id ?>
	        					<input type="hidden" name="mem_id[]" value="<?= $mlist->user_id ?>" >
	        				</td>
	        				<td><?= $mlist->name ?></td>
	        				<td>
	        					<select class="form-control" name="month[]">
	        						<option value="">Select</option>
	        						<?php for($i=1;$i<=12;$i++): ?>
	        							<option value="<?= $i ?>" <?php if(isset($prev_info->payment_month)):if($i == $prev_info->payment_month):echo "selected";endif;endif; ?> ><?= $i ?></option>
	        						<?php endfor; ?>
	        					</select>
	        				</td>
	        				<td>
	        					<select class="form-control" name="week[]">
	        						<option value="">Select</option>
	        						<?php for($i=1;$i<=5;$i++): ?>
	        							<option value="<?= $i ?>" <?php if(isset($prev_info->week_no)):if($i == $prev_info->week_no):echo "selected";endif;endif; ?> ><?= $i ?></option>
	        						<?php endfor; ?>
	        					</select>
	        				</td>
	        				<td>
	        					<input type="number" name="amount[]" class="form-control" value="<?php if(isset($prev_info->amount)):echo $prev_info->amount;endif; ?>" >
	        				</td>

	        				
	        				<td>
	        					<input type="text"  name="payment_date[]" class="form-control datepicker" placeholder="dd/mm/yyyy" value="<?php if(isset($prev_info->pay_date)):$d = explode(" ",$prev_info->pay_date);echo $d[0];endif; ?>" >
	        				</td>
	        			</tr>

	        	<?php
	        		endforeach;
	        	?>

	        		</tbody>

	        		<tfoot>
	        			<tr>
	        				<td colspan="5"></td>
	        				<td>
	        					<button class="btn btn-primary btn-lg" type="submit" name="save">Save</button>
	        				</td>
	        			</tr>
	        		</tfoot>

	        	<?php
	        		endif;
	        	?>

	        	</table>
	        </div>

	        </div>
	       </section>
	      </div>

	      <?php view('inc.Footer'); ?>
