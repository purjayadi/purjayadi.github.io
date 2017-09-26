
    <?php echo form_open_multipart('panelIMS/pdeteks/simpan');?>
	    
	    <div class="form-group">
            <label for="script_widget"><b>Teks</b>  </label>
            <input class="form-control" id="teks" name="teks" placeholder="Teks Yang Akan Didekorasi" cols="4" rows="4" required />
        </div>
        
	    <div class="form-group">
            <label class="display-block text-semibold"><b>Dekorasi</b> </label>
            <label class="radio-inline">
                <input type="radio" name="dekorasi" class="styled" value="b"><b> Cetak Tebal</b>
            </label>
            <label class="radio-inline">
                <input type="radio" name="dekorasi" class="styled" value="i"><i> Garis Miring</i>
            </label>
            <label class="radio-inline">
                <input type="radio" name="dekorasi" class="styled" value="u"><u> Garis Bawah</u>
            </label>
        </div>
        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
	    <input type="submit" class="btn btn-primary" value="Save">
	    <a href="<?php echo site_url('panelIMS/pdeteks') ?>" class="btn btn-success">Cancel</a>
	</form>