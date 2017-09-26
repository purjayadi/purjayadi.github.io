<?php
     foreach ($record->result() as $key) {
         $id_bheader    = $key->id_bheader;
         $kontent    = $key->kontent;
         $tampil    = $key->tampil;
     }
?>


    <?php echo form_open_multipart('panelIMS/bheader/update');?>
	    <input type="hidden" name="id_bheader" value="<?php echo $id_bheader;?>" />
	    <div class="form-group">
            <label for="script_widget"><b>Konten</b>  </label>
            <textarea class="form-control" id="kontent" name="kontent" placeholder="Isi Konten" cols="4" rows="4" required ><?php echo $kontent; ?></textarea >
        </div>
        
	    <div class="form-group">
            <label class="display-block text-semibold"><b>Tampil</b> </label>
            <label class="radio-inline">
                <input type="radio" name="tampil" class="styled" value="ya" <?php if($tampil == 'ya'){ echo 'checked';} ?>> Ya
            </label>
            <label class="radio-inline">
                <input type="radio" name="tampil" class="styled" value="tidak" <?php if($tampil == 'tidak'){ echo 'checked';} ?>> Tidak
            </label>
        </div>
        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
	    <input type="submit" class="btn btn-primary" value="Save">
	    <a href="<?php echo site_url('panelIMS/bheader') ?>" class="btn btn-success">Cancel</a>
	</form>