<?php
        foreach ($record->result() as $key) {
            $id_gambar   = $key->id_gambar;
            $hal_web     = $key->hal_web;
            $posisi     = $key->posisi;
            $gambar     = $key->gambar;
            $ket_gambar = $key->ket_gambar;
            $isi_teks    = $key->isi_teks;
            $link    = $key->link;
            $no_urut    = $key->no_urut;
            $tampil     = $key->tampil;
        }
?>

    <?php echo form_open_multipart('panelIMS/gambar/update');?>
    <input type="hidden" class="form-control" name="id_gambar" value="<?php echo $id_gambar;?>" required/>
        <div class="form-group">
            <div class="">
                <a href="" target="_blank"><img src="<?=base_url();?>assets/imgpicture/<?=$gambar;?>" style="width: 200px; height: 180px; margin-bottom: 5px;" class="img-rounded" alt=""></a>
            </div>
            <label for="gambar"><b>Upload File Gambar</b> </label>
            <input type="file" class="form-control" name="userfile"/>
        </div>
	    <div class="form-group">
            <label for="varchar"><b>Halaman Web</b> </label>
            <input type="text" class="form-control" name="hal_web" id="hal_web" placeholder="http://brajamarketindo.bisnislink.com/produk/1/nama-produk-anda" value="<?php echo $hal_web;?>" required />
        </div>
	    <div class="form-group">
            <label for="ket_gambar"><b>Img Alt</b> </label>
            <input type="text" class="form-control" name="ket_gambar" id="ket_gambar" placeholder="Teks Alternatif Ketika Gambar Tidak Bisa Dibuka diBrowser (Bisa DiPakai Untuk SEO)" value="<?php echo $ket_gambar;?>"/>
        </div>
	    <div class="form-group">
            <label for="deskripsi"><b>Isi Teks Pada Gambar (Boleh tidak di isi)</b> </label>
            <textarea class="ckeditor" id="ckedtor" name="isi_teks" placeholder="Isi Teks" required ><?php echo $isi_teks;?></textarea >
        </div>
        <div class="form-group">
            <label for="link"><b>Link ketika Gambar Diklik (Boleh tidak diisi)</b> </label>
            <input type="text" class="form-control" name="link" id="link" placeholder="http://www.domain.com/section" value="<?php echo $link;?>" />
        </div>
        <div class="form-group">
            <label class="display-block text-semibold"><b>Posisi</b> </label>
            <label class="radio-inline">
                <input type="radio" name="posisi" class="styled" value="bebas" <?php if($posisi == 'bebas'){ echo 'checked';} ?>> 0-Gambar Bebas
            </label>
            <label class="radio-inline">
                <input type="radio" name="posisi" class="styled" value="slinder" <?php if($posisi == 'slinder'){ echo 'checked';} ?>> 1-Gambar Slinder
            </label>
            <label class="radio-inline">
                <input type="radio" name="posisi" class="styled" value="kolom_kiri" <?php if($posisi == 'kolom_kiri'){ echo 'checked';} ?>> 2-Banner Kolom Kiri
            </label>
            <label class="radio-inline">
                <input type="radio" name="posisi" class="styled" value="kolom_kanan" <?php if($posisi == 'kolom_kanan'){ echo 'checked';} ?>> 3-Banner Kolom Kanan
            </label>
            <label class="radio-inline">
                <input type="radio" name="posisi" class="styled" value="pop_up" <?php if($posisi == 'pop_up'){ echo 'checked';} ?>> 4-Gambar Pop Up
            </label>
        </div>
	    <div class="form-group">
            <label for="int"><b>No Urut</b> </label>
            <input id='no_urut' name='no_urut' type='number' value="<?php echo $no_urut;?>" min='1' class="form-control" max='99' placeholder="No Urut" required />
        </div> 
        <div class="form-group">
            <label class="display-block text-semibold"><b>Tampil</b> </label>
            <label class="radio-inline">
                <input type="radio" name="tampil" class="styled" <?php if($tampil == 'ya'){ echo 'checked';} ?> value="ya"> Ya
            </label>
            <label class="radio-inline">
                <input type="radio" name="tampil" class="styled" <?php if($tampil == 'tidak'){ echo 'checked';} ?> value="tidak"> Tidak
            </label>
        </div>
        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
	    <input type="submit" class="btn btn-primary" value="Save">
	    <a href="<?php echo site_url('panelIMS/gambar') ?>" class="btn btn-success">Cancel</a>
	</form>

    