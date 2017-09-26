

<div class="row">
							<!-- Quick stats boxes -->
							<div class="row">
								<div class="col-lg-4">

									<!-- Members online -->
									<div class="panel bg-teal-400">
										<div class="panel-body">
											<?php 
												$ses = $this->session->identity;
												$jmla = $this->db->query("SELECT * FROM produk where username='$ses'")->num_rows(); ?>
											<h3 class="no-margin"><?php echo $jmla; ?></h3>
											Jumlah Produk
											<div class="text-muted text-size-small"></div>
										</div>

										<div class="container-fluid">
											<div id="members-online"></div>
										</div>
									</div>
									<!-- /members online -->

								</div>

								<div class="col-lg-4">

									<!-- Current server load -->
									<div class="panel bg-pink-400">
										<div class="panel-body">
											<?php 
												$ses = $this->session->identity;
												$jmla = $this->db->query("SELECT * FROM artikel where username='$ses'")->num_rows(); ?>
											<h3 class="no-margin"><?php echo $jmla; ?></h3>
											Jumlah Artikel
											<div class="text-muted text-size-small"></div>
										</div>

										<div id="server-load"></div>
									</div>
									<!-- /current server load -->

								</div>

								<div class="col-lg-4">

									<!-- Today's revenue -->
									<div class="panel bg-blue-400">
										<div class="panel-body">
											<h3 class="no-margin"><?php echo $this->session->userdata('old_last_login'); ?></h3>
											Login Terakhir
											<div class="text-muted text-size-small"></div>
										</div>

										<div id="today-revenue"></div>
									</div>
									<!-- /today's revenue -->

								</div>
							</div>
							<!-- /quick stats boxes -->


					 

					</div>