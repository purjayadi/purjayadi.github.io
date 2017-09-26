<?php
     foreach ($record->result() as $key) {
         $id_ppage    = $key->id_ppage;
         $kontent_link    = $key->kontent_link;
         $hal_web    = $key->hal_web;
     }
?>


    <?php echo form_open_multipart('panelIMS/lpage/update');?>
	    <input type="hidden" name="id_ppage" value="<?php echo $id_ppage;?>" />
	    <div class="form-group">
            <label for="script_widget"><b>Halaman Web</b>  </label>
            <input type="text" class="form-control" id="hal_web" name="hal_web" value="<?php echo $hal_web; ?>" placeholder="http://www.brajamarketindo.bisnislink.com/produk/1/nama-produk-anda" cols="4" rows="4" required />
        </div>
        
	    <div class="form-group">
            <label class="display-block text-semibold"><b>Konten Link</b> </label>
            <textarea class="form-control" id="kontent_link" name="kontent_link" placeholder="<a href='http://www.brajamarketindo.bisnislink.com/produk/1/nama-produk-anda'>Kata Kunci Pilihan</a>" cols="4" rows="10" required ><?php echo $kontent_link; ?></textarea>
        </div>
        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
	    <input type="submit" class="btn btn-primary" value="Save">
	    <a href="<?php echo site_url('panelIMS/lpage') ?>" class="btn btn-success">Cancel</a>
	</form>