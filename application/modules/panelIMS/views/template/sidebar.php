<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="<?php echo base_url('assets/images/user.png')?>" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold"></i> <?php echo $this->session->userdata('company'); ?></span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i>
										<?php echo $this->session->userdata('alamat'); ?></span>
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="<?php echo base_url('users/auth/change_password')?>"><i class="icon-cog3"></i></a>
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
								<li <?php echo ($aktif == 'Dashboard')?'class="active"':"";?>><a href="<?php echo base_url('panelIMS')?>"><i class="icon-home4"></i> <span>DASHBOARD</span></a></li>
								<li <?php echo ($aktif == 'Pengaturan')?'class="active"':"";?>>
									<a href="#"><i class="glyphicon glyphicon-cog"></i> <span>PENGATURAN</span></a>
									<ul>
										<li><a href="<?php echo base_url('panelIMS/Pdasar');?>">PENGATURAN DASAR</a></li>
										<li><a href="<?php echo base_url('panelIMS/Pwarna');?>">WARNA</a></li>
										<li><a href="<?php echo base_url('panelIMS/Pdeteks');?>">DEKORASI TEKS</a></li>
										<li><a href="<?php echo base_url('panelIMS/Pcss');?>">CSS</a></li>
										<li><a href="<?php echo base_url('panelIMS/P_artikel');?>">1000 ARTIKEL</a></li>
										<li><a href="<?php echo base_url('panelIMS/Psauto');?>">SETTING AUTOPOST</a></li>
										<li><a href="<?php echo base_url('panelIMS/Psupport');?>">ONLINE SUPPORT | CONTACT PERSON</a></li>
										<li><a href="<?php echo base_url('panelIMS/Pmseo');?>">META SEO</a></li>
									</ul>
								</li>
								<li <?php echo ($aktif == 'Master')?'class="active"':"";?>>
									<a href="#"><i class="glyphicon glyphicon-th-list"></i> <span>MASTER DATA</span></a>
									<ul>
										<li><a href="<?php echo base_url('panelIMS/menu');?>">MENU</a></li>
										<li><a href="<?php echo base_url('panelIMS/kategori');?>">KATEGORI</a></li>
										<li><a href="<?php echo base_url('panelIMS/produk');?>">PRODUK</a></li>
										<li><a href="<?php echo base_url('panelIMS/artikel');?>">ARTIKEL</a></li>
										<li><a href="<?php echo base_url('panelIMS/gambar');?>">GAMBAR</a></li>
										<li><a href="<?php echo base_url('panelIMS/widget');?>">WIDGET</a></li>
										<li><a href="<?php echo base_url('panelIMS/bheader');?>">BAWAH HEADER</a></li>
										<li><a href="<?php echo base_url('panelIMS/lpage');?>">LINK PERPAGE</a></li>
										<li><a href="<?php echo base_url('panelIMS/bpage');?>">BODY PERPAGE</a></li>
									</ul>
								</li>
								<li <?php echo ($aktif == 'Premium')?'class="active"':"";?>>
									<a href="#"><i class="glyphicon glyphicon-list"></i> <span>PREMIUM</span></a>
									<ul>
										<li><a href="<?php echo base_url('premium/keywordawalan')?>">KEYWORD AWALAN</a></li>
										<li><a href="<?php echo base_url('premium/keywordahiran')?>">KEYWORD AKHIRAN</a></li>
										<li><a href="<?php echo base_url('premium/keywordkota')?>">KEYWORD KOTA</a></li>
										<li><a href="<?php echo base_url('premium/fbpixel')?>">FB PIXEL</a></li>
										<li><a href="<?php echo base_url('premium/whatsapp')?>">WHATS APP ORDER</a></li>
										<li><a href="<?php echo base_url('premium/clocker')?>">CLOACKER</a></li>
										<li><a href="<?php echo base_url('premium/external_clocker')?>">EKSTERNAL CLOACKER</a></li>
										<li><a href="<?php echo base_url('premium/insta')?>">TEMPLATE INSTA</a></li>
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
							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


