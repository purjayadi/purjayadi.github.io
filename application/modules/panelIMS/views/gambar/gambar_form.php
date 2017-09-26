
    <?php echo form_open_multipart('panelIMS/gambar/simpan');?>
        <div class="form-group">
            <label for="gambar"><b>Upload File Gambar</b> </label>
            <input type="file" class="form-control" name="userfile" required/>
        </div>
	    <div class="form-group">
            <label for="varchar"><b>Halaman Web</b> </label>
            <input type="text" class="form-control" name="hal_web" id="hal_web" placeholder="http://brajamarketindo.bisnislink.com/produk/1/nama-produk-anda" required />
        </div>
	    <div class="form-group">
            <label for="ket_gambar"><b>Img Alt</b> </label>
            <input type="text" class="form-control" name="ket_gambar" id="ket_gambar" placeholder="Teks Alternatif Ketika Gambar Tidak Bisa Dibuka diBrowser (Bisa DiPakai Untuk SEO)" />
        </div>
	    <div class="form-group">
            <label for="deskripsi"><b>Isi Teks Pada Gambar (Boleh tidak di isi)</b> </label>
            <textarea class="ckeditor" id="ckedtor" name="isi_teks" placeholder="Isi Teks" required ></textarea >
        </div>
        <div class="form-group">
            <label for="link"><b>Link ketika Gambar Diklik (Boleh tidak diisi)</b> </label>
            <input type="text" class="form-control" name="link" id="link" placeholder="http://www.domain.com/section" />
        </div>
        <div class="form-group">
            <label class="display-block text-semibold">Posisi </label>
            <label class="radio-inline">
                <input type="radio" name="posisi" class="styled" value="atas"> 0-Gambar Bebas
            </label>
            <label class="radio-inline">
                <input type="radio" name="posisi" class="styled" value="slinder"> 1-Gambar Slinder
            </label>
            <label class="radio-inline">
                <input type="radio" name="posisi" class="styled" value="kolom_kiri"> 2-Banner Kolom Kiri
            </label>
            <label class="radio-inline">
                <input type="radio" name="posisi" class="styled" value="kolom_kanan"> 3-Banner Kolom Kanan
            </label>
            <label class="radio-inline">
                <input type="radio" name="posisi" class="styled" value="pop_up"> 4-Gambar Pop Up
            </label>
        </div>
	    <div class="form-group">
            <label for="int"><b>No Urut</b> </label>
            <input id='no_urut' name='no_urut' type='number' value='' min='1' class="form-control" max='99' placeholder="No Urut" required />
        </div> 
        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
	    <input type="submit" class="btn btn-primary" value="Save">
	    <a href="<?php echo site_url('panelIMS/gambar') ?>" class="btn btn-success">Cancel</a>
	</form>

    