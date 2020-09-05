<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create New User 
      </h1>
    </section>

    <script type="text/javascript">
      function checkUserType(utype){
        if(utype == 1){
          document.getElementById("reg_branch").disabled = true;
          document.getElementById("branch").disabled = true;
        }else{
          document.getElementById("reg_branch").disabled = false;
          document.getElementById("branch").disabled = false;
        }
      }
    </script>

    <!-- Main content -->
    <section class="content">
      <div class="row">

      <?php if($this->session->flashdata("msg") != ''): ?>

        <div class="col-md-offset-1 col-md-8">
          <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?= $this->session->flashdata("msg") ?>
          </div>
        </div>

      <?php endif; ?>

        <div class="panel panel-default col-md-offset-1 col-md-8">
          <div class="panel-body">
            <form class="form-vertical" role="form" action="user/save_user" method="post">
                
                <div class="form-group">
                  <label for="userType">User Type <span class="text-red">*</span></label>
                  <select id="userType" name="userType" class="form-control" required onchange="checkUserType(this.value)" >
                    <option value="">Select</option>
                    <option value="1">Head Office</option>
                    <option value="2">Branch Office</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="reg_branch">Regional branch <span class="text-red">*</span></label>
                  <select class="form-control" name="reg_branch" id="reg_branch" onchange="getBranchList(this);" required>
                    <option value="">Select regional branch</option>
                    <?php foreach ($regBranchList as $reg_branch) {
                      echo '<option value="'. $reg_branch->id .'">'.$reg_branch->name.'</option>';
                    } ?>
                  </select>
                </div>
              
                <div class="form-group">
                  <label for="branch">Branch <span class="text-red">*</span></label>
                  <select class="form-control" name="branch" id="branch" required>
                    <option value="">Select Branch</option>
                  </select>
                </div>  

                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" name="username" id="username" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" id="password" class="form-control" minlength="5"  required>
                </div>

                <button class="btn btn-success" type="submit" name="create">Create</button>

            </form>
          </div>
        </div>
        
      </div>
    </section>
  </div>