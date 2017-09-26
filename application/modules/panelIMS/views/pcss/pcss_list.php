
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
                        <!--    <a class="btn btn-primary btn-sm" href="<?php echo base_url()?>panelIMS/pcss/add"><b>Create</b></a>-->
                        </div>

                        <table class="table datatable-selection-single">
                            <thead>
                                <tr>
                                    <th>Tanggal Entry</th>
                                    <th>Konten</th>
                                    <th>Tampil</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($record as $key) {
                                        
                                ?>
                                <tr>
                                    <td><?php echo $key->tgl_entry;?></td>
                                    <td><?php echo $key->kontent;?></td>
                                    <td><?php echo $key->tampil;?></td>
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
    <ul class="dropdown-menu dropdown-menu-right">
        <li><a href="<?php echo site_url('panelIMS/pcss/edit').'/'.$key->id_css;?>"><span class="glyphicon glyphicon-edit"></span><b> Edit</b></a></li>
        <li><a href="<?php echo site_url('panelIMS/pcss/delete').'/'.$key->id_css;?>" onclick="return confirm('Yakin Ingin Hapus?')"><span class="glyphicon glyphicon-trash"></span><b> Delete</b></a></li>
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