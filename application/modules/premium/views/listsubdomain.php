<?php
$this->load->view('panelIMS/template/header');
$this->load->view('panelIMS/template/navbar');
?>

    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">
            
            <?php
                $this->load->view('panelIMS/template/sidebar');
            ?>
            <!-- Main content -->
            <div class="content-wrapper">
            <!-- Content area -->
            <div class="content">
            <!-- Dashboard content -->
            <h2 style="margin-top:0px">Subdomain <?php echo $this->session->userdata('username')?></h2>
            <div class="row" style="margin-bottom: 10px">
            <div class="panel panel-flat">
            <div class="table-responsive">
            <?php  $sub = $this->Subdomain_model->subdomain();
            $no = 1;
                foreach ($sub->result_array() as $rows){
                echo '
            <table class="table text-nowrap">
            <td>
            
			<a href="'.htmlspecialchars('http://'.''.$rows['subdomain'],ENT_QUOTES,'UTF-8').'" target="_blank" class="text-default display-inline-block">
				<span class="text-semibold text-primary">'.htmlspecialchars ($rows['subdomain'],ENT_QUOTES,'UTF-8').'</span>
			</a>        
            </td>
            ';
            }
            ?>
<?php
    $this->load->view('panelIMS/template/footer');
?>