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

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"><?= (isset($title))? $title : ''; ?></h3>
          <div class="box-tools pull-right">
          </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-3">
                    <form action="" method="post" id="frm_create_head">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="create_head_name">Head name <span class="text-red">*</span></label>
                                    <input type="text" name="head_name" id="create_head_name" class="form-control"  placeholder="Enter head name" required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <input type="submit" name="submit" value="Save" class="btn btn-primary btn-sm" style="margin-top: 26px;">
                            </div>
                        </div>
                    </form>

                    <form action="" method="post" id="frm_update_head" style="display:none;">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="update_head_name">Head name <span class="text-red">*</span></label>
                                    <input type="text" name="head_name" id="update_head_name" class="form-control" placeholder="Enter head name" required>
                                    <input type="hidden" value="" id="head_id" name="head_id">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="btn-group" style="margin-top: 26px;">
                                  <button type="submit" title="Update" class="btn btn-success btn-sm"><span class=" glyphicon glyphicon-floppy-disk"></span></button>
                                  <button type="button" title="Cancel" class="btn btn-danger btn-sm" onclick="cancel_update_head();"><span class="glyphicon glyphicon-remove"></span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-md-12">
                            <ol id="heads_list">
                                <li>loading....</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <form action="" method="post" id="frm_create_sub_head">
                        <input type="hidden" value="" id="sub_head_id" name="sub_head_id">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="head_dropdown">Select head</label>
                                    <select name="head" class="form-control" id="head_dropdown" onchange="getSubHeads();" required>
                                        <!-- dynamic heads comes here -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4" style="padding:0">
                                <label for="sub_head_name">Sub head name</label>
                                <input type="text" id="sub_head_name" name="sub_head_name" placeholder="Sub head name" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <input type="submit" id="subhead-save-button" value="Save" class="btn btn-primary btn-sm" style="margin-top: 26px;">

                                <div class="btn-group"  id="subhead-update-button" style="margin-top: 26px; display:none">
                                  <button type="submit" title="Update" class="btn btn-success btn-sm"><span class=" glyphicon glyphicon-floppy-disk"></span></button>
                                  <button type="button" title="Cancel" class="btn btn-danger btn-sm" onclick="cancel_update_sub_head();"><span class="glyphicon glyphicon-remove"></span></button>
                                </div>

                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <div class="col-md-12">
                            <ol id="get_head_list" style="margin-left:0">
                                <!-- dynamic list here.. -->
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <form action="" method="post" id="frm_create_tran_head">
                        <input type="hidden" value="" id="tran_head_id" name="tran_head_id">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sub_head_dropdown">Sub head</label>
                                    <select name="sub_head" class="form-control" id="sub_head_dropdown" onchange="getTranHeads();" required>
                                        <!-- dynamic heads comes here -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4" style="padding:0">
                                <label for="tran_head_name">Tran head name</label>
                                <input type="text" id="tran_head_name" name="tran_head_name" placeholder="Tran head name" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <input type="submit" id="tranhead-save-button" value="Save" class="btn btn-primary btn-sm" style="margin-top: 26px;">

                                <div class="btn-group"  id="tranhead-update-button" style="margin-top: 26px; display:none">
                                  <button type="submit" title="Update" class="btn btn-success btn-sm"><span class=" glyphicon glyphicon-floppy-disk"></span></button>
                                  <button type="button" title="Cancel" class="btn btn-danger btn-sm" onclick="cancel_update_tran_head();"><span class="glyphicon glyphicon-remove"></span></button>
                                </div>

                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <div class="col-md-12">
                            <ol id="get_tran_head_list" style="margin-left:0">
                                <!-- dynamic list here.. -->
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- /.box-body -->
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
