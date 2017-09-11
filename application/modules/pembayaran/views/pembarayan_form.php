<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Pembayaran <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Kode User <?php echo form_error('kode_user') ?></label>
            <input type="text" class="form-control" name="kode_user" id="kode_user" placeholder="Kode User" value="<?php echo $kode_user; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Pengirim <?php echo form_error('nama_pengirim') ?></label>
            <input type="text" class="form-control" name="nama_pengirim" id="nama_pengirim" placeholder="Nama Pengirim" value="<?php echo $nama_pengirim; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Transfer <?php echo form_error('tgl_transfer') ?></label>
            <input type="text" class="form-control" name="tgl_transfer" id="tgl_transfer" placeholder="Tgl Transfer" value="<?php echo $tgl_transfer; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Photo <?php echo form_error('photo') ?></label>
            <input type="text" class="form-control" name="photo" id="photo" placeholder="Photo" value="<?php echo $photo; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jmlh Transfer <?php echo form_error('jmlh_transfer') ?></label>
            <input type="text" class="form-control" name="jmlh_transfer" id="jmlh_transfer" placeholder="Jmlh Transfer" value="<?php echo $jmlh_transfer; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <input type="hidden" name="idpembayaran" value="<?php echo $idpembayaran; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pembayaran') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>