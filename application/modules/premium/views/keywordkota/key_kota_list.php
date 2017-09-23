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
                <?php echo anchor(site_url('premium/keywordkota/create'),'Input Keyword Kota', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('premium/keywordkota/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('premium/keywordkota'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Cari</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Keyword Kota</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                </ul>
                            </div>
                        </div>
        <?php echo $this->session->flashdata('message'); ?> 
        <div class="table-responsive">
        <table class="table table-togglable table-hover">
        <thead>
            <tr>
            <th>No</th>
		    <th data-toggle="true">Keyword</th>
		    <th style="text-align:center" width="200px" data-hide="phone">Action</th>
            </tr>
        </thead>
            <?php
            foreach ($keywordkota_data as $keywordkota)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $keywordkota->keyword ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('premium/keywordkota/update/'.$keywordkota->idkey_kota),'Update'); 
				echo ' | '; 
				echo anchor(site_url('premium/keywordkota/delete/'.$keywordkota->idkey_kota),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
<?php
    $this->load->view('panelIMS/template/footer');
?>