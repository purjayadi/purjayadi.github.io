
    <?php echo form_open_multipart('panelIMS/widget/simpan');?>
	    
	    <div class="form-group">
            <label for="script_widget">Script Widget  </label>
            <textarea class="form-control" id="script_widget" name="script_widget" placeholder="Script widget seperti FEEDJIT,HiStats,Google Maps, maupun embed Youtube bisa di copy-paste-kan disini" cols="4" rows="4" required ></textarea >
        </div>
        <div class="form-group">
            <label class="display-block text-semibold">Posisi </label>
            <label class="radio-inline">
                <input type="radio" name="posisi" class="styled" value="kolom kiri"> 1-Kolom Kiri
            </label>
            <label class="radio-inline">
                <input type="radio" name="posisi" class="styled" value="kolom kanan"> 1-Kolom Kanan
            </label> 
        </div>
	    <div class="form-group">
            <label for="int">No Urut </label>
            <input id='no_urut' name='no_urut' type='number' value='' min='1' class="form-control" max='99' placeholder="No Urut" required />
        </div> 
        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
	    <input type="submit" class="btn btn-primary" value="Save">
	    <a href="<?php echo site_url('panelIMS/widget') ?>" class="btn btn-success">Cancel</a>
	</form>