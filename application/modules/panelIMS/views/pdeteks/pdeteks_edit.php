<?php
        foreach ($record->result() as $key) {
            $id_dekorteks = $key->id_dekorteks;
            $teks = $key->teks;
            $dekorasi = $key->dekorasi;
        }
?>

    <?php echo form_open_multipart('panelIMS/pdeteks/update');?>
	    <input class="form-control" id="id_dekorteks" name="id_dekorteks" type="hidden" value="<?php echo $id_dekorteks; ?>" />
	    <div class="form-group">
            <label for="script_widget"><b>Teks</b>  </label>
            <input class="form-control" id="teks" name="teks" value="<?php echo $teks; ?>" placeholder="Teks Yang Akan Didekorasi" />
        </div>
        
	    <div class="form-group">
            <label class="display-block text-semibold"><b>Dekorasi</b> </label>
            <label class="radio-inline">
                <input type="radio" name="dekorasi" class="styled" value="b" <?php if($dekorasi == 'b'){ echo 'checked';} ?>><b> Cetak Tebal</b>
            </label>
            <label class="radio-inline">
                <input type="radio" name="dekorasi" class="styled" value="i" <?php if($dekorasi == 'i'){ echo 'checked';} ?>><i> Garis Miring</i>
            </label>
            <label class="radio-inline">
                <input type="radio" name="dekorasi" class="styled" value="u" <?php if($dekorasi == 'u'){ echo 'checked';} ?>><u> Garis Bawah</u>
            </label>
        </div>
        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
	    <input type="submit" class="btn btn-primary" value="Save">
	    <a href="<?php echo site_url('panelIMS/pdeteks') ?>" class="btn btn-success">Cancel</a>
	</form>