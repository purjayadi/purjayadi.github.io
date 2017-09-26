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
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('premium/fbpixel/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
            </div>
            <div class="col-md-1 text-right">
            </div>
            
        </div>
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Facebook Pixel</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                </ul>
                            </div>
                        </div>
        <?php echo $this->session->flashdata('message'); ?> 
        <div class="table-responsive table-hover datatable-responsive table-striped">
        <table class="table table-sm">
        <thead>
            <tr>
            <th>No</th>
    		<th>Konten</th>
    		<th style="text-align:center" width="200px">Action</th>
            </tr>
        </thead>
            <?php
            foreach ($fbpixel_data as $fbpixel)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><textarea rows="10" cols="100"><?php echo $fbpixel->konten ?></textarea></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('premium/fbpixel/update/'.$fbpixel->idkonten),'Update'); 
                echo ' | ';
                echo anchor(site_url('premium/fbpixel/delete/'.$fbpixel->idkonten),'Delete');
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        </div>
        </div>
        <div class="alert alert-warning alert-styled-left alert-bordered">
                                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                                        <span class="text-semibold">Facebook Pixel tidak Boleh Lebih dari SATU !!!</span> 
                                    </div>
        <div class="row">
            <div class="col-md-6">
               
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
<?php
    $this->load->view('panelIMS/template/footer');
?>