<script src='<?php echo base_url('ckeditor/ckeditor.js');?>'></script>
		<form method='post' action="<?php echo base_url('panelIMS/p_artikel/s_artikel');?>">
			<div class='form-group'>
				<label for='posisi'><b>Posisi</b></label>
				<select id='posisi' name='posisi' class="form-control" autofocus required>
					<option disabled selected>Pilih Posisi Menu dimana Artikel akan Ditampilkan</option>
					<option value='0'>0 - Homepage</option>
					<option value='1'>1 - Halaman Kategori</option>
					<option value='2'>2 - Halaman Produk</option>
					<option value='3'>3 - Halaman Artikel</option>
					<option value='4'>4 - Halaman Hubungi Kami</option>
				</select>
			</div>
			<div class='form-group'>
				<label for='id'><b>ID</b></label>
					<select name="id_produk" class="form-control">
						<option disabled selected>Pilih ID Produk</option>
						<?php
							$produk = $this->db->query("SELECT * FROM produk");
							foreach ($produk->result() as $key) {
						?>
						<option value="<?php echo $key->id_produk; ?>"><?php echo $key->id_produk;?></option>
						<?php
							}
						?>
					</select>
			</div>
			<div class='form-group'>
				<label for='judul'><b>Judul Artikel</b></label>
				<input id='judul' name='judul_artikel' type='text' placeholder='Judul Artikel' class="form-control" required/>
			</div>
			<div class='form-group'>
				<label for='isi'><b>Ringkasan Artikel</b></label>
				<textarea id='ringkasan_artikel' name='ringkasan_artikel' rows='4' class="form-control" required></textarea>
			</div>
			<div class='form-group'>
				<label for='isi_full'><b>Konten Artikel Lengkap</b></label>
				<textarea class='ckeditor' id='konteks_artikel' name='konteks_artikel' class="form-control"></textarea>
			</div>
			<button type='submit' class="btn btn-primary btn-sm" name="submit">Save</button>
			<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
			<a class="btn btn-success btn-sm" href="<?php echo base_url('panelIMS/p_artikel');?>">Cancel</a>
			<input name='form' type='hidden' value='form-input-1000-artikel'/>
		</form>