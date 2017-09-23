<!DOCTYPE html>
<html lang="ID">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Registrasi</title>

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
	<script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/jquery_ui/interactions.min.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/selects/select2.min.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/core/app.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/pages/form_select2.js')?>"></script>
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
				<div class="content">
					 <?php echo $this->session->flashdata('message'); ?> 
					<!-- Advanced login -->
					<form class="form-horizontal" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-success text-success"><i class="icon-users4"></i></div>
								<h5 class="content-group">Form Registrasi <small class="display-block">All fields are required</small></h5>
							</div>

							<div class="content-divider text-muted form-group"><span>Your credentials</span></div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" name="nama_lengkap" class="form-control" placeholder="Nama lengkap" required="required">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="email" name="email" class="form-control" placeholder="Alamat Email" required="required">
								<div class="form-control-feedback">
									<i class="icon-envelop5 text-muted"></i>
								</div>
							</div>
							<div class="form-group has-feedback has-feedback-left">
								<input type="text" name="no_telp" class="form-control" placeholder="No Whatsapp anda" required="required">
								<div class="form-control-feedback">
									<i class="icon-phone text-muted"></i>
								</div>
							</div>
							<div class="form-group has-feedback has-feedback-left">
								<input type="text" name="nama_subdomain" class="form-control" placeholder="Nama subdomain" required="required">
								<div class="form-control-feedback">
									<i class=" icon-earth text-muted"></i>
								</div>
							</div>
							<div class="form-group has-feedback has-feedback-left">
								<select data-placeholder="Pilih paket..." name="paket_layanan" class="select-icons" required="required">
										<option></option>		
											<option value="PKP" data-icon="bag text-muted">PKP</option>
									</select>
							</div>
							<div class="form-group has-feedback has-feedback-left">
								<input type="text" name="kota" class="form-control" placeholder="Kota" required="required">
								<div class="form-control-feedback">
									<i class="icon-pin text-muted"></i>
								</div>
							</div>
							<div class="form-group">
							 <?php echo $widget;?>
            				<?php echo $script;?>
            				</div>
							<div class="form-group">
							<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
							<button type="submit" class="btn bg-teal btn-block btn-lg">Register <i class="icon-circle-right2 position-right"></i></button>
							</div>
							<div class="content-divider text-muted form-group"><span>Already have an account?</span></div>
							<a href="<?php echo base_url('login')?>" class="btn btn-default btn-block content-group">Login</a>
						</div>
					</form>
					<!-- /advanced login -->


					<!-- Footer -->
					<div class="footer text-muted text-center">
						&copy; 2017. <a href="#">Brajalink Mediatama</a> by <a href="#" target="_blank">IT Team Devlopment</a>
					</div>
					<!-- /footer -->

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
