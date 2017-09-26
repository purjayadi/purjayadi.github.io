
        <h2 style="margin-top:0px"><?php echo $read_title;?></h2>
        <table class="table">
        	<?php foreach ($record->result() as $key) {
        	?>
        
        <tr><td>Ditampilkan</td><td>:</td><td><?php echo $key->tampil; ?></td></tr>
        <tr><td>Tgl Entry</td><td>:</td><td><?php echo $key->tgl_entry; ?></td></tr>
        <tr><td>Posisi</td><td>:</td><td><?php echo $key->posisi; ?></td></tr>
        <tr><td>Urutan Ke</td><td>:</td><td><?php echo $key->no_urut; ?></td></tr>
	    <tr><td>Instansi | Perusahaan | Divisi</td><td>:</td><td><?php echo $key->ints_perushaan; ?></td></tr>
	    <tr><td>Nama</td><td>:</td><td><?php echo $key->nama; ?></td></tr>
	    <tr><td>Email Utama</td><td>:</td><td><?php echo $key->email_utama; ?></td></tr>
	    <tr><td>Email Alternatif1</td><td>:</td><td><?php echo $key->email_alternatif1; ?></td></tr>
	    <tr><td>Email Alternatif2</td><td>:</td><td><?php echo $key->email_alternatif2; ?></td></tr>
	    <tr><td>Email Alternatif3</td><td>:</td><td><?php echo $key->email_alternatif3; ?></td></tr>
	    <tr><td>Email Alternatif4</td><td>:</td><td><?php echo $key->email_alternatif4; ?></td></tr>
	    <tr><td>Nomor Telepon Utama</td><td>:</td><td><?php echo $key->no_telp_utama; ?></td></tr>
	    <tr><td>Nomor Telepon Alternatif1</td><td>:</td><td><?php echo $key->no_telp_alternatif1; ?></td></tr>
	    <tr><td>Nomor Telepon Alternatif2</td><td>:</td><td><?php echo $key->no_telp_alternatif2; ?></td></tr>
	    <tr><td>Nomor Telepon Alternatif3</td><td>:</td><td><?php echo $key->no_telp_alternatif3; ?></td></tr>
	    <tr><td>Nomor Telepon Alternatif4</td><td>:</td><td><?php echo $key->no_telp_alternatif4; ?></td></tr>
	    <tr><td>Nomor Telepon Utama</td><td>:</td><td><?php echo $key->no_hp_utama; ?></td></tr>
	    <tr><td>Nomor Telepon Alternatif1</td><td>:</td><td><?php echo $key->no_hp_alternatif1; ?></td></tr>
	    <tr><td>Nomor Telepon Alternatif2</td><td>:</td><td><?php echo $key->no_hp_alternatif2; ?></td></tr>
	    <tr><td>Nomor Telepon Alternatif3</td><td>:</td><td><?php echo $key->no_hp_alternatif3; ?></td></tr>
	    <tr><td>Nomor Telepon Alternatif4</td><td>:</td><td><?php echo $key->no_hp_alternatif4; ?></td></tr>
	   	<tr><td>Nomor Fax Utama</td><td>:</td><td><?php echo $key->no_fax_utama; ?></td></tr>
	    <tr><td>Nomor Fax Alternatif1</td><td>:</td><td><?php echo $key->no_fax_alternatif1; ?></td></tr>
	    <tr><td>Nomor Fax Alternatif2</td><td>:</td><td><?php echo $key->no_fax_alternatif2; ?></td></tr>
	    <tr><td>Nomor Fax Alternatif3</td><td>:</td><td><?php echo $key->no_fax_alternatif3; ?></td></tr>
	    <tr><td>Nomor Fax Alternatif4</td><td>:</td><td><?php echo $key->no_fax_alternatif4; ?></td></tr>
	    <tr><td>Nomor Ponsel Utama</td><td>:</td><td><?php echo $key->no_hp_utama; ?></td></tr>
	    <tr><td>Nomor Ponsel Alternatif1</td><td>:</td><td><?php echo $key->no_hp_alternatif1; ?></td></tr>
	    <tr><td>Nomor Ponsel Alternatif2</td><td>:</td><td><?php echo $key->no_hp_alternatif2; ?></td></tr>
	    <tr><td>Nomor Ponsel Alternatif3</td><td>:</td><td><?php echo $key->no_hp_alternatif3; ?></td></tr>
	    <tr><td>Nomor Ponsel Alternatif4</td><td>:</td><td><?php echo $key->no_hp_alternatif4; ?></td></tr>
	    <tr><td>Pin BB Utama</td><td>:</td><td><?php echo $key->pin_bb_utama; ?></td></tr>
	    <tr><td>Pin BB Alternatif1</td><td>:</td><td><?php echo $key->pin_bb_alternatif1; ?></td></tr>
	    <tr><td>Pin BB Alternatif2</td><td>:</td><td><?php echo $key->pin_bb_alternatif2; ?></td></tr>
	    <tr><td>Pin BB Alternatif3</td><td>:</td><td><?php echo $key->pin_bb_alternatif3; ?></td></tr>
	    <tr><td>Pin BB Alternatif4</td><td>:</td><td><?php echo $key->pin_bb_alternatif4; ?></td></tr>
	    <tr><td>WhatsApp Utama</td><td>:</td><td><?php echo $key->no_wa_utama; ?></td></tr>
	    <tr><td>WhatsApp Alternatif1</td><td>:</td><td><?php echo $key->no_wa_alternatif1; ?></td></tr>
	    <tr><td>WhatsApp Alternatif2</td><td>:</td><td><?php echo $key->no_wa_alternatif2; ?></td></tr>
	    <tr><td>WhatsApp Alternatif3</td><td>:</td><td><?php echo $key->no_wa_alternatif3; ?></td></tr>
	    <tr><td>WhatsApp Alternatif4</td><td>:</td><td><?php echo $key->no_wa_alternatif4; ?></td></tr>
	    <tr><td>URL Facebook</td><td>:</td><td><?php echo $key->url_fb; ?></td></tr>
	    <tr><td>URL Twitter</td><td>:</td><td><?php echo $key->url_twitter; ?></td></tr>
	    <tr><td>URL Googleplus</td><td>:</td><td><?php echo $key->url_gplus; ?></td></tr>
	    <tr><td>Akun Skype</td><td>:</td><td><?php echo $key->akun_skype; ?></td></tr>
	    <tr><td>Alamat</td><td>:</td><td><?php echo $key->alamat; ?></td></tr>
	    <tr><td>Kode Pos</td><td>:</td><td><?php echo $key->kode_pos; ?></td></tr>
	    <tr><td>Kota</td><td>:</td><td><?php echo $key->kota; ?></td></tr>
	    <tr><td>Provinsi</td><td>:</td><td><?php echo $key->provinsi; ?></td></tr>
	    <tr><td>Negara</td><td>:</td><td><?php echo $key->negara; ?></td></tr>
	    <tr><td>Url Web Utama</td><td>:</td><td><?php echo $key->url_web_utama; ?></td></tr>
	    <tr><td>Url Web Alternatif1</td><td>:</td><td><?php echo $key->url_web_alternatif1; ?></td></tr>
	    <tr><td>Url Web Alternatif2</td><td>:</td><td><?php echo $key->url_web_alternatif2; ?></td></tr>
	    <tr><td>Url Web Alternatif3</td><td>:</td><td><?php echo $key->url_web_alternatif3; ?></td></tr>
	    <tr><td>Url Web Alternatif4</td><td>:</td><td><?php echo $key->url_web_alternatif4; ?></td></tr>
	    <tr><td colspan="3" align="center"><a href="<?php echo site_url('panelIMS/psupport') ?>" class="btn btn-info">Back</a></td></tr>
	    <?php } ?>
	</table>
	<br><br><br>