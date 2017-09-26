
<?php if ($this->session->flashdata('info')): ?>
<div class="alert bg-success alert-right">
    <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
    <span class="text-semibold"><?php echo $this->session->flashdata('info');?></span>
</div>
<?php endif; ?>
<!-- Single row selection -->

                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo $table_title;?></h3>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="col-sm-4">
                                <a class="btn btn-primary btn-lg btn-block" href="<?php echo base_url()?>panelIMS/artikel/add"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</a>
                            </div>
                        </div>

                        <div class="table-responsive"> 
                        <table class="table table-togglable table-hover">
                            <thead>
                                <tr>
                                    <th data-hide="phone">Tanggal Entry</th>
                                    <th data-toggle="true">Judul Artikel</th>
                                    <th data-hide="phone">Gambar</th>
                                    <th data-hide="phone">No Urut</th>
                                    <th data-hide="phone">Tampil</th>
                                    <th class="text-center" data-hide="phone">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($record as $key) {
                                        
                                ?>
                                <tr>
                                    <td><?php echo $key->tgl_entry; ?></td>
                                    <td><?php echo $key->judul_artikel; ?></td>
                                    <td><img src="<?php echo base_url();?>assets/imgartikel/<?php echo $key->gambar; ?>" width="200" height="200"></td>
                                    <td><?php echo $key->no_urut; ?></td>
                                    <td><?php echo $key->tampil; ?></td>
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
    <ul class="dropdown-menu dropdown-menu-right">
        <li><a href="<?php echo site_url('panelIMS/artikel/read').'/'.$key->id_artikel;?>"><span class="glyphicon glyphicon-check"></span><b> Detail</b></a></li>
        <li><a href="<?php echo site_url('panelIMS/artikel/edit').'/'.$key->id_artikel;?>"><span class="glyphicon glyphicon-edit"></span><b> Edit</b></a></li>
        <li><a href="<?php echo site_url('panelIMS/artikel/delete').'/'.$key->id_artikel;?>" onclick="return confirm('Yakin Ingin Hapus?')"><span class="glyphicon glyphicon-trash"></span><b> Delete</b></a></li>
    </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <?php
                                        }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /single row selection -->