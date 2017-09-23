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
                <?php echo anchor(site_url('premium/clocker/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('premium/clocker/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('premium/clocker'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Clocker <?php echo$this->session->userdata('username');?></h5>
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
		<th data-toggle="true">Title</th>
		<th data-hide="phone">Url Redirect</th>
		<th data-hide="phone">Url Tujuan</th>
		<th style="text-align:center" width="200px" data-hide="phone">Action</th>
            </tr></thead><?php
            foreach ($clocker_data as $clocker)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td style="word-wrap: break-word"><?php echo $clocker->title ?></td>
			<td style="word-wrap: break-word"><?php echo $clocker->url_redirect ?></td>
			<td style="word-wrap: break-word"><?php echo $clocker->url_tujuan ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('premium/clocker/update/'.$clocker->idclocker),'Update'); 
				echo ' | '; 
				echo anchor(site_url('premium/clocker/delete/'.$clocker->idclocker),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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