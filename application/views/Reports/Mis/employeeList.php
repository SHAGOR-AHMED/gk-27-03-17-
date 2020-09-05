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
	table tr td{
		text-align: center !important;
		border-color: 1px solid #000 !important;
	}

	table table tr td{
		border-color: 1px solid #000 !important;
	}

  @media print {
  body * {
    visibility: hidden;
  }

  #prntBtn {
    visibility: hidden;
  }

  .box-body, .box-body * {
    visibility: visible;
  }
}

</style>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"><?= (isset($title))? $title : ''; ?></h3>
          <div class="box-tools pull-right">
          </div>
        </div>
        
<!-- employee query start here -->
<?php
  // head office employee
  $headCond = array(
      "reg_branch_id" => 0,
      "branch_id"     => 0
    );
  $head_emp = $this->db->order_by("id","DESC")->where($headCond)->get("employee_info")->result();

  // regional offficeer
  $regionCond = array(
      "reg_branch_id != " => 0,
      "branch_id"         => 0 
    );
  $region_emp = $this->db->order_by("id","DESC")->where($regionCond)->get("employee_info")->result();

  // branch officer
  $branchCond = array(
      "reg_branch_id != " => 0,
      "branch_id !="      => 0
    );

  $branch_emp = $this->db->order_by("id","DESC")->where($branchCond)->get("employee_info")->result();

  // filed worker
  $fieldCond = array(
      "reg_branch_id != " => 0,
      "branch_id !="      => 0,
      "field_id !="       => 0
    );

  $field_emp = $this->db->order_by("id","DESC")->where($fieldCond)->get("employee_info")->result();

?>
<!-- employee query end here -->

        <div class="box-body">
          <table class="table">
            <thead>
              <tr>
                <th>SI</th>
                <th>Employee Name
                  <button class="btn btn-primary" id="prntBtn" style="float:right;" onclick="window.print()" >print</button>
                </th>
              </tr>
            </thead>
        
            <tbody>
              <!-- head office employee -->
              <tr class="active">
                <th colspan="2">Head Office Employee</th>
                <th>Designation</th>
              </tr>

              <?php
                $h = 0;
                foreach($head_emp as $hemp):
                  $h++;
              ?>

              <tr>
                <td><?= $h ?></td>
                <td style="text-align: left !important;"><?= $hemp->emp_name ?></td>
                <td style="text-align: left !important;"><?= $hemp->emp_designation ?></td>
              </tr>

            <?php endforeach; ?>

<!-- regional branch employee -->
			<tr class="active">
                <th colspan="2">Regional Officer</th>
				 <th>Designation</th>
             </tr>

              <?php
                $r = 0;
                foreach($region_emp as $remp):
                  $r++;
              ?>

              <tr>
                <td><?= $r ?></td>
                <td style="text-align: left !important;"><?= $remp->emp_name ?></td>
				<td style="text-align: left !important;"><?= $remp->emp_designation ?></td>
              </tr>

            <?php endforeach; ?>

<!--  branch employee -->
            <tr class="active">
                <th colspan="2">Branch Officer</th>
				 <th>Designation</th>
              </tr>

              <?php
                $b = 0;
                foreach($branch_emp as $bemp):
                  $b++;
              ?>

              <tr>
                <td><?= $b ?></td>
                <td style="text-align: left !important;"><?= $bemp->emp_name ?></td>
				<td style="text-align: left !important;"><?= $bemp->emp_designation ?></td>
              </tr>

            <?php endforeach; ?>

<!--  field worker -->
            <tr class="active">
                <th colspan="2">Field Worker</th>
				 <th>Designation</th>
              </tr>

              <?php
                $f = 0;
                foreach($field_emp as $femp):
                  $f++;
              ?>

              <tr>
                <td><?= $f ?></td>
                <td style="text-align: left !important;"><?= $femp->emp_name ?></td>
				<td style="text-align: left !important;"><?= $femp->emp_designation ?></td>
              </tr>

            <?php endforeach; ?>

            </tbody>

          </table>
        </div>
        
        <div class="box-footer">
          <div class="form-group">
            <span>
                <?php if (hasFlash('msg')) {?>
                    <span><?= flashMessage('msg')  ?></span>
                <?php } ?>
            </span>
          </div>
        </div><!-- /.box-footer-->
      </div><!-- /.box -->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

<?php view('inc.Footer'); ?>

