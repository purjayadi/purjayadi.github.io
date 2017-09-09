
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login BM Link</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/css/icons/icomoon/styles.css')?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/css/bootstrap.css')?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/css/core.css')?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/css/components.css')?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/css/colors.css')?>" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/loaders/pace.min.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/jquery.min.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/bootstrap.min.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/loaders/blockui.min.js')?>"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/styling/uniform.min.js')?>"></script>

	<script type="text/javascript" src="<?php echo base_url('assets/js/core/app.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/pages/login.js')?>"></script>
	<!-- /theme JS files -->

</head>

<body class="login-container">

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content pb-20">

					<!-- Advanced login -->
					<?php echo form_open("users/auth/cek_login"); ?>
						<div class="panel panel-body login-form">
							<div class="text-center">
								<h5 class="content-group-lg">Login to your account <small class="display-block">Enter your credentials</small></h5>
							</div>
							<?php echo $this->session->flashdata('message'); ?>
							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control"  placeholder="Username" name="identity" autocomplete="off" required="required">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" placeholder="Password" name="password" required="required">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group login-options">
				              <div class="row">
				                <div class="col-sm-6">
				                  <label class="checkbox-inline">
				                    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?> <?php echo $this->lang->line('login_remember_label'); ?> Remember
				                  </label>
				                </div>

				                
				              </div>
				            </div>

							<div class="form-group">
								<button type="submit" class="btn bg-blue btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
							</div>
						</div>
					<?php echo form_close(); ?>
					<!-- /advanced login -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
