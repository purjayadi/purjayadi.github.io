<?php
$this->load->view('panelIMS/template/header');
$this->load->view('panelIMS/template/navbar');
?>

    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">
            
            <?php
                $this->load->view('panelIMS/template/sidebar');
            ?>
            <!-- Main content -->
            <div class="content-wrapper">
            <!-- Content area -->
            <div class="content">
            <div class="panel panel-flat">
            <div class="panel-body">
            <h2 style="margin-top:0px">Whatsapp <?php echo $button ?></h2>
            <form action="<?php echo $action; ?>" method="post">
    	    <div class="form-group">
                <label for="varchar">No. HP/Wa <?php echo form_error('no_wa') ?></label>
                <input type="text" class="form-control" name="no_wa" id="no_wa" placeholder="No Wa" value="<?php echo $no_wa; ?>" />
            </div>
    	    <div class="form-group">
                <label for="text_wa">Deskripsi / Text WA <?php echo form_error('text_wa') ?></label>
                <textarea class="form-control" rows="3" name="text_wa" id="text_wa" placeholder="Text Wa"><?php echo $text_wa; ?></textarea>
            </div>
            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
    	    <input type="hidden" name="idwa_order" value="<?php echo $idwa_order; ?>" /> 
    	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    	    <a href="<?php echo site_url('premium/whatsapp') ?>" class="btn btn-default">Cancel</a>
    	</form>
    </div>
</div>
<?php
    $this->load->view('panelIMS/template/footer');
?>