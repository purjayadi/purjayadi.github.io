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
        <h2 style="margin-top:0px">Menu List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('menu/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('menu/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('menu'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
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
		<th>Action</th>
            </tr><?php
            foreach ($menu_data as $menu)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $menu->nama_menu ?></td>
			<td><?php echo $menu->posisi ?></td>
			<td><?php echo $menu->gambar ?></td>
			<td><?php echo $menu->ket_gambar ?></td>
			<td><?php echo $menu->kontent ?></td>
			<td><?php echo $menu->no_urut ?></td>
			<td><?php echo $menu->tgl_entry ?></td>
			<td><?php echo $menu->tampil ?></td>
			<td><?php echo $menu->username ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('menu/read/'.$menu->id_menu),'Read'); 
				echo ' | '; 
				echo anchor(site_url('menu/update/'.$menu->id_menu),'Update'); 
				echo ' | '; 
				echo anchor(site_url('menu/delete/'.$menu->id_menu),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('menu/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('menu/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>