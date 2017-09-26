<?php
        foreach ($record->result() as $key) {
            $id_css = $key->id_css;
            $kontent = $key->kontent;
            $no_urut = $key->no_urut;
            $tampil = $key->tampil;
        }
?>


<div class="alert bg-primary alert-right">
    <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
    <span class="text-semibold">Info!</span> Khusus untuk embed youtube dan google maps lebar css akan secara otomatis mengikuti lebar kolom kiri dan kanan website
</div>

    <?php echo form_open_multipart('panelIMS/pcss/update');?>
	    <input class="form-control" id="id_css" name="id_css" type="hidden" value="<?php echo $id_css; ?>" />
	    <div class="form-group">
            <label for="script_widget"><b>Konten</b>  </label>
            <textarea class="form-control" id="kontent" name="kontent" rows="4" cols="4"><?php echo $kontent; ?></textarea>
        </div>
        <div class="form-group">
            <label for="int"><b>No Urut</b> </label>
            <input id='no_urut' name='no_urut' type='number' value="<?php echo $no_urut; ?>" min='1' class="form-control" max='99' placeholder="No Urut" required/>
        </div>
	    <div class="form-group">
            <label class="display-block text-semibold"><b>Tampil</b> </label>
            <label class="radio-inline">
                <input class="form-contorl" type="radio" name="tampil" class="styled" <?php if($tampil == 'ya'){ echo 'checked';} ?> value="ya"> Ya
            </label>
            <label class="radio-inline">
                <input class="form-contorl" type="radio" name="tampil" class="styled" <?php if($tampil == 'tidak'){ echo 'checked';} ?> value="tidak"> Tidak
            </label>
        </div>
        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
	    <input type="submit" class="btn btn-primary" value="Save">
	    <a href="<?php echo site_url('panelIMS/pcss') ?>" class="btn btn-success">Cancel</a>
	</form>
