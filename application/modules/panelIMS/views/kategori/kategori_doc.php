<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Kategori List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        <th>Nama Kategori</th>
		<th>Gambar</th>
		<th>Ket Gambar</th>
		<th>Deskripsi</th>
		<th>No Urut</th>
		<th>Tgl Entry</th>
		<th>Username</th>
		<th>Tampil</th>
		
            </tr><?php
            foreach ($kategori_data as $kategori)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
              <td><?php echo $kategori->nama_kategori ?></td>
		      <td><?php echo $kategori->gambar ?></td>
		      <td><?php echo $kategori->ket_gambar ?></td>
		      <td><?php echo $kategori->deskripsi ?></td>
		      <td><?php echo $kategori->no_urut ?></td>
		      <td><?php echo $kategori->tgl_entry ?></td>
		      <td><?php echo $kategori->username ?></td>
		      <td><?php echo $kategori->tampil ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>