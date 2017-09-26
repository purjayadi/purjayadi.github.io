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
        <h2 style="margin-top:0px">Menu <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Menu <?php echo form_error('nama_menu') ?></label>
            <input type="text" class="form-control" name="nama_menu" id="nama_menu" placeholder="Nama Menu" value="<?php echo $nama_menu; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Posisi <?php echo form_error('posisi') ?></label>
            <input type="text" class="form-control" name="posisi" id="posisi" placeholder="Posisi" value="<?php echo $posisi; ?>" />
        </div>
	    <div class="form-group">
            <label for="longblob">Gambar <?php echo form_error('gambar') ?></label>
            <input type="text" class="form-control" name="gambar" id="gambar" placeholder="Gambar" value="<?php echo $gambar; ?>" />
        </div>
	    <div class="form-group">
            <label for="ket_gambar">Ket Gambar <?php echo form_error('ket_gambar') ?></label>
            <textarea class="form-control" rows="3" name="ket_gambar" id="ket_gambar" placeholder="Ket Gambar"><?php echo $ket_gambar; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="kontent">Kontent <?php echo form_error('kontent') ?></label>
            <textarea class="form-control" rows="3" name="kontent" id="kontent" placeholder="Kontent"><?php echo $kontent; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">No Urut <?php echo form_error('no_urut') ?></label>
            <input type="text" class="form-control" name="no_urut" id="no_urut" placeholder="No Urut" value="<?php echo $no_urut; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Entry <?php echo form_error('tgl_entry') ?></label>
            <input type="text" class="form-control" name="tgl_entry" id="tgl_entry" placeholder="Tgl Entry" value="<?php echo $tgl_entry; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Tampil <?php echo form_error('tampil') ?></label>
            <input type="text" class="form-control" name="tampil" id="tampil" placeholder="Tampil" value="<?php echo $tampil; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
	    <input type="hidden" name="id_menu" value="<?php echo $id_menu; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('menu') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>