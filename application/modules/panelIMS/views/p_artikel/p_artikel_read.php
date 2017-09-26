
        <h2 style="margin-top:0px"><?php echo $read_title;?></h2>
        <table class="table">
        	<?php foreach ($record->result() as $key) {
        	?>
        <tr><td>Tgl Entry</td><td>:</td><td><?php echo $key->tgl_entry; ?></td></tr>
	    <tr><td>Judul Artikel</td><td>:</td><td><?php echo $key->judul_artikel; ?></td></tr>
	    <tr><td>Id Produk</td><td>:</td><td><?php echo $key->id_produk; ?></td></tr>
	    <tr><td>Ringkasan Artikel</td><td>:</td><td><?php echo $key->ringkasan_artikel; ?></td></tr>
	    <tr><td>Konteks Artikel</td><td>:</td><td><?php echo $key->konteks_artikel; ?></td></tr>
	    <tr><td colspan="3" align="center"><a href="<?php echo site_url('panelIMS/p_artikel') ?>" class="btn btn-info">Back</a></td></tr>
	    <?php } ?>
	</table>
