
<div class="alert bg-primary alert-right">
	<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
	<span class="text-semibold">Info!</span> Pilihlah warna yang cukup kontras antara background dengan font (teks).
</div>

<form method='post' name='warna' action="">
	<div class='form-group'>
		<input id='bg_utama' name='bg_utama' type='color' value='#aeffae'/>
		<label for='bg_utama'><b> Warna Background Dasar</b></label>
	</div>
	<div class='form-group'>
		<input id='bg_dominan' name='bg_dominan' type='color' value='#008000'/>
		<label for='bg_dominan'><b> Warna Background Dominan</b></label>
	</div>
	<div class='form-group'>
		<input id='font_dominan' name='font_dominan' type='color' value='#ffffff'/>
		<label for='font_dominan'><b> Warna Font Dominan</b></label>
	</div>
	<div class='form-group'>
		<input id='bg_menu_aktif' name='bg_menu_aktif' type='color' value='#008000'/>
		<label for='bg_menu_aktif'><b> Warna Background Menu Aktif</b></label>
	</div>
	<div class='form-group'>
		<input id='font_menu_aktif' name='font_menu_aktif' type='color' value='#ffffff'/>
		<label for='font_menu_aktif'><b> Warna Font Menu Aktif</b></label>
	</div>
	<div class='form-group'>
		<input id='bg_footer' name='bg_footer' type='color' value='#008000'/>
		<label for='bg_footer'><b> Warna Background Footer</b></label>
	</div>
	<div class='form-group'>
		<input id='font_footer' name='font_footer' type='color' value='#ffffff'/>
		<label for='font_footer'><b> Warna Font Footer</b></label>
	</div>
	<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
  	<button type='submit' class="btn btn-primary">Save</button>
	<button type='reset' class="btn btn-success">Reset</button>
	<input name='form' type='hidden' value='form-warna1'/>
	<input name='idw' type='hidden' value='320'>
</form>

<br><br>