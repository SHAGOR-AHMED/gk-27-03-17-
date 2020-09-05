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

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Organization and Member information</h3>
              <div class="box-tools pull-right">
              </div>
            </div>
            <div class="box-body">
                <!-- ======================================first step================================================ -->
                <?php view('Member._form_create.Step_one_form'); ?>
                <!-- ======================================================second step======================================= -->
                <?php view('Member._form_create.Step_two_form'); ?>
                <!-- ======================================================second step======================================= -->
                <?php view('Member._form_create.Step_three_form'); ?>                
            </div><!-- /.box-body -->
            <div class="box-footer">
              <div class="form-group">
                <span>
                  <p id="message" class="pull-right"></p>
                </span> 
              </div>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php view('inc.Footer'); ?>