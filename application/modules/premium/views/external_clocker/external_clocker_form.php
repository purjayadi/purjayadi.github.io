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
        <h2 style="margin-top:0px">External Clocker <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="url_external">Url External <?php echo form_error('url_external') ?></label>
            <input type="text" class="form-control" name="url_external" id="url_external" placeholder="URL External" value="<?php echo $url_external; ?>" />
        </div>
	    <div class="form-group">
            <label for="url_tujuan">Url Tujuan <?php echo form_error('url_tujuan') ?></label>
            <input type="text" class="form-control" name="url_tujuan" id="url_tujuan" placeholder="URL Tujuan" value="<?php echo $url_tujuan; ?>" />
        </div>
        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
	    <input type="hidden" name="idexternal_clocker" value="<?php echo $idexternal_clocker; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('premium/external_clocker') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
    </div>
</div>
<?php
    $this->load->view('panelIMS/template/footer');
?>