<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $this->config->item('app_short_name'); ?> <?= (isset($title))? '| '.$title : '' ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?=  base_url('public/backend/bootstrap/css/bootstrap.min.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('public/backend/plugins/font-awesome/css/font-awesome.min.css'); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?=  base_url('public/css/ionicons.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=  base_url('public/backend/dist/css/AdminLTE.css'); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?=  base_url('public/backend/dist/css/skins/_all-skins.min.css'); ?>">
    <!-- date picker -->
    <link rel="stylesheet" href="<?=  base_url('public/css/bootstrap-datepicker.min.css'); ?>">
    <link href="<?php echo base_url('public/css/style.css'); ?>" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('public/backend/plugins/datatables/dataTables.bootstrap.css'); ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="<?=  base_url('/'); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><strong>G</strong>MS</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>GM</b>S &nbsp; <i class="fa fa-spinner fa-spin fa-lg" id="ajaxLoader" style="display:none;"></i> </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
 

            <div class="col-md-10">
              <h3 style="text-align: center;color: white;">
                <?php
                  if($this->session->userdata("log_branch") == 786):
                    echo "Head Office";
                  else:
                    $branch_id = $this->session->userdata("log_branch");

                    echo $branch_info = $this->db->where("id",$branch_id)->get("branch_info")->row()->name;

                  endif;
                ?>
              </h3>
            </div>

          <div class="navbar-custom-menu">
            
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?=  base_url('public/backend/dist/img/avatar.png'); ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?=  (auth('username') !== null)? ucfirst(auth('username')) : ''; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?=  base_url('public/backend/dist/img/avatar.png'); ?>" class="img-circle" alt="User Image">
                    <p>
                      <?=  (auth('username') !== null)? ucfirst(auth('username')) : ''; ?> - Web Developer
                      <small>Member since <?php
                        if(auth('created_at') !== null){
                          $date = auth('created_at');
                        }else{
                          $date = "2015-01-01";
                        }
                        $date = date_create($date);
                        echo '<b>'.date_format($date,"M, Y").'</b>';
                      ?>
                      </small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="<?=  base_url('logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->
      <?php view('inc.Sidebar'); ?>
      <!-- base url -->
      <p id="base_url" hidden><?= base_url('/'); ?></p>
