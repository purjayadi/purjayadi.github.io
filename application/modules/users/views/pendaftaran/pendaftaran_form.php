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
        <h2 style="margin-top:0px">Pendaftaran <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Lengkap <?php echo form_error('nama_lengkap') ?></label>
            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">No Telp <?php echo form_error('no_telp') ?></label>
            <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="No Telp" value="<?php echo $no_telp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Subdomain <?php echo form_error('nama_subdomain') ?></label>
            <input type="text" class="form-control" name="nama_subdomain" id="nama_subdomain" placeholder="Nama Subdomain" value="<?php echo $nama_subdomain; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Paket Layanan <?php echo form_error('paket_layanan') ?></label>
            <input type="text" class="form-control" name="paket_layanan" id="paket_layanan" placeholder="Paket Layanan" value="<?php echo $paket_layanan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kota <?php echo form_error('kota') ?></label>
            <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" value="<?php echo $kota; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tgl Entry <?php echo form_error('tgl_entry') ?></label>
            <input type="text" class="form-control" name="tgl_entry" id="tgl_entry" placeholder="Tgl Entry" value="<?php echo $tgl_entry; ?>" />
        </div>
	    <input type="hidden" name="id_pendaftaran" value="<?php echo $id_pendaftaran; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pendaftaran') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>