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
        <h2 style="margin-top:0px">Menu Read</h2>
        <table class="table">
	    <tr><td>Nama Menu</td><td>:</td><td><?php echo $nama_menu; ?></td></tr>
	    <tr><td>Posisi</td><td>:</td><td><?php echo $posisi; ?></td></tr>
	    <tr><td>Gambar</td><td>:</td><td><?php echo $gambar; ?></td></tr>
	    <tr><td>Ket Gambar</td><td>:</td><td><?php echo $ket_gambar; ?></td></tr>
	    <tr><td>Kontent</td><td>:</td><td><?php echo $kontent; ?></td></tr>
	    <tr><td>No Urut</td><td>:</td><td><?php echo $no_urut; ?></td></tr>
	    <tr><td>Tgl Entry</td><td>:</td><td><?php echo $tgl_entry; ?></td></tr>
	    <tr><td>Tampil</td><td>:</td><td><?php echo $tampil; ?></td></tr>
	    <tr><td>Username</td><td>:</td><td><?php echo $username; ?></td></tr>
	    <tr><td colspan="4"><a href="<?php echo site_url('menu') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>