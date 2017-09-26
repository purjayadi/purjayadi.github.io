
        <h2 style="margin-top:0px"><?php echo $read_title;?></h2>
        <table class="table">
        	<?php foreach ($record->result() as $key) {
        	?>
        <tr><td>Tgl Entry</td><td>:</td><td><?php echo $key->tgl_entry; ?></td></tr>
	    <tr><td>Produk</td><td>:</td><td><?php echo $key->nama_produk; ?></td></tr>
	    <tr><td>Gambar</td><td>:</td><td><img src="<?php echo base_url();?>assets/imgproduk/<?php echo $key->gambar; ?>" width="400" height="400"></td></tr>
	    <tr><td>Ket Gambar</td><td>:</td><td><?php echo $key->ket_gambar; ?></td></tr>
	    <tr><td>Harga</td><td>:</td><td><?php echo $key->harga; ?></td></tr>
	    <tr><td>Deskripsi</td><td>:</td><td><?php echo $key->deskripsi; ?></td></tr>
	    <tr><td>No Urut</td><td>:</td><td><?php echo $key->no_urut; ?></td></tr>
	    <tr><td>Tampil</td><td>:</td><td><?php echo $key->tampil; ?></td></tr>
	    <!--<tr><td>Username</td><td><?php echo $username; ?></td></tr>-->
	    <tr><td colspan="3" align="center"><a href="<?php echo site_url('panelIMS/produk') ?>" class="btn btn-info">Back</a></td></tr>
	    <?php } ?>
	</table>
