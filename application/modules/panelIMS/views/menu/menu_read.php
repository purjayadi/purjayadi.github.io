<!doctype html>
<html>
    <head>
        <title><?php echo $title;?></title>
        <link rel="stylesheet" href="<?php echo base_url('assetss/bootstrap/css/bootstrap.min.css') ?>"/>
        
    </head>
    <body>
        <h2 style="margin-top:0px">Menu Read</h2>
        <table class="table">
	    <tr><td>Nama Menu</td><td><?php echo $nama_menu; ?></td></tr>
	    <tr><td>Posisi</td><td><?php echo $posisi; ?></td></tr>
	    <tr><td>Gambar</td><td><?php echo $gambar; ?></td></tr>
	    <tr><td>Ket Gambar</td><td><?php echo $ket_gambar; ?></td></tr>
	    <tr><td>Kontent</td><td><?php echo $kontent; ?></td></tr>
	    <tr><td>No Urut</td><td><?php echo $no_urut; ?></td></tr>
	    <tr><td>Tgl Entry</td><td><?php echo $tgl_entry; ?></td></tr>
	    <tr><td>Tampil</td><td><?php echo $tampil; ?></td></tr>
	    <!--<tr><td>Username</td><td><?php echo $username; ?></td></tr>-->
	    <tr><td></td><td><a href="<?php echo site_url('panelIMS/menu') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>