
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login BM Link</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/icons/icomoon/styles.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/bootstrap.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/core.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/components.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/colors.css')?>" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/loaders/pace.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/jquery.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/bootstrap.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/loaders/blockui.min.js')?>"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/styling/uniform.min.js')?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/js/core/app.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/pages/login.js')?>"></script>
    <!-- /theme JS files -->

</head>

<body class="login-container">

    <!-- Main navbar -->
    <div class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html"><img src="assets/images/logo_light.png" alt=""></a>

            <ul class="nav navbar-nav pull-right visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            </ul>
        </div>

        <div class="navbar-collapse collapse" id="navbar-mobile">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#" data-popup="tooltip" data-placement="bottom" title="Go to website">
                        <i class="icon-display4"></i> <span class="visible-xs-inline-block position-right"> Go to website</span>
                    </a>
                </li>

                <li>
                    <a href="#" data-popup="tooltip" data-placement="bottom" title="contact admin">
                        <i class="icon-user-tie"></i> <span class="visible-xs-inline-block position-right"> Contact admin</span>
                    </a>
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-cog3"></i>
                        <span class="visible-xs-inline-block position-right"> Options</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->
    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Content area -->
                <div class="content pb-20">

                    <!-- Advanced login -->
                    <form class="form-horizontal" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                        <div class="panel panel-body login-form">
                            <div class="text-center">
                                <h5 class="content-group-lg">Konfirmasi Pembayaran <small class="display-block">Enter your credentials</small></h5>
                            </div>
                            <?php echo $this->session->flashdata('message'); ?>
                            <div class="form-group has-feedback has-feedback-left"><?php echo form_error('kode_user') ?>
                                <input type="text" class="form-control"  placeholder="Kode User" name="kode_user" autocomplete="off" required="required">
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>

                           <?php echo $this->session->flashdata('message'); ?>
                            <div class="form-group has-feedback has-feedback-left">
                                <?php echo form_error('nama_pengirim') ?>
                                <input type="text" class="form-control"  placeholder="Nama Pengirim" name="nama_pengirim" autocomplete="off" required="required">
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>
                            <?php echo $this->session->flashdata('message'); ?>
                            <div class="form-group has-feedback has-feedback-left">
                                <?php echo form_error('tgl_transfer') ?>
                                <input type="text" class="form-control"  placeholder="Tanggal Transfer" name="tgl_transfer" autocomplete="off" required="required">
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>
                            <?php echo $this->session->flashdata('message'); ?>
                            <div class="form-group has-feedback has-feedback-left">
                                <?php echo form_error('photo') ?>
                                <input type="file" class="form-control"  placeholder="Photo" name="photo" autocomplete="off" required="required">
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>
                            <?php echo $this->session->flashdata('message'); ?>
                            <div class="form-group has-feedback has-feedback-left">
                                <?php echo form_error('jmlh_transfer') ?>
                                <input type="text" class="form-control"  placeholder="Jumlah Transfer" name="jmlh_transfer" autocomplete="off" required="required">
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="idpembayaran" value="<?php echo $idpembayaran; ?>" /> 
                                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                                <button type="submit" value="upload" class="btn bg-blue btn-block">Submit <i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                    <!-- /advanced login -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->

</body>
</html>
