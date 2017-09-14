<?php
$this->load->view('administrator/template/header');
$this->load->view('administrator/template/navbar');
?>


    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">
            
            <?php
                $this->load->view('administrator/template/sidebar');
            ?>
            <!-- Main content -->
            <div class="content-wrapper">
                <br>
            <div class="page-header">
                <div class="breadcrumb-line breadcrumb-line-component">
                            <ul class="breadcrumb">
                                <li class="active"><i class="icon-earth position-left"></i> Setup Subdomain</li>
                            </ul>
                </div>
            </div>
            <br>
                <!-- Content area -->
            <div class="content">
                    <!-- Dashboard content -->
            <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('subdomain/create'),'Create', 'class="btn btn-success"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('subdomain/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('subdomain'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-success" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">List subdomain</h5>
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
		<th>Subdomain</th>
		<th>User</th>
		<th style="text-align:center" width="200px">Action</th>
        </tr>
        </thead>
            <?php
            foreach ($subdomain_data as $subdomain)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $subdomain->subdomain ?></td>
			<td><?php echo $subdomain->username ?></td>
			<td style="text-align:center" width="200px">
                <ul class="icons-list ">
                    <li><a href="<?php echo site_url() ?>subdomain/update/<?php echo $subdomain->idsubdomain;?>" class="btn btn-warning  btn-xs" data-popup="tooltip" title="Change" ><i class="icon-pencil text-white"></i></a></li>
                    <li><a href="<?php echo site_url() ?>subdomain/delete/<?php echo $subdomain->idsubdomain;?>" class="btn btn-danger btn-xs" data-popup="tooltip" title="Delete"   onClick='return confirm("Anda yakin ingin menghapus data ini?")'><i class="icon-bin text-white" ></i></a></li>
                </ul>
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
                <a href="#" class="btn btn-success">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
<?php
    $this->load->view('administrator/template/footer');
?>