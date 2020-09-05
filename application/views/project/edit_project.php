<?php view('inc.Header'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Member's Form</small>
      </h1>
    </section>

<?php extract(json_decode(json_encode($pdata[0]),true)); ?>

    <!-- Main content -->
    <section class="content">
    <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= $title ?></h3>
          <div class="box-tools pull-right">
          </div>
        </div>
        <div class="box-body"></div><!-- /.box-body -->
            <div class="box-footer">
              <div class="col-md-5">
                <form action="<?php echo base_url('update_project') ?>" method="post" class="form-inline" role="form">
                  <table class="table table-striped">
                    
                    <thead>
                      <tr>
                        <th>কর্মসূচীর নাম</th>
                        <th>PKSF/Non-PKSF</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td>
                          <input type="hidden" name="project_id" value="<?= $id ?>">
                          <input type="text" name="project_name" id="project_name" class="form-control" required value="<?= $project_name ?>" >
                        </td>
                        <td>
                          <input type="radio" name="pksf" id="pksf" value="1" required <?php if($pksf == 1):echo "checked";endif; ?> > PKSF &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <input type="radio" name="pksf" id="pksf" value="2" required <?php if($pksf ==2):echo "checked";endif; ?> > No-PKSF
                        </td>
                      </tr>

                      <tr>
                        <td></td>
                        <td>
                          <button class="btn btn-primary" name="update" id="update" type="submit">update</button>
                        </td>
                      </tr>

                    </tbody>

                  </table>
                </form>
              </div>
              </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php view('inc.Footer'); ?>