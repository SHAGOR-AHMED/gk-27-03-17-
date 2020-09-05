<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create New User 
      </h1>
    </section>

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
      
        <div class="col-md-offset-1 col-md-8">
          <div class="panel panel-default">
            <div class="panel-body">
              <table class="table">
                <thead>
                  <tr>
                    <th>SI</th>
                    <th>Username</th>
                    <th>Office Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>


                <?php
                  $si = 0;
                  foreach($userList as $list):
                    $si++;

                    /*get office name*/
                    if($list->branch_id == 786):
                      $office_name = "Head Office";
                    else:
                      $office_name = $this->db->where("id",$list->branch_id)->get("branch_info")->row()->name;
                    endif;
                ?>

                  <tr>
                    <td><?= $si ?></td>
                    <td><?= $list->username ?></td>
                    <td><?= $office_name ?></td>
                    <td>
                      <a href="user/edit_user/<?= $list->id ?>"> Edit </a> | 
                      <a href="user/delete_user/<?= $list->id ?>" onclick="return confirm('Are you sure to delete this user ?')" > Delete </a>
                    </td>
                  </tr>

                <?php endforeach; ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>