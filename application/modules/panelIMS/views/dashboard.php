<?php
$this->load->view('template/header');
$this->load->view('template/navbar');
?>

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">
			
			<?php
				$this->load->view('template/sidebar');
			?>

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Dashboard content -->
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><i class="icon-home2 position-left"></i> <b><?php echo $judul;?></b></a></li>
							<li><b><?php echo $sub_judul; ?></b></a></li>
						</ul>
					</div><br>

					<?php $this->load->view($content);?>
					<br><br>
					<!-- /dashboard content -->

<?php
	$this->load->view('template/footer');
?>