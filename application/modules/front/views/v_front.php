<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="">
</head> 
<body>
	<div class="container">
		<ul>
			<?php foreach ($record as $key) {
			
			?>
			<li><?php echo $key->nama_kategori; ?></li>
			<?php
				}
			?>
		</ul>
	</div>
</body>
</html>