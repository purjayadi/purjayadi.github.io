<!doctype html>
<html>
    <head>
        <title><?php echo $title;?></title>
        <link rel="stylesheet" href="<?php echo base_url('assetss/bootstrap/css/bootstrap.min.css') ?>"/>
        <script type="text/javascript" src="<?php echo base_url('ckeditor/ckeditor.js')?>"></script>
    </head>
    <body>
        <h2 style="margin-top:0px">Kategori <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Kategori <?php echo form_error('nama_kategori') ?></label>
            <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Nama Kategori" value="<?php echo $nama_kategori; ?>" />
        </div>
        <div class="form-group">
            <label for="gambar">Gambar <?php echo form_error('gambar') ?></label>
            <input type="file" class="form-control" name="gambar" id="gambar" placeholder="No Urut" value="<?php echo $gambar; ?>" />
        </div>
	    <div class="form-group">
            <label for="ket_gambar">Img Alt <?php echo form_error('ket_gambar') ?></label>
            <input type="text" class="form-control" name="ket_gambar" id="ket_gambar" placeholder="Teks Alternatif Ketika Gambar Tidak Bisa Dibuka diBrowser (Bisa DiPakai Untuk SEO)" value="<?php echo $ket_gambar; ?>" />
        </div>
	    <div class="form-group">
            <label for="deskripsi">Deskripsi <?php echo form_error('deskripsi') ?></label>
            <textarea class="ckeditor" id="ckedtor" name="deskripsi" id="deskripsi" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">No Urut <?php echo form_error('no_urut') ?></label>
            <input type="text" class="form-control" name="no_urut" id="no_urut" placeholder="No Urut" value="<?php echo $no_urut; ?>"/>
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

	    <input type="hidden" name="id_kategori" value="<?php echo $id_kategori; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('panelIMS/kategori') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>