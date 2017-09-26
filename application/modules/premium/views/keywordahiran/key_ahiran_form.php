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
        <h2 style="margin-top:0px">Keyword Ahiran <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Keyword <?php echo form_error('keyword') ?></label>
            <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Keyword" value="<?php echo $keyword; ?>" />
        </div>
        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
	    <input type="hidden" name="idkey_ahiran" value="<?php echo $idkey_ahiran; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('keywordahiran') ?>" class="btn btn-default">Cancel</a>
	</form>
</div>
</div>
<?php
    $this->load->view('panelIMS/template/footer');
?>