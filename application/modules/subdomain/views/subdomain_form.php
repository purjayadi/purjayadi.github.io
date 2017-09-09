<?php
$this->load->view('administrator/template/header');
$this->load->view('administrator/template/navbar');
?>
    <!-- Page container -->
    <div class="page-container">
        <!-- Page content -->
        <div class="page-content">            
        <?php
            $this->load->view('administrator/template/sidebar');
        ?>
            <!-- Main content -->
        <div class="content-wrapper">

        <div class="content">
        <div class="panel panel-info">
        <div class="panel-heading">
        <h6 style="margin-top:0px">Subdomain <?php echo $button ?></h6>
        </div>
        <div class="panel panel-flat">
        <div class="panel-body">
        
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Subdomain <?php echo form_error('subdomain') ?></label>
            <input type="text" class="form-control" name="subdomain" id="subdomain" placeholder="subdomain" required="required"  value="<?php echo $subdomain; ?>" />
        </div>
	    <div class="form-group">
           <label>Select User</label>
           <select name="username" id="username" class="form-control select-search" data-placeholder="Select User..." required="required" />
           <option></option>
                <?php 
                $users=$this->db->query("select * from users");
                foreach($users->result() as $value){
                  $selected= '';
                  if($username == $value->username){
                    $selected = 'selected="selected"';
                  }
                ?>
                <option  value="<?php echo $value->username; ?>"  <?php echo $selected;?> >
                <?php echo $value->username; ?>
                </option>
            <?php }?>
          </select>
        </div>
        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
	    <input type="hidden" name="idsubdomain" value="<?php echo $idsubdomain; ?>" /> 
	    <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('subdomain') ?>" class="btn btn-default">Cancel</a>
    	</form>
        </div>
        </div>
        </div>
<?php
$this->load->view('administrator/template/footer');
?>