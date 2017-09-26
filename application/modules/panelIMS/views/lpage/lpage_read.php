
        <h2 style="margin-top:0px"><?php echo $read_title;?></h2>
        <table class="table">
            <?php foreach ($record->result() as $key) {
            ?>
	    <tr><td>Tgl Entry</td><td>:</td><td><?php echo $key->tgl_entry; ?></td></tr>
        <tr><td>Halaman Web</td><td>:</td><td><?php echo $key->hal_web; ?></td></tr>
	    <tr><td>Konten Link</td><td>:</td><td><?php echo $key->kontent_link; ?></td></tr>
	    <!--<tr><td>Username</td><td><?php echo $username; ?></td></tr>-->
	    <tr><td colspan="3" align="center"><a href="<?php echo site_url('panelIMS/lpage') ?>" class="btn btn-info">Back</a></td></tr>
        <?php } ?>
	</table>
