<?php
        foreach ($record->result() as $key) {
            $id_meta_seo = $key->id_meta_seo;
            $judul       = $key->judul;
            $deskripsi   = $key->deskripsi;
            $keyword     = $key->keyword;
            $google_ver  = $key->google_ver;
        }
?>

    <?php echo form_open_multipart('panelIMS/pmseo/update');?>
	    <input class="form-control" id="id_meta_seo" name="id_meta_seo" type="hidden" value="<?php echo $id_meta_seo; ?>" />
	    <div class="form-group">
            <label for="script_widget"><b>Judul</b>  </label>
            <input class="form-control" id="judul" name="judul" value="<?php echo $judul; ?>" placeholder="Judul" />
        </div>

        <div class="form-group">
            <label for="script_widget"><b>Deskripsi</b>  </label>
            <input class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $deskripsi; ?>" placeholder="Deskripsi" />
        </div>

        <div class="form-group">
            <label for="script_widget"><b>Keyword</b>  </label>
            <input class="form-control" id="keyword" name="keyword" value="<?php echo $keyword; ?>" placeholder="Keyword" />
        </div>

        <div class="form-group">
            <label for="script_widget"><b>Google Verifikasi</b>  </label>
            <input class="form-control" id="google_ver" name="google_ver" value="<?php echo $google_ver; ?>" placeholder="Google Verifikasi" />
        </div>
        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
	    <input type="submit" class="btn btn-primary" value="Save">
	    <a href="<?php echo site_url('panelIMS/pmseo') ?>" class="btn btn-success">Cancel</a>
	</form>