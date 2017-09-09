<!doctype html>
<html>
    <head>
        <title><?php echo $title;?></title>
        <link rel="stylesheet" href="<?php echo base_url('assetss/bootstrap/css/bootstrap.min.css') ?>"/>
        <script type="text/javascript" src="<?php echo base_url('ckeditor/ckeditor.js')?>"></script>

    </head>
    <body>
        <h2 style="margin-top:0px">Menu <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Menu <?php echo form_error('nama_menu') ?></label>
            <input type="text" class="form-control" name="nama_menu" id="nama_menu" placeholder="Nama Menu" value="<?php echo $nama_menu; ?>" />
        </div>
	    
        <div class="form-group">
            <label class="display-block text-semibold">Posisi <?php echo form_error('posisi') ?></label>
            <label class="radio-inline">
                <input type="radio" name="posisi" class="styled" <?php if($posisi == 'atas'){ echo 'checked';} ?> value="atas"> 1-Menu Atas Slider
            </label>
            <label class="radio-inline">
                <input type="radio" name="posisi" class="styled" <?php if($posisi == 'bawah'){ echo 'checked';} ?> value="bawah"> 2-Menu Atas Slider
            </label>
        </div>

	    <div class="form-group">
            <label for="longblob">Gambar <?php echo form_error('gambar') ?></label>
            <input type="file" class="form-control" name="gambar" id="gambar" placeholder="Gambar" value="<?php echo $gambar; ?>" />
        </div>
	    <div class="form-group">
            <label for="ket_gambar">Img Alt <?php echo form_error('ket_gambar') ?></label>
            <input type="text" class="form-control" name="ket_gambar" id="ket_gambar" placeholder="Teks Alternatif Ketika Gambar Tidak Bisa Dibuka diBrowser (Bisa DiPakai Untuk SEO)" value="<?php echo $ket_gambar; ?>" />
        </div>
	    <div class="form-group">
            <label for="kontent">Isi Konten <?php echo form_error('kontent') ?></label>
            <textarea class="ckeditor" id="editor-full" name="kontent" placeholder="Konten" rows="4" cols="4"><?php echo $kontent; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">No Urut <?php echo form_error('no_urut') ?></label>
            <input type="text" class="form-control" name="no_urut" id="no_urut" placeholder="No Urut" value="<?php echo $no_urut; ?>" />
        </div>
	    
        <div class="form-group">
            <label class="display-block text-semibold">Tampil <?php echo form_error('tampil') ?></label>
            <label class="radio-inline">
                <input type="radio" name="tampil" class="styled" <?php if($tampil == 'ya'){ echo 'checked';} ?> value="ya"> Ya
            </label>
            <label class="radio-inline">
                <input type="radio" name="tampil" class="styled" <?php if($tampil == 'tidak'){ echo 'checked';} ?> value="tidak"> Tidak
            </label>
        </div>
	    
	    <input type="hidden" name="id_menu" value="<?php echo $id_menu; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('panelIMS/menu') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>