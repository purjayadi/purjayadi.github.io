<!-- Column rendering -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title"><?php echo $nama_table; ?></h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <a class="btn btn-primary btn-sm" href="<?php echo base_url()?>panelIMS/produk/addproduk">Create</a>    
                        </div>

                        <table class="table datatable-columns">
                            <thead>
                                <tr>
                                    <th>Tanggal Entry</th>
                                    <th>Kategory</th>
                                    <th>Produk</th>
                                    <th class="never">Gambar</th>
                                    <th>Harga</th>
                                    <th>No Urut</th>
                                    <th>Tampil</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($data->result() as $row) {
                                       
                                ?>
                                <tr>
                                    <td><?php echo $row->tgl_entry; ?></td>
                                    <td><?php echo $row->nama_kategori; ?></td>
                                    <td><?php echo $row->nama_produk; ?></td>
                                    <td><?php echo $row->gambar; ?></td>
                                    <td><?php echo $row->harga; ?></td>
                                    <td><?php echo $row->no_urut; ?></td>
                                    <td><?php echo $row->tampil; ?></td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="<?php echo base_url()?>produk/edit/<?php echo $row->id_produk;?>">Edit</a>
                                        <a class="btn btn-danger btn-sm" href="<?php echo base_url()?>produk/delete/<?php echo $row->id_produk;?>" onclick="return confirm('Yakin Ingin Hapus Data')">Delete</a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /column rendering -->