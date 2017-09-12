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
								<li class="navigation-header"><span>Master Data</span> <i class="icon-menu" title="Main pages"></i></li>
								<li class="<?=($this->uri->segment(1)==='administrator')?'active':''?>"><a href="<?php echo base_url('administrator')?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								<li class="<?=($this->uri->segment(1)==='users')?'active':''?>">
									<a href=""><i class="icon-users"></i> <span>Manage User</span></a>
									<ul>
										<li class="<?=($this->uri->segment(1)==='users')?'active':''?>"><a href="<?php echo base_url('users')?>">Data User</a></li>
										<li class="<?=($this->uri->segment(1)==='pembayaran')?'active':''?>"><a href="<?php echo base_url('pembayaran')?>">Payment</a></li>
										<li class="<?=($this->uri->segment(2)==='pendaftaran')?'active':''?>"><a href="<?php echo base_url('users/pendaftaran')?>">Pendaftaran</a></li>
									</ul>
								</li>
								<li class="<?=($this->uri->segment(1)==='subdomain')?'active':''?>"><a href="<?php echo base_url('subdomain')?>"><i class="icon-earth"></i> <span>Setup Subdomain</span></a></li>

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->