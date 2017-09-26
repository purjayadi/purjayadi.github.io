
    <?php echo form_open_multipart('panelIMS/artikel/simpan');?>
	    <div class="form-group">
            <label for="varchar"><b>Judul Artikel</b> </label>
            <input type="text" class="form-control" name="judul_artikel" id="judul_artikel" placeholder="Judul Artikel" required />
        </div>
        <div class="form-group">
            <label for="gambar"><b>Gambar</b> </label>
            <input type="file" class="form-control" name="userfile" required/>
        </div>
	    <div class="form-group">
            <label for="ket_gambar"><b>Img Alt</b> </label>
            <input type="text" class="form-control" name="ket_gambar" id="ket_gambar" placeholder="Teks Alternatif Ketika Gambar Tidak Bisa Dibuka diBrowser (Bisa DiPakai Untuk SEO)" />
        </div>
	    <div class="form-group">
            <label for="deskripsi"><b>Isi Konten</b> </label>
            <textarea class="ckeditor" id="ckedtor" name="kontent" placeholder="Kontent" required ></textarea >
        </div>
	    <div class="form-group">
            <label for="int"><b>No Urut</b> </label>
            <input id='no_urut' name='no_urut' type='number' value='' min='1' class="form-control" max='99' placeholder="No Urut" required />
        </div> 
        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
	    <input type="submit" class="btn btn-primary" value="Save">
	    <a href="<?php echo site_url('panelIMS/artikel') ?>" class="btn btn-success">Cancel</a>
	</form>