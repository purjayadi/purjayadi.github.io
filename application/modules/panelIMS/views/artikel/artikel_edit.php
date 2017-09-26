
<?php
        foreach ($record->result() as $key) {
            $id_artikel    = $key->id_artikel;
            $judul_artikel  = $key->judul_artikel;
            //$posisi     = $key->posisi;
            $gambar     = $key->gambar;
            $ket_gambar = $key->ket_gambar;
            $kontent    = $key->kontent;
            $no_urut    = $key->no_urut;
            $tampil     = $key->tampil;
        }
?>

    <?php echo form_open_multipart('panelIMS/artikel/update');?>
	    <div class="form-group">
            <label for="varchar"><b>Judul Artikel</b> </label>
            <input type="text" class="form-control" name="judul_artikel" id="judul_artikel" value="<?php echo $judul_artikel;?>" placeholder="Judul Artikel" required/>
        </div>
        <div class="form-group">
            <!-- <label class="control-label col-lg-2"></label> -->
            <div class="">
                <a href="" target="_blank"><img src="<?=base_url();?>assets/imgartikel/<?=$gambar;?>" style="width: 200px; height: 180px; margin-bottom: 5px;" class="img-rounded" alt=""></a>
            </div>
            <label for="gambar"><b>Gambar</b> </label>
            <input type="file" class="form-control" name="userfile" />
        </div>
	    <div class="form-group">
            <label for="ket_gambar"><b>Img Alt</b> </label>
            <input type="text" class="form-control" name="ket_gambar" id="ket_gambar" value="<?php echo $ket_gambar;?>" placeholder="Teks Alternatif Ketika Gambar Tidak Bisa Dibuka diBrowser (Bisa DiPakai Untuk SEO)" />
        </div>
	    <div class="form-group">
            <label for="deskripsi"><b>Isi Konten</b> </label>
            <textarea class="ckeditor" id="ckedtor" name="kontent" id="kontent" placeholder="Konten" required ><?php echo $kontent;?></textarea>
        </div>
	    <div class="form-group">
            <label for="int"><b>No Urut</b> </label>
            <input id='no_urut' name='no_urut' type='number' value="<?php echo $no_urut;?>" min='1' class="form-control" max='99' placeholder="No Urut" required/>
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
        <input type="hidden" name="id_artikel" value="<?php echo $id_artikel;?>" />
	    <input type="submit" class="btn btn-primary" value="Save">
	    <a href="<?php echo site_url('panelIMS/artikel') ?>" class="btn btn-success">Cancel</a>
	</form>