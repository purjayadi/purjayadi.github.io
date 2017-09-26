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
                                <a class="btn btn-primary btn-lg btn-block" href="<?php echo base_url()?>panelIMS/psupport/add"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</a>
                            </div>
                        </div>
                        <table class="table datatable-selection-single">
                            <thead>
                                <tr>
                                    <th>Ditampilkan</th>
                                    <th>Tgl Entry</th>
                                    <th>Posisi</th>
                                    <th>Urutan Ke</th>
                                    <th>Instansi | Perusahaan | Divisi</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Kode Pos</th>
                                    <th>Kota</th>
                                    <th>Provinsi</th>
                                    <th>Negara</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                        foreach ($record as $key) {
                                            
                                ?>
                                <tr>
                                <td><?php echo $key->tampil;?></td>
                                <td><?php echo $key->tgl_entry;?></td>
                                <td><?php echo $key->posisi;?></td>
                                <td><?php echo $key->no_urut;?></td>
                                <td><?php echo $key->ints_perushaan;?></td>
                                <td><?php echo $key->nama;?></td>
                                <td><?php echo $key->alamat;?></td>
                                <td><?php echo $key->kode_pos;?></td>
                                <td><?php echo $key->kota;?></td>
                                <td><?php echo $key->provinsi;?></td>
                                <td><?php echo $key->negara;?></td>
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
    <ul class="dropdown-menu dropdown-menu-right">
        <li><a href="<?php echo site_url('panelIMS/psupport/read').'/'.$key->id_support;?>"><span class="glyphicon glyphicon-check"></span><b> Detail</b></a></li>
       <li><a href="<?php echo site_url('panelIMS/psupport/edit').'/'.$key->id_support;?>"><span class="glyphicon glyphicon-edit"></span><b> Edit</b></a></li>
        <li><a href="<?php echo site_url('panelIMS/psupport/delete').'/'.$key->id_support;?>" onclick="return confirm('Yakin Ingin Hapus?')"><span class="glyphicon glyphicon-trash"></span><b> Delete</b></a></li>
    </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                            <?php
                                       }     
                            ?>
                        </table>
                        
                    </div>
                    
                    <!-- /single row selection -->