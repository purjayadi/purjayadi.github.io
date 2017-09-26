<?php if ($this->session->flashdata('info')): ?>
<div class="alert bg-success alert-right">
    <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
    <span class="text-semibold"><?php echo $this->session->flashdata('info');?></span>
</div>
<?php endif; ?>

<form method='post' action="<?php echo base_url('panelIMS/Pdasar/simpan');?>">
	<div class='row'>
		<div class='form-group col-sm-12'>
			<label for='webtype'><b>Jenis | Tipe Website</b></label>
			<div class='radio' id='webtype'>
				<label class='radio-inline'>
					<input type='radio' name='jenis_web' value='web profile' /> <span class='glyphicon glyphicon-user'></span> <b>Web Profil | Katalog Online</b>
				</label>
				<label class='radio-inline'>
					<input type='radio' name='jenis_web' value='toko online' /> <span class='glyphicon glyphicon-shopping-cart'></span> <b>Online Shop | Toko Online | e-Commerce</b>
				</label>
			</div>
		</div>
	</div>
	<div class='row'>
		<div class='form-group col-sm-6'>
			<label for='max_h_d_slider'><b>Maksimum Tinggi Slider di Tampilan Desktop/PC</b></label>
			<div class='input-group'>
				<input id='m_desktop' name='m_desktop' type='number' value='500' min='50' max='1000' placeholder='500' required class="form-control" /><span class='input-group-addon'>px</span>
			</div>
		</div>
		<div class='form-group col-sm-6'>
			<label for='max_h_h_slider'><b>Maksimum Tinggi Slider di Tampilan Handphone/Ponsel</b></label>
			<div class='input-group'>
				<input id='m_phone' name='m_phone' type='number' value='250' min='50' max='1000' placeholder='250' required class="form-control" /><span class='input-group-addon'>px</span>
			</div>
		</div>
	</div>
	<div class='row'>
		<div class='form-group col-sm-6'>
			<label for='n_cols'><b>Jumlah Kolom Inti (Tampilan pada Desktop)</b></label>
			<div class='radio' id='jml_kdesktop'>
				<label class='radio-inline'>
					<input type='radio' name='jml_kdesktop' value='2' />
					<span style='background: #ccc; border-bottom:1px solid #666; border-left:1px solid #666; border-top:1px solid #666;'>&nbsp;</span><span style='border:1px solid #666'>&nbsp;&nbsp;&nbsp;&nbsp;</span> 2 Kolom Inti
				</label>
				<label class='radio-inline'>
					<input type='radio' name='jml_kdesktop' value='3' checked/>
					<span style='background: #ccc; border-bottom:1px solid #666; border-left:1px solid #666; border-top:1px solid #666;'>&nbsp;</span><span style='border:1px solid #666'>&nbsp;&nbsp;&nbsp;</span><span style='background: #ccc; border-bottom:1px solid #666; border-right:1px solid #666; border-top:1px solid #666;'>&nbsp;</span> 3 Kolom Inti
				</label>
			</div>
		</div>
		<div class='form-group col-sm-6'>
			<label for='dis_pro'><b>Tampilan Kelompok Produk di Homepage dan Halaman Kategori</b></label>
			<div class='radio' id='dis_pro'>
				<label class='radio-inline'>
					<input type='radio' name='tamp_kproduk' value='list' /> <span class='glyphicon glyphicon-list'></span> List 
				</label>
				<label class='radio-inline'>
					<input type='radio' name='tamp_kproduk' value='kolom' checked/> <span class='glyphicon glyphicon-th'></span> Kolom
				</label>
			</div>
		</div>
	</div>
	<div class='row'>
		<div class='form-group col-sm-6'>
			<label for='max_pro_home'><b>Maksimum Produk yang Ditampilkan di Homepage</b></label>
			<input id='m_produk_h' name='m_produk_h' type='number' value='12' aria-describedby='help_pro_home' min='1' max='1000' placeholder='12' class="form-control" required />
			<span id='help_pro_home' class='help-block'><b>untuk tampilan kolom, diusahakan kelipatan dari 2 dan 3 (6, 12, 18, 24, 30, ...)</b></span>
		</div>
		<div class='form-group col-sm-6'>
			<label for='max_art_home'><b>Maksimum Artikel yang Ditampilkan di Homepage</b></label>
			<input id='m_artikel_h' name='m_artikel_h' type='number' value='5' min='1' max='1000' placeholder='5' class="form-control" required/>
		</div>
	</div>
	<div class='row'>
		<div class='form-group col-sm-3'>
			<label for='max_pro_pp'><b>Maksimum Produk yang Ditampilkan per Halaman di Halaman Kategori</b></label>
			<input id='m_pro_kategori' name='m_pro_kategori' type='number' value='30' aria-describedby='help_pro_pp' min='1' max='1000' placeholder='30' class="form-control" required/>
			<span id='help_pro_pp' class='help-block'><b>untuk tampilan kolom, diusahakan kelipatan dari 2 dan 3 (6, 12, 18, 24, ...)</b></span>
		</div>
		<div class='form-group col-sm-3'>
			<label for='max_art_pp'><b>Maksimum Artikel yang Ditampilkan per Halaman di Halaman Artikel</b></label>
			<input id='m_art_artikel' name='m_art_artikel' type='number' value='20' min='1' max='1000' placeholder='20' class="form-control" required/>
		</div>
		<div class='form-group col-sm-3'>
			<label for='max_1000_pp'><b>Maksimum Artikel yang Ditampilkan per Halaman di Halaman 1000 Artikel</b></label>
			<input id='m_art_h' name='m_art_h' type='number' value='50' min='1' max='1000' placeholder='100' class="form-control" required/>
		</div>
		<div class='form-group col-sm-3'>
			<label for='max_tag_pp'><b>Maksimum Tag yang Ditampilkan per Halaman di Halaman Produk</b></label>
			<input id='m_tag' name='m_tag' type='number' value='4' min='1' max='1000' placeholder='4' class="form-control" required/>
		</div>
	</div>
	<div class='row'>
		<div class='form-group col-sm-12'>
			<label for='max_pro_pop'><b>Maksimum Produk yang Ditampilkan pada Kolom Produk Terpopuler</b></label>
			<input id='m_produk_pop' name='m_produk_pop' type='number' value='10' min='1' max='1000' placeholder='10' class="form-control" required/>
		</div>
	</div>
	<div class='row'>
		<div class='form-group col-sm-12'>
			<label for='max_h_footer'><b>Maksimum Tinggi Footer</b></label>
			<div class='input-group'>
				<input id='m_footer' name='m_footer' type='number' value='250' min='1' max='1000' placeholder='250' class="form-control" required/><span class='input-group-addon'>px</span>
			</div>
		</div>
	</div>
	<div class='row'>
		<div class='form-group col-sm-12'>
			<label for='max_adm_pp'><b>Maksimum Data yang Ditampilkan per Halaman pada Adminpanel</b></label>
			<input id='m_data' name='m_data' type='number' value='20' min='1' max='1000' placeholder='20' class="form-control" required/>
		</div>
	</div>
	<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
	<button type='submit' class="btn btn-primary" name="submit">Save</button>
	<a href="<?php echo site_url('panelIMS/pdasar') ?>" class="btn btn-success">Cancel</a>
	<input name='form' type='hidden' value='form-pengaturan-dasar'/>
</form>