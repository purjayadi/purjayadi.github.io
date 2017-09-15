<?php
$this->load->view('panelIMS/template/header');
$this->load->view('panelIMS/template/navbar');
$url = base_url('assets/images/clocker/').$photo;
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
        <h2 style="margin-top:0px">Clocker <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    <div class="form-group">
            <label for="varchar">Title <?php echo form_error('title') ?></label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Deskripsi <?php echo form_error('deskripsi') ?></label>
            <textarea rows="5" cols="5" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi clocker" /><?php echo $deskripsi; ?></textarea> 
        </div>
	    <div class="form-group">
            <input type="hidden" class="form-control" name="url_redirect" id="url_redirect" placeholder="Url Redirect" value="<?php echo $kodeunik; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Url Tujuan <?php echo form_error('url_tujuan') ?></label>
            <input type="text" class="form-control" name="url_tujuan" id="url_tujuan" placeholder="Url Tujuan" value="<?php echo $url_tujuan; ?>" />
        </div>
        <div class="form-group has-feedback has-feedback-left">
            <?php echo form_error('photo') ?>
        <input type="file" class="form-control"  placeholder="Photo" name="photo" autocomplete="off" >
        <span class="help-block">Accepted formats: gif, png, jpg, bmp. Max file size 2Mb</span>
        <div class="form-control-feedback">
        <i class="icon-image4 text-muted"></i>
        </div>
        </div>
        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
	    <input type="hidden" name="idclocker" value="<?php echo $kodeunik; ?>" /> 
	    <button type="submit" value="upload" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('premium/clocker') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div>
</div>
<?php
    $this->load->view('panelIMS/template/footer');
?>