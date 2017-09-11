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
                            <li><a href="index.html"><i class="icon-users position-left"></i> Manage User</a></li>
                            <li class="active">Payment</li>
                        </ul>
            </div>
        </div>
        <br>
        <div class="content">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('pembayaran/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pembayaran'); ?>" class="btn btn-default">Reset</a>
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
                <h5 class="panel-title">List pembayaran</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                </ul>
                            </div>
                        </div>
        <?php echo $this->session->flashdata('message'); ?> 
        <table id="table" class="table table-hover datatable-responsive table-striped" >
        <thead>
        <tr>
            <th>No</th>
    		<th>Kode User</th>
    		<th>Nama Pengirim</th>
    		<th>Tgl Transfer</th>
    		<th>Status</th>
    		<th>Action</th>
        </tr>
        </thead>
            <?php
            foreach ($pembayaran_data as $pembayaran)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $pembayaran->kode_user ?></td>
			<td><?php echo $pembayaran->nama_pengirim ?></td>
			<td><?php echo $pembayaran->tgl_transfer ?></td>
			<td><?php echo $pembayaran->status ?></td>
			<td style="text-align:center" width="200px">
                   <ul class="icons-list ">
                     <li><a href="<?php echo site_url() ?>pembayaran/update/<?php echo $pembayaran->idpembayaran;?>" class="btn btn-success btn-xs" data-popup="tooltip" title="Detail" ><i class="icon-search4 text-white"></i></a></li>
                     <li><a href="<?php echo site_url() ?>pembayaran/delete/<?php echo $pembayaran->idpembayaran;?>" class="btn btn-danger btn-xs" data-popup="tooltip" title="Hapus"   onClick='return confirm("Anda yakin ingin menghapus data ini?")'><i class="icon-bin text-white" ></i></a></li>
                  </ul>
            </td>
		</tr>
                <?php
            }
            ?>
        </table>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-success">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('pembayaran/excel'), 'Excel', 'class="btn btn-success"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
<?php
    $this->load->view('administrator/template/footer');
?>