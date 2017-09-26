<?php
$this->load->view('administrator/template/header');
$this->load->view('administrator/template/navbar');
$url = base_url('assets/images/pembayaran/').$photo;
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

        <div class="content">
        <div class="panel panel-info">
        <div class="panel-heading">
        <h6 class="panel-title">Validasi Pembayaran</h6>   </div>
        <div class="panel panel-flat">
        <div class="panel-body">
        <form class="form-horizontal" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
         <div class="form-group">
            <label for="varchar">Email <?php echo form_error('kode_user'); ?></label>
            <input type="email" class="form-control" name="kode_user" id="kode_user" placeholder="kode_user" required="required" value="<?php echo $kode_user; ?>" readonly="readonly" />
        </div>
         <div class="form-group">
            <label for="varchar">Nama Pengirim <?php echo form_error('nama_pengirim'); ?></label>
            <input type="text" class="form-control" name="nama_pengirim" id="nama_pengirim" placeholder="Nama Pengirim" required="required" value="<?php echo $nama_pengirim; ?>" readonly="readonly" />
        </div>

        <div class="form-group">
            <label for="varchar">Tanggal Transfer <?php echo form_error('tgl_transfer'); ?></label>
            <input type="text" class="form-control" name="tgl_transfer" id="tgl_transfer" placeholder="Tanggal Transfer" required="required" value="<?php echo $tgl_transfer; ?>" readonly="readonly" />
        </div>

         <div class="form-group">
            <label for="varchar">Photo <?php echo form_error('photo'); ?></label>
            <div class="media-left">
            <a href="<?=$url?>" target="_blank"><img src="<?=$url?>" style="width: 58px; height: 58px;" class="img-rounded" alt=""></a>
             </div>
        </div>
        <div class="form-group">
            <label for="varchar">Jumlah Transfer <?php echo form_error('jmlh_transfer'); ?></label>
            <input type="number" class="form-control" name="jmlh_transfer" id="jmlh_transfer" placeholder="Jumlah Transfer" required="required" value="<?php echo $jmlh_transfer; ?>" readonly="readonly" />
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Status <span class="text-danger"> *</span></label>
            <div class="col-lg-9">
            <label class="radio-inline">
            <input type="radio" name="status" id="status" class="styled" value="Paid" <?php if($status=='Paid'){echo 'checked';}?> /> Paid</label>
            <label class="radio-inline">
            <input type="radio" name="status" id="status" class="styled" value="Unpaid" <?php if($status=='Unpaid'){echo 'checked';}?> /> Unpaid</label>
             </div>
        </div>
        <div class="text-right">
            <input type="hidden" name="idpembayaran" value="<?php echo $idpembayaran; ?>" />
            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
            <a href="<?php echo site_url('pembayaran') ?>" class="btn btn-danger"><i class=" icon- icon-cancel-circle2"></i> Batal</a>
              <button type="submit" value="upload" class="btn btn-success"><i class="icon-floppy-disk"></i> Valid</button> 
        </div>
        </div>
        </div>
    </div>
    
    <?php echo form_close(); ?>
<?php
$this->load->view('administrator/template/footer');
?>