<?php view('inc.Header'); ?>

<?php
  if(isset($_POST['search'])):
    extract($_POST);

    // get branch list
    $blist = $this->Somiti_model->branchList( $reg_branch );

    // employee information
    $employeeInfo = $this->Employee_model->fetchEmployee($employee);

  endif;
?>  

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>for <?= (isset($title))? $title : ''; ?></small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><?= (isset($title))? $title : ''; ?> Panel</h3>
              <div class="box-tools pull-right"></div>
            </div>
            <div class="box-body color-black">
              <div class="row">
                <form action="" method="post">
                  <div class="col-md-3">
                    <div class="form-group">
                        <label for="reg_branch">Regional branch <span class="text-red">*</span></label>
                        <select class="form-control" name="reg_branch" id="reg_branch" onchange="getBranchList(this);" required>
                          <option value="">Select regional branch</option>
                          <?php foreach ($regBranchList as $regBranch) {
                          ?>
                         
                          <option value="<?php echo $regBranch->id ?>" <?php if(isset($reg_branch)):if($reg_branch == $regBranch->id):echo "selected";endif;endif; ?> ><?php echo $regBranch->name ?></option>;
                         
                         <?php
                          } ?>
                        </select>
                    </div>
                  </div>
                  
                  <div class="col-md-3">
                    <div class="form-group">
                        <label for="branch">Branch <span class="text-red">*</span></label>
                        <select class="form-control" name="branch" id="branch" onchange="getEmployeeList(reg_branch.value,this.value);" required>
                          <option value="">Select Branch</option>
                          <?php if(isset($reg_branch)):foreach($blist as $bl): ?>
                            <option value="<?= $bl->id ?>" <?php if($branch == $bl->id):echo 'selected';endif; ?> ><?= $bl->name ?></option>
                          <?php endforeach;endif; ?>
                        </select>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                        <label for="employee">Employee <span class="text-red">*</span></label>
                        <select class="form-control" name="employee" id="employee" required>
                          <option value="">Select Employee</option>
                          <?php if(isset($employee)): ?>
                            <option value="<?= $employee ?>" selected ><?= $employeeInfo->emp_name ?></option>
                          <?php endif; ?>
                        </select>
                    </div>
                  </div>
                  
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="search" class="sr-only">search</label>
                      <br/>
                      <input type="submit" class="btn btn-primary" name="search" value="Search" style="margin-top:7px;">
                    </div>
                  </div> 
                
                </form>
              </div>



              <!-- <div class="row"> -->
                <div class="panel panel-default">
                  <div class="panel-body">
                    <table class="table table-borderd">
                      <thead>
                        <tr>
                          <th>SI</th>
                          <th>Somiti name</th>
                          <th>Address</th>
                        </tr>
                      </thead>
                      <tbody>
                       
<?php
  if(isset($_POST['search'])):
    $somitiMember = $this->db->where("emp_id",$employee)->get("somiti_info")->result();

  $si = 0;
  foreach($somitiMember as $smember):
    $si++;
?>

                        <tr>
                          <td><?= $si ?></td>
                          <td><?= $smember->name ?></td>
                          <td><?= $smember->address ?></td>
                        </tr>

<?php endforeach;endif; ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              <!-- </div> -->

            </div>
          </div>
        </section>
      </div>

  <?php view('inc.Footer'); ?>

  <script type="text/javascript">
    function getEmployeeList( reg,branch ){
      $.ajax({
        url:"getEmp",
        data:{reg_branch:reg,branch:branch},
        type:"POST",
         success: function (data) {
          var twoPart = data.split("+");

          var idPart = twoPart[0];
          var namePart = twoPart[1];

          var idValue = idPart.split(",");
          var nameValue = namePart.split(",");

          // reset employee option
          
          document.getElementById("employee").innerHTML = '';
          document.getElementById("employee").innerHTML = '<option value="" >Select Employee</option>';


          for(var i = 0;i < idValue.length;i++){
            document.getElementById("employee").innerHTML += '<option value="'+idValue[i]+'">'+nameValue[i]+'</option>';
          }

        }
      });
    }
  </script>