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

    <?php
    	if($this->session->flashdata("updateMsg")):
    ?>
	    <div class="alert alert-success">
	  		<?= $this->session->flashdata("updateMsg") ?>
		</div>
	<?php endif; ?>

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
	              <form action="<?php echo base_url('save_project') ?>" method="post" class="form-inline" role="form">
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
		              				<input type="text" name="project_name" id="project_name" class="form-control" required>
		              			</td>
		              			<td>
		              				<input type="radio" name="pksf" id="pksf" value="1" required> PKSF &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		              				<input type="radio" name="pksf" id="pksf" value="2" required> No-PKSF
		              			</td>
		              		</tr>

		              		<tr>
		              			<td></td>
		              			<td>
		              				<button class="btn btn-primary" name="save" id="save" type="submit">save</button>
		              			</td>
		              		</tr>

		              	</tbody>

		              </table>
	              </form>
            	</div>

<!-- report start -->

	<?php
		$projectList = $this->db->get("project")->result();
	?>

            	<div class=" col-md-12">
	            	<div class="panel panel-default">
	            		<div class="panel-heading"> কর্মসূচীর তালিকা </div>
	            		<div class="panel-body">
	            			<table class="table">
	            				<thead>
	            					<tr>
	            						<th>SI</th>
	            						<th>Project Name</th>
	            						<th>PKSF / Non-PKSF</th>
	            						<th>Status</th>
	            						<th>Action</th>
	            					</tr>
	            				</thead>
	            				
	            				<tbody>

	            				<?php
	            					$si = 0;
	            					foreach($projectList as $list):
	            						$si++;

	            					// pksf non-pksf checking
	            						if($list->pksf == 1):
	            							$pk = "PKSF";
	            						elseif($list->pksf == 2):
	            							$pk = 'Non-PKSF';
	            						endif;

	            					// status checking
	            						if($list->status):
	            							$innerTxt = "Active";
	            							$c = "btn btn-primary";
	            							$s = 0;
	            						else:
	            							$innerTxt = "Disabled";
	            							$c = "btn btn-danger";
	            							$s = 1;
	            						endif;
	            				?>

	            					<tr>
	            						<td><?= $si ?></td>
	            						<td><?= $list->project_name ?></td>
	            						<td><?= $pk ?></td>
	            						<td>
	            							<a href="<?php echo base_url('projectUpdate/'.$list->id.'/'.$s) ?>">
	            							<button class="<?= $c ?>" type="button"><?= $innerTxt ?></button></a>
	            						</td>
	            						<td>
	            							<a href="<?= base_url('projectEdit/'.$list->id) ?>">
	            							<button class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button>
	            						</td>
	            					</tr>

	            				<?php endforeach; ?>

	            				</tbody>
	            			</table>
	            		</div>
	            	</div>
	            </div>

<!-- report end -->

            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php view('inc.Footer'); ?>