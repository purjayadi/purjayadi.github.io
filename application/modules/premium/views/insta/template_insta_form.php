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
        <h2 style="margin-top:0px">Template_insta <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Profile Insta <?php echo form_error('profile_insta') ?></label>
            <input type="text" class="form-control" name="profile_insta" id="profile_insta" placeholder="Profile Insta" value="<?php echo $profile_insta; ?>" />
        </div>
	    <input type="hidden" name="idtemplate_insta" value="<?php echo $idtemplate_insta; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('premium/insta') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div>
</div>
<?php
    $this->load->view('panelIMS/template/footer');
?>