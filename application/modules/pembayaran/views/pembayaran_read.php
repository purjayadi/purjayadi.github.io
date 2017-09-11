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

        <div class="content">
        <div class="panel panel-info">
        <div class="panel-heading">
        <h6 class="panel-title">Validasi Pembayaran</h6>   </div>
        <div class="panel panel-flat">
        <div class="panel-body">
        <form class="form-horizontal" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
         <div class="form-group">
            <label for="varchar">Email</label>
            <input type="email" class="form-control" name="kode_user" id="kode_user" placeholder="kode_user" required="required" value="<?php echo $kode_user; ?>" />
        </div>
         <div class="form-group">
            <label for="varchar">Nama Pengirim</label>
            <input type="text" class="form-control" name="nama_pengirim" id="nama_pengirim" placeholder="Nama Pengirim" required="required" value="<?php echo $nama_pengirim; ?>" />
        </div>

        <div class="form-group">
            <label for="varchar">Tanggal Transfer</label>
            <input type="text" class="form-control" name="tgl_transfer" id="tgl_transfer" placeholder="Tanggal Transfer" required="required" value="<?php echo $tgl_transfer; ?>"/>
        </div>

         <div class="form-group">
            <label for="varchar">Photo</label>
            <input type="text" class="form-control" name="photo" id="photo" placeholder="photo" required="required" value="<?php echo $photo; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Jumlah Transfer</label>
            <input type="number" class="form-control" name="jmlh_transfer" id="jmlh_transfer" placeholder="Jumlah Transfer" required="required" value="<?php echo $jmlh_transfer; ?>" />
        </div>
        <div class="form-group">
            <label>Status</label>
           <select name="username" id="username" class="form-control select-search" data-placeholder="Select User..." required="required" />
           <option value="Paid">Paid</option>
                <?php 
                $pembayaran=$this->db->query("select * from pembayaran");
                foreach($pembayaran->result() as $value){
                  $selected= '';
                  if($Status == $value->Status){
                    $selected = 'selected="selected"';
                  }
                ?>
                <option  value="<?php echo $value->status; ?>"  <?php echo $selected;?> >
                <?php echo $value->status; ?>
                </option>
            <?php }?>
          </select>
        </div>
         <div class="text-right">
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