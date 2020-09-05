<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Gonoshasthaya Microcredit System | Login</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('public/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/style.css'); ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
          <div class="banner">
            <div class="banner_overlay hidden-xs"><span>Gonoshasthaya Microcredit System</span></div>
            <div class="banner_overlay visible-xs"><span>GMS</span></div>
          </div>
        </div>
        <!-- <div class="container">
          <div class="row">
            <a class="btn btn-default" href="<?= base_url('/'); ?>">Attendence</a>
          </div>
        </div> -->
        <div class="row login_form_area">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-10 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-1">
              <div class="row login_bg">
                <div class="col-lg-6 col-md-6">
                    <a href="<?= base_url('/'); ?>">
                      <img src="<?php echo base_url('public/img/login_img.png'); ?>" class="img-responsive hidden-xs center-block">
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top:35px">
                  <?= form_open('login_attempt', ['class' => 'form-horizontal']); ?>
                      <div class="form-group">
                        <label for="username" class="col-sm-3 hidden-md control-label">Username</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="password" class="col-sm-3 hidden-md control-label">Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-8">
                          <button type="submit" class="btn btn-default" name="login">Sign in</button>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="login_error">
                          <?php echo validation_errors(); ?>
                        </div>
                        <?php if(hasFlash('message')){ ?>
                          <span style="color:#0af;">
                            <?=  flashMessage('message'); ?>
                          </span> 
                        <?php } ?>
                      </div>
                    <?= form_close(); ?>
                </div>                
              </div>
          </div>
        </div>
    </div>


    <!-- footer -->

    <footer class="footer">
      <div class="container-fluid">
        <span class="text-muted">
          <strong>Copyright &copy; <?= date('Y'); ?> <a href="javascript:">GMS</a>.</strong> All rights reserved. Give &nbsp;&nbsp;<a class="text-danger" href="<?= base_url('attendence'); ?>"><strong >Attendence Here.</strong></a>
        </span>
        <span class="pull-right"><b>Powered by</b> <a href="http://gatewayit.net/">Gateway IT</a></span>
      </div>
    </footer>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>
  </body>
</html>