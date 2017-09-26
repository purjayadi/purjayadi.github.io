<?php
		foreach ($record->result() as $key) {
			$id_support = $key->id_support;
			$tampil = $key->tampil;
			$posisi = $key->posisi;
			$no_urut = $key->no_urut;
			$ints_perushaan = $key->ints_perushaan;
			$nama = $key->nama;
			$email_utama = $key->email_utama;
			$email_alternatif1 = $key->email_alternatif1;
			$email_alternatif2 = $key->email_alternatif2;
			$email_alternatif3 = $key->email_alternatif3;
			$email_alternatif4 = $key->email_alternatif4;
			$no_telp_utama = $key->no_telp_utama;
			$no_telp_alternatif1 = $key->no_telp_alternatif1;
			$no_telp_alternatif2 = $key->no_telp_alternatif2;
			$no_telp_alternatif3 = $key->no_telp_alternatif3;
			$no_telp_alternatif4 = $key->no_telp_alternatif4;
			$no_fax_utama = $key->no_fax_utama;
			$no_fax_alternatif1 = $key->no_fax_alternatif1;
			$no_fax_alternatif2 = $key->no_fax_alternatif2;
			$no_fax_alternatif3 = $key->no_fax_alternatif3;
			$no_fax_alternatif4 = $key->no_fax_alternatif4;
			$no_hp_utama = $key->no_hp_utama;
			$no_hp_alternatif1 = $key->no_hp_alternatif1;
			$no_hp_alternatif2 = $key->no_hp_alternatif2;
			$no_hp_alternatif3 = $key->no_hp_alternatif3;
			$no_hp_alternatif4 = $key->no_hp_alternatif4;
			$pin_bb_utama = $key->pin_bb_utama;
			$pin_bb_alternatif1 = $key->pin_bb_alternatif1;
			$pin_bb_alternatif2 = $key->pin_bb_alternatif2;
			$pin_bb_alternatif3 = $key->pin_bb_alternatif3;
			$pin_bb_alternatif4 = $key->pin_bb_alternatif4;
			$no_wa_utama = $key->no_wa_utama;
			$no_wa_alternatif1 = $key->no_wa_alternatif1;
			$no_wa_alternatif2 = $key->no_wa_alternatif2;
			$no_wa_alternatif3 = $key->no_wa_alternatif3;
			$no_wa_alternatif4 = $key->no_wa_alternatif4;
			$url_fb = $key->url_fb;
			$url_twitter = $key->url_twitter;
			$url_gplus = $key->url_gplus;
			$akun_skype = $key->akun_skype;
			$alamat = $key->alamat;
			$kode_pos = $key->kode_pos;
			$kota = $key->kota;
			$provinsi = $key->provinsi;
			$negara = $key->negara;
			$url_web_utama = $key->no_wa_utama;
			$url_web_alternatif1 = $key->url_web_alternatif1;
			$url_web_alternatif2 = $key->url_web_alternatif2;
			$url_web_alternatif3 = $key->url_web_alternatif3;
			$url_web_alternatif4 = $key->url_web_alternatif4;
		}
?>

		<form method="post" action="<?php echo base_url('panelIMS/psupport/update');?>">
		<input id='id_support' name='id_support' type='hidden' value="<?php echo $id_support;?>" />
			<div class='row' style='border-bottom:1px solid #ccc; margin-bottom:10px;'>
				<div class="form-group col-sm-6">
		            <label class="display-block text-semibold"><b>Tampil</b> </label>
		            <label class="radio-inline">
		                <input type="radio" name="tampil" class="styled" <?php if($tampil == 'ya'){ echo 'checked';} ?> value="ya"> Ya
		            </label>
		            <label class="radio-inline">
		                <input type="radio" name="tampil" class="styled" <?php if($tampil == 'tidak'){ echo 'checked';} ?> value="tidak"> Tidak
		            </label>
		        </div>
				<div class='form-group col-sm-6'>
					<label for='posisi'><b>Posisi</b></label>
					<div class='radio' id='posisi'>
						<label class='radio-inline'>
							<input type='radio' name='posisi' value='1 Kolom Kiri' <?php if($posisi == '1 Kolom Kiri'){ echo 'checked';} ?> autofocus/> 1-Kolom Kiri
						</label>
						<label class='radio-inline'>
							<input type='radio' name='posisi' value='2 Kolom Kanan' <?php if($posisi == '2 Kolom Kanan'){ echo 'checked';} ?>/> 2-Kolom Kanan
						</label>
					</div>
				</div>
				<div class='form-group col-sm-4'>
					<label for='urutan'><b>Nomor Urut</b></label>
					<input class='form-control' id='no_urut' name='no_urut' type='number' value="<?php echo $no_urut; ?>" max='99' min='1' placeholder='1'/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='instansi'><b>Instansi | Perusahaan</b></label>
					<input class='form-control' id='ints_perushaan' name='ints_perushaan' type='text' value="<?php echo $ints_perushaan; ?>" placeholder='badan usaha dan nama instansi'/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='instansi'><b>Nama Contact Person</b></label>
					<input class='form-control' id='nama' name='nama' type='text' value="<?php echo $nama; ?>" placeholder='nama contact person'/>
				</div>
			</div>
			<div class="alert bg-danger alert-right">
				<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
				<span class="text-semibold"><strong>Perhatian !</strong></span> Field email (minimal field Email Utama) wajib diisi sebagai tujuan email dari form hubungi kami dan keranjang belanja
			</div>
			<div class='row' style='border-bottom:1px solid #ccc; margin-bottom:10px;'>
				<div class='form-group col-sm-8'>
					<label for='email1'><b>Email Utama</b></label>
					<input class='form-control' id='email_utama' name='email_utama' type='email' value="<?php echo $email_utama; ?>"  placeholder='akun@domain.com'/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='email2'><b>Email Alternatif 1</b></label>
					<input class='form-control' id='email_alternatif1' name='email_alternatif1' type='email' value="<?php echo $email_alternatif1; ?>" placeholder='akun@domain.com' readonly/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='email3'><b>Email Alternatif 2</b></label>
					<input class='form-control' id='email_alternatif2' name='email_alternatif2' type='email' value="<?php echo $email_alternatif2; ?>" placeholder='akun@domain.com' readonly/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='email4'><b>Email Alternatif 3</b></label>
					<input class='form-control' id='email_alternatif3' name='email_alternatif3' type='email' value="<?php echo $email_alternatif3; ?>"placeholder='akun@domain.com' readonly/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='email5'><b>Email Alternatif 4</b></label>
					<input class='form-control' id='email_alternatif4' name='email_alternatif4' type='email' value="<?php echo $email_alternatif4; ?>" placeholder='akun@domain.com' readonly/>
				</div>
			</div>
			<div class='row' style='border-bottom:1px solid #ccc; margin-bottom:10px;'>
				<div class='form-group col-sm-8'>
					<label for='telp1'><b>Nomor Telepon Utama</b></label>
					<input class='form-control' id='no_telp_utama' name='no_telp_utama' type='tel' value="<?php echo $no_telp_utama; ?>" placeholder='(021) 111-1111'/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='telp2'><b>Nomor Telepon Alternatif 1</b></label>
					<input class='form-control' id='no_telp_alternatif1' name='no_telp_alternatif1' type='tel' value="<?php echo $no_telp_alternatif1; ?>" placeholder='(021) 111-1111' readonly/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='telp3'><b>Nomor Telepon Alternatif 2</b></label>
					<input class='form-control' id='no_telp_alternatif2' name='no_telp_alternatif2' type='tel' value="<?php echo $no_telp_alternatif2; ?>" placeholder='(021) 111-1111' readonly/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='telp4'><b>Nomor Telepon Alternatif 3</b></label>
					<input class='form-control' id='no_telp_alternatif3' name='no_telp_alternatif3' type='tel' value="<?php echo $no_telp_alternatif3; ?>" placeholder='(021) 111-1111' readonly/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='telp5'><b>Nomor Telepon Alternatif 4</b></label>
					<input class='form-control' id='no_telp_alternatif4' name='no_telp_alternatif4' type='tel' value="<?php echo $no_telp_alternatif4; ?>" placeholder='(021) 111-1111' readonly/>
				</div>
			</div>
			<div class='row' style='border-bottom:1px solid #ccc; margin-bottom:10px;'>
				<div class='form-group col-sm-8'>
					<label for='fax1'><b>Nomor Fax Utama</b></label>
					<input class='form-control' id='no_fax_utama' name='no_fax_utama' type='tel' value="<?php echo $no_fax_utama; ?>" placeholder='(021) 111-1111'/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='fax2'><b>Nomor Fax Alternatif 1</b></label>
					<input class='form-control' id='no_fax_alternatif1' name='no_fax_alternatif1' type='tel' value="<?php echo $no_fax_alternatif1; ?>" placeholder='(021) 111-1111' readonly/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='fax3'><b>Nomor Fax Alternatif 2</b></label>
					<input class='form-control'id='no_fax_alternatif2' name='no_fax_alternatif2' type='tel' value="<?php echo $no_fax_alternatif2; ?>" placeholder='(021) 111-1111' readonly/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='fax4'><b>Nomor Fax Alternatif 3</b></label>
					<input class='form-control' id='no_fax_alternatif3' name='no_fax_alternatif3' type='tel' value="<?php echo $no_fax_alternatif3; ?>" placeholder='(021) 111-1111' readonly/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='fax5'><b>Nomor Fax Alternatif 4</b></label>
					<input class='form-control'id='no_fax_alternatif4' name='no_fax_alternatif4' type='tel' value="<?php echo $no_fax_alternatif4; ?>" placeholder='(021) 111-1111' readonly/>
				</div>
			</div>
			<div class='row' style='border-bottom:1px solid #ccc; margin-bottom:10px;'>
				<div class='form-group col-sm-8'>
					<label for='hp1'><b>Nomor Ponsel Utama</b></label>
					<input class='form-control' id='no_hp_utama' name='no_hp_utama' type='tel' value="<?php echo $no_hp_utama; ?>" placeholder='0888-8888-8888'/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='hp2'><b>Nomor Ponsel Alternatif 1</b></label>
					<input class='form-control' id='no_hp_alternatif1' name='no_hp_alternatif1' type='tel' value="<?php echo $no_hp_alternatif1; ?>" placeholder='0888-8888-8888' readonly/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='hp3'><b>Nomor Ponsel Alternatif 2</b></label>
					<input class='form-control' id='no_hp_alternatif2' name='no_hp_alternatif2' type='tel' value="<?php echo $no_hp_alternatif2; ?>"placeholder='0888-8888-8888' readonly/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='hp4'><b>Nomor Ponsel Alternatif 3</b></label>
					<input class='form-control' id='no_hp_alternatif3' name='no_hp_alternatif3' type='tel' value="<?php echo $no_hp_alternatif3; ?>"placeholder='0888-8888-8888' readonly/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='hp5'><b>Nomor Ponsel Alternatif 4</b></label>
					<input class='form-control' id='no_hp_alternatif4' name='no_hp_alternatif4' type='tel' value="<?php echo $no_hp_alternatif4; ?>"placeholder='0888-8888-8888' readonly/>
				</div>
			</div>
			<div class='row' style='border-bottom:1px solid #ccc; margin-bottom:10px;'>
				<div class='form-group col-sm-8'>
					<label for='pinbb1'><b>Pin BB Utama</b></label>
					<input class='form-control' id='pin_bb_utama' name='pin_bb_utama' type='text' value="<?php echo $pin_bb_utama; ?>" placeholder='ABCD1234'/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='pinbb2'><b>Pin BB Alternatif 1</b></label>
					<input class='form-control' id='pin_bb_alternatif1' name='pin_bb_alternatif1' type='text' value="<?php echo $pin_bb_alternatif1; ?>" placeholder='ABCD1234' readonly/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='pinbb3'><b>Pin BB Alternatif 2</b></label>
					<input class='form-control' id='pin_bb_alternatif2' name='pin_bb_alternatif2' type='text' value="<?php echo $pin_bb_alternatif2; ?>"placeholder='ABCD1234' readonly/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='pinbb4'><b>Pin BB Alternatif 3</b></label>
					<input class='form-control' id='pin_bb_alternatif3' name='pin_bb_alternatif3' type='text' value="<?php echo $pin_bb_alternatif3; ?>" placeholder='ABCD1234' readonly/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='pinbb5'><b>Pin BB Alternatif 4</b></label>
					<input class='form-control' id='pin_bb_alternatif4' name='pin_bb_alternatif4' type='text' value="<?php echo $pin_bb_alternatif4; ?>" placeholder='ABCD1234' readonly/>
				</div>
			</div>
			<div class='row' style='border-bottom:1px solid #ccc; margin-bottom:10px;'>
				<div class='form-group col-sm-8'>
					<label for='wa1'><b>Nomor WhatsApp Utama</b></label>
					<input class='form-control' id='no_wa_utama' name='no_wa_utama' type='tel' value="<?php echo $no_wa_utama; ?>" placeholder='0888-8888-8888'/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='wa2'><b>Nomor WhatsApp Alternatif 1</b></label>
					<input class='form-control' id='no_wa_alternatif1' name='no_wa_alternatif1' type='tel' value="<?php echo $no_wa_alternatif1; ?>" placeholder='0888-8888-8888' readonly/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='wa3'><b>Nomor WhatsApp Alternatif 2</b></label>
					<input class='form-control' id='no_wa_alternatif2' name='no_wa_alternatif2' type='tel' value="<?php echo $no_wa_alternatif2; ?>" placeholder='0888-8888-8888' readonly/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='wa4'><b>Nomor WhatsApp Alternatif 3</b></label>
					<input class='form-control' id='no_wa_alternatif3' name='no_wa_alternatif3' type='tel' value="<?php echo $no_wa_alternatif3; ?>"placeholder='0888-8888-8888' readonly/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='wa5'><b>Nomor WhatsApp Alternatif 4</b></label>
					<input class='form-control' id='no_wa_alternatif4' name='no_wa_alternatif4' type='tel' value="<?php echo $no_wa_alternatif4; ?>" placeholder='0888-8888-8888' readonly/>
				</div>
			</div>
			<div class='row' style='border-bottom:1px solid #ccc; margin-bottom:10px;'>
				<div class='form-group col-sm-6'>
					<label for='facebook'><b>URL Facebook</b></label>
					<input class='form-control' id='url_fb' name='url_fb' type='url' value="<?php echo $url_fb; ?>" placeholder='https://www.facebook.com/userid'/>
				</div>
				<div class='form-group col-sm-6'>
					<label for='twitter'><b>URL Twitter</b></label>
					<input class='form-control' id='url_twitter' name='url_twitter' type='url' value="<?php echo $url_twitter; ?>" placeholder='https://twitter.com/userid'/>
				</div>
				<div class='form-group col-sm-6'>
					<label for='googleplus'><b>URL Google+</b></label>
					<input class='form-control' id='url_gplus' name='url_gplus' type='url' value="<?php echo $url_gplus; ?>" placeholder='https://plus.google.com/userid'/>
				</div>
				<div class='form-group col-sm-6'>
					<label for='skype'><b>Akun Skype</b></label>
					<input class='form-control' id='akun_skype' name='akun_skype' type='text' value="<?php echo $akun_skype; ?>"  placeholder='username'/>
				</div>
			</div>
			<div class='row' style='border-bottom:1px solid #ccc; margin-bottom:10px;'>
				<div class='form-group col-sm-4'>
					<label for='alamat'><b>Alamat</b></label>
					<textarea class='form-control' id='alamat' name='alamat' rows='4' placeholder='alamat lengkap instansi: jalan, nomor bangunan, rt/rw, kelurahan, kecamatan, dll'><?php echo $alamat; ?></textarea>
				</div>
				<div class='form-group col-sm-4'>
					<label for='kodepos'><b>Kodepos</b></label>
					<input class='form-control' id='kode_pos' name='kode_pos' type='text' value="<?php echo $kode_pos; ?>" placeholder='12345'/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='kota'><b>Kota</b></label>
					<input class='form-control' id='kota' name='kota' type='text' value="<?php echo $kota; ?>" placeholder='nama kota/kabupaten instansi'/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='propinsi'><b>Propinsi</b></label>
					<input class='form-control' id='provinsi' name='provinsi' type='text' value="<?php echo $provinsi; ?>"placeholder='nama propinsi instansi'/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='negara'><b>Negara</b></label>
					<input class='form-control' id='negara' name='negara' type='text' value="<?php echo $negara; ?>" placeholder='nama negara instansi'/>
				</div>
			</div>
			<div class='row'>
				<div class='form-group col-sm-8'>
					<label for='website1'><b>URL Website Utama</b></label>
					<input class='form-control' id='url_web_utama' name='url_web_utama' type='url' value="<?php echo $url_web_utama; ?>" placeholder='http://domain.com'/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='website2'><b>URL Website Alternatif 1</b></label>
					<input class='form-control' id='url_web_alternatif1' name='url_web_alternatif1' type='url' value="<?php echo $url_web_alternatif1; ?>" placeholder='http://domain.com' readonly/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='website3'><b>URL Website Alternatif 2</b></label>
					<input class='form-control' id='url_web_alternatif2' name='url_web_alternatif2' type='url' value="<?php echo $url_web_alternatif2; ?>" placeholder='http://domain.com' readonly/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='website4'><b>URL Website Alternatif 3</b></label>
					<input class='form-control' id='url_web_alternatif3' name='url_web_alternatif3' type='url' value="<?php echo $url_web_alternatif3; ?>" placeholder='http://domain.com' readonly/>
				</div>
				<div class='form-group col-sm-4'>
					<label for='website5'><b>URL Website Alternatif 4</b></label>
					<input class='form-control' id='url_web_alternatif4' name='url_web_alternatif4' type='url' value="<?php echo $url_web_alternatif4; ?>" placeholder='http://domain.com' readonly/>
				</div>
			</div>
			<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
			<button type='submit' name="submit" class="btn btn-primary">Save</button>
			<a href="<?php echo site_url('panelIMS/psupport') ?>" class="btn btn-success">Cancel</a>
			<input name='form' type='hidden' value='form-input-support'/>
		</form>
		  
