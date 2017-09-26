<?php if ($this->session->flashdata('info')): ?>
<div class="alert bg-success alert-right">
    <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
    <span class="text-semibold"><?php echo $this->session->flashdata('info');?></span>
</div>
<?php endif; ?>

<form method='post' action="<?php echo base_url('panelIMS/psauto/simpan');?>">
	<div class='row'>
		<div class='form-group col-sm-6'>
			<label for='max_h_d_slider'><b>Jumlah Data Setiap Posting</b></label>
			<div class='input-group'>
				<input id='jml_data' name='jml_data' type='number' value='' min='1' max='10' placeholder='5' class="form-control" required/><span class='input-group-addon'>Data</span>
			</div>
		</div>
		<div class='form-group col-sm-6'>
			<label for='max_h_h_slider'><b>Autopost Setiap</b></label>
			<div class='input-group'>
				<input id='autopost_m' name='autopost_m' type='number' value='' min='60' max='1000' placeholder='2016-10-01 00:00:00' class="form-control" required/><span class='input-group-addon'>Menit</span>
			</div>
		</div>
	</div>
	<div class='row'>
		<div class='form-group col-sm-6'>
			<label for='max_pro_home'><b>Waktu Mulai Posting</b></label>
			<input id='waktu_mulai' name='waktu_mulai' type='text' value='' min='1' max='1000' placeholder='2016-10-01 00:00:00' class="form-control" required/>
			<span id='help_pro_home' class='help-block'>Contoh : 2016-10-01 00:00</span>
		</div>
		<div class='form-group col-sm-6'>
			<label for='max_art_home'><b>Waktu Terakhir Posting</b></label>
			<input id='post_terakhir' name='post_terakhir' type='text' value='' min='1' max='1000' placeholder='2016-10-01 00:00:00' class="form-control" required/>
	    <span id='help_pro_home' class='help-block'>Contoh : 2017-10-01 00:00</span>
  	</div>
	</div>
	<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
	<button type='submit' class="btn btn-primary" name="submit">Save</button>
	<a href="<?php echo site_url('panelIMS/psauto') ?>" class="btn btn-success">Cancel</a>
	<input name='form' type='hidden' value='form-autopost'/>
	<input type=hidden name='idnya' value="" />
</form>