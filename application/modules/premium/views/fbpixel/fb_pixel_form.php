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
        <h2 style="margin-top:0px">Fb_pixel <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Konten <?php echo form_error('konten') ?></label>
            <input type="text" class="form-control" name="konten" id="konten" placeholder="Konten" value="<?php echo $konten; ?>" />
        </div>
	    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
	    <input type="hidden" name="idkonten" value="<?php echo $idkonten; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('premium/fbpixel') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php
    $this->load->view('panelIMS/template/footer');
?>