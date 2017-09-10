<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="<?php echo base_url('assetss/images/placeholder.jpg')?>" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?php echo $judul_menu; ?></span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp; <?php echo $nama_jln; ?>
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->
					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span><h1>PANDUAN</h1></span><i class="glyphicon glyphicon-book" title="Main pages"></i></li>
								<li <?php echo ($aktif == 'Dashboard')?'class="active"':"";?>><a href="<?php echo base_url('panelIMS/index')?>"><i class="icon-home4"></i> <span>DASHBOARD</span></a></li>
								<li <?php echo ($aktif == 'Pengaturan')?'class="active"':"";?>>
									<a href="#"><i class="glyphicon glyphicon-cog"></i> <span>PENGATURAN</span></a>
									<ul>
										<li><a href="#">PENGATURAN DASAR</a></li>
										<li><a href="#">WARNA</a></li>
										<li><a href="#">DEKORASI TEKS</a></li>
										<li><a href="#">CSS</a></li>
										<li><a href="#">1000 ARTIKEL</a></li>
										<li><a href="#">SETTING AUTOPOST</a></li>
										<li><a href="#">ONLINE SUPPORT | CONTACT PERSON</a></li>
										<li><a href="#">META SEO</a></li>
									</ul>
								</li>
								<li <?php echo ($aktif == 'Master')?'class="active"':"";?>>
									<a href="#"><i class="glyphicon glyphicon-th-list"></i> <span>MASTER DATA</span></a>
									<ul>
										<li><a href="<?php echo base_url('panelIMS/menu/index');?>">MENU</a></li>
										<li><a href="<?php echo base_url('panelIMS/kategori/index');?>">KATEGORI</a></li>
										<li><a href="<?php echo base_url('panelIMS/produk/index');?>">PRODUK</a></li>
										<li><a href="#">ARTIKEL</a></li>
										<li><a href="#">GAMBAR</a></li>
										<li><a href="#">WIDGET</a></li>
										<li><a href="#">BAWAH HEADER</a></li>
										<li><a href="#">LINK PERPAGE</a></li>
										<li><a href="#">BODY PERPAGE</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="glyphicon glyphicon-list"></i> <span>PREMIUM</span></a>
									<ul>
										<li><a href="#">KEYWORD AWALAN</a></li>
										<li><a href="#">KEYWORD AKHIRAN</a></li>
										<li><a href="#">KEYWORD KOTA</a></li>
										<li><a href="#">FB PIXEL</a></li>
										<li><a href="#">WHATS APP ORDER</a></li>
										<li><a href="#">CLOACKER</a></li>
										<li><a href="#">EKSTERNAL CLOACKER</a></li>
										<li><a href="#">TEMPLATE INSTA</a></li>
									</ul>
								</li>
								<li <?php echo ($aktif == 'subdomain/listsub')?'class="active"':"";?>>
									<a href="<?php echo base_url('subdomain/listsub');?>"><i class="glyphicon glyphicon-list-alt"></i> <span>LIST SUBDOMAIN</span></a>
								</li>
								<li>
									<a href="https://www.google.com/webmasters/tools/submit-url" target="_blank"><i class="glyphicon glyphicon-send"></i> <span>DAFTAR KEGOOGLE</span></a>
								</li>
								<li>
									<a href="http://ubersuggest.org" target="_blank"><i class="glyphicon glyphicon-flash"></i> <span>RISET KATA KUNCI</span></a>
								</li>
								<hr></hr>
							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


