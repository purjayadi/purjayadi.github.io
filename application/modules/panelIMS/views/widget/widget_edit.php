<?php
        foreach ($record->result() as $key) {
            $id_widget  = $key->id_widget;
            $script_widget =$key->script_widget;
            $posisi     = $key->posisi;
            $no_urut    = $key->no_urut;
            $tampil     = $key->tampil;
        }
?>

    <?php echo form_open_multipart('panelIMS/widget/update');?>
	    
	    <div class="form-group">
            <label for="script_widget">Script Widget  </label>
            <textarea class="form-control" id="script_widget" name="script_widget" placeholder="Script widget seperti FEEDJIT,HiStats,Google Maps, maupun embed Youtube bisa di copy-paste-kan disini" cols="4" rows="4" required ><?php echo $script_widget;?></textarea >
        </div>
        <div class="form-group">
            <label class="display-block text-semibold">Posisi </label>
            <label class="radio-inline">
                <input type="radio" name="posisi" class="styled" value="kolom kiri" <?php if($posisi == 'kolom kiri'){ echo 'checked';} ?>> 1-Kolom Kiri
            </label>
            <label class="radio-inline">
                <input type="radio" name="posisi" class="styled" value="kolom kanan" <?php if($posisi == 'kolom kanan'){ echo 'checked';} ?>> 1-Kolom Kanan
            </label> 
        </div>
	    <div class="form-group">
            <label for="int">No Urut </label>
            <input id='no_urut' name='no_urut' type='number' value=<?php echo $no_urut; ?> min='1' class="form-control" max='99' placeholder="No Urut" required />
        </div> 
        <div class="form-group">
            <label class="display-block text-semibold">Tampil </label>
            <label class="radio-inline">
                <input type="radio" name="tampil" class="styled" <?php if($tampil == 'ya'){ echo 'checked';} ?> value="ya"> Ya
            </label>
            <label class="radio-inline">
                <input type="radio" name="tampil" class="styled" <?php if($tampil == 'tidak'){ echo 'checked';} ?> value="tidak"> Tidak
            </label>
        </div>
        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
        <input type="hidden" name="id_widget" value="<?php echo $id_widget;?>" />
	    <input type="submit" class="btn btn-primary" value="Save">
	    <a href="<?php echo site_url('panelIMS/widget') ?>" class="btn btn-success">Cancel</a>
	</form>