<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">External_clocker <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="url_external">Url External <?php echo form_error('url_external') ?></label>
            <textarea class="form-control" rows="3" name="url_external" id="url_external" placeholder="Url External"><?php echo $url_external; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="url_redirect">Url Redirect <?php echo form_error('url_redirect') ?></label>
            <textarea class="form-control" rows="3" name="url_redirect" id="url_redirect" placeholder="Url Redirect"><?php echo $url_redirect; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="url_tujuan">Url Tujuan <?php echo form_error('url_tujuan') ?></label>
            <textarea class="form-control" rows="3" name="url_tujuan" id="url_tujuan" placeholder="Url Tujuan"><?php echo $url_tujuan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
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