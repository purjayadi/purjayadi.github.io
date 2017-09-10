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
					<?php $this->load->view($content);?>
					<!-- /dashboard content -->

<?php
	$this->load->view('template/footer');
?>