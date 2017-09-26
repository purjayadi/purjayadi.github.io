
    <?php echo form_open_multipart('panelIMS/menu/simpan');?>
	    <div class="form-group">
            <label for="varchar"><b>Nama Menu</b> </label>
            <input type="text" class="form-control" name="nama_menu" id="nama_menu" placeholder="Nama Menu" required />
        </div>
	    
        <div class="form-group">
            <label class="display-block text-semibold"><b>Posisi</b> </label>
            <label class="radio-inline">
                <input type="radio" name="posisi" class="styled" value="atas"> 1-Menu Atas Slider
            </label>
            <label class="radio-inline">
                <input type="radio" name="posisi" class="styled" value="bawah"> 2-Menu Atas Slider
            </label>
        </div>

	    <div class="form-group">
            <label for="longblob"><b>Gambar</b> </label>
            <input type="file" class="form-control" name="userfile" required/>
        </div>
	    <div class="form-group">
            <label for="ket_gambar"><b>Img Alt</b> </label>
            <input type="text" class="form-control" name="ket_gambar" id="ket_gambar" placeholder="Teks Alternatif Ketika Gambar Tidak Bisa Dibuka diBrowser (Bisa DiPakai Untuk SEO)" />
        </div>
	    <div class="form-group">
            <label for="kontent"><b>Isi Konten</b> </label>
            <textarea name="kontent" class="ckeditor" id="ckedtor" placeholder="Konten" rows="4" cols="4" required ></textarea>
        </div>
	    <div class="form-group">
            <label for="int"><b>No Urut</b> </label>
            <input id='no_urut' name='no_urut' type='number' value='' min='1' class="form-control" max='99' placeholder="No Urut" required/>
        </div>
        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
	    <input type="submit" name="submit" value="Save" class="btn btn-primary">
	    <a href="<?php echo site_url('panelIMS/menu') ?>" class="btn btn-success">Cancel</a>
	</form>