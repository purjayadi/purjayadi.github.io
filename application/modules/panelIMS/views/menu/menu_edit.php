<?php
        foreach ($record->result() as $key) {
            $id_menu    = $key->id_menu;
            $nama_menu  = $key->nama_menu;
            $posisi     = $key->posisi;
            $gambar     = $key->gambar;
            $ket_gambar = $key->ket_gambar;
            $kontent    = $key->kontent;
            $no_urut    = $key->no_urut;
            $tampil     = $key->tampil;
            $gambar     = $key->gambar;
        }
?>

    <?php echo form_open_multipart('panelIMS/menu/update');?>
	    <div class="form-group">
            <label for="varchar"><b>Nama Menu </b></label>
            <input type="text" class="form-control" name="nama_menu" id="nama_menu" value="<?php echo $nama_menu;?>" placeholder="Nama Menu" required/>
        </div>
	    
        <div class="form-group">
            <label class="display-block text-semibold"><b>Posisi</b> </label>
            <label class="radio-inline">
                <input type="radio" name="posisi" class="styled" value="atas" <?php if($posisi == 'atas'){ echo 'checked';} ?>> 1-Menu Atas Slider
            </label>
            <label class="radio-inline">
                <input type="radio" name="posisi" class="styled" value="bawah" <?php if($posisi == 'bawah'){ echo 'checked';} ?>> 2-Menu Atas Slider
            </label>
        </div>

	    <div class="form-group">
            <div class="">
                <a href="" target="_blank"><img src="<?=base_url();?>assets/imgmenu/<?=$gambar;?>" style="width: 200px; height: 180px; margin-bottom: 5px;" class="img-rounded" alt=""></a>
            </div>
            <label for="longblob"><b>Gambar</b> </label>
            <input type="file" class="form-control" name="userfile" class="text-center center-block well well-sm" id="files" accept="image/*"/>
        </div>
	    <div class="form-group">
            <label for="ket_gambar"><b>Img Alt</b> </label>
            <input type="text" class="form-control" name="ket_gambar" id="ket_gambar" value="<?php echo $ket_gambar;?>" placeholder="Teks Alternatif Ketika Gambar Tidak Bisa Dibuka diBrowser (Bisa DiPakai Untuk SEO)" />
        </div>
	    <div class="form-group">
            <label for="kontent"><b>Isi Konten</b> </label>
            <textarea name="kontent" id="ckedtor" placeholder="Konten" rows="4" cols="4" class="ckeditor" required ><?php echo $kontent;?></textarea>
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
        <input type="hidden" name="id_menu" value="<?php echo $id_menu;?>" />
	    <input type="submit" name="submit" value="Save" class="btn btn-primary">
	    <a href="<?php echo site_url('panelIMS/menu') ?>" class="btn btn-success">Cancel</a>
	</form>