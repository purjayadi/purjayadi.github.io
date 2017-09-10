<!doctype html>
<html>
    <head>
        <title><?php echo $title;?></title>
        <link rel="stylesheet" href="<?php echo base_url('assetss/bootstrap/css/bootstrap.min.css') ?>"/>
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
        <h2>Menu List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Menu</th>
		<th>Posisi</th>
		<th>Gambar</th>
		<th>Ket Gambar</th>
		<th>Kontent</th>
		<th>No Urut</th>
		<th>Tgl Entry</th>
		<th>Tampil</th>
		<th>Username</th>
		
            </tr><?php
            foreach ($menu_data as $menu)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $menu->nama_menu ?></td>
		      <td><?php echo $menu->posisi ?></td>
		      <td><?php echo $menu->gambar ?></td>
		      <td><?php echo $menu->ket_gambar ?></td>
		      <td><?php echo $menu->kontent ?></td>
		      <td><?php echo $menu->no_urut ?></td>
		      <td><?php echo $menu->tgl_entry ?></td>
		      <td><?php echo $menu->tampil ?></td>
		      <td><?php echo $menu->username ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>