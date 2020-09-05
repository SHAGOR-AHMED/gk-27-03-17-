<?php view('inc.Header'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>it all starts here</small> 
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?= $total_regional_branch; ?></h3>
                  <p>Regional Branch</p>
                </div>
                <div class="icon">
                  <i class="ion ion-earth"></i>
                </div>
                <a href="<?=  base_url('search_regional_branch'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?= $total_branch; ?></h3>
                  <p>Branch</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ribbon-b"></i>
                </div>
                <a href="<?=  base_url('search_branch'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?= $total_somiti; ?></h3>
                  <p>Somiti</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-home-outline"></i>
                </div>
                <a href="<?=  base_url('search_somiti'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?= $total_member; ?></h3>
                  <p>Members</p>
                </div>
                <div class="icon">
                  <i class="ion ion-android-people"></i>
                </div>
                <a href="<?=  base_url('search_members'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div>
          <div class="row">
            
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-industry"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total asset</span>
                  <span class="info-box-number"><?= $total_asset; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Usable asset</span>
                  <span class="info-box-number"><?= $total_usable_asset; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <!--<div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Uploads</span>
                  <span class="info-box-number">13,648</span>
                </div><!-- /.info-box-content -->
              <!--</div><!-- /.info-box -->
           <!-- </div><!-- /.col -->
            <!--<div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Likes</span>
                  <span class="info-box-number">93,139</span>
                </div><!-- /.info-box-content -->
             <!-- </div><!-- /.info-box -->
            <!--</div><!-- /.col -->
          
          </div>

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

<?php view('inc.Footer'); ?>