<script src="/javascripts/application.js" type="text/javascript" charset="utf-8">

	function toggle (produk) {
		if (produk.value !==''){
			document.getElementById('produk1').readonly =false;
		else
			document.getElementById('produk1').readonly = true;
		}
	}
</script>

<!-- Form horizontal -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">

		<form class="form-horizontal" action="<?php echo base_url('panelIMS/produk/simpan')?>" method="post" enctype="multipart/form-data">
								<fieldset class="content-group">
									
									<div class="form-group">
										<label class="control-label col-lg-2"><b>Kategori</b></label>
										<div class="col-lg-10">
											<select name="id_kategori" class="form-control">
											<option disabled selected>Pilih Kategori Produk</option>}
												 <?php 
												 	$ses = $this->session->identity;
												 	$kategori = $this->db->query("select * from kategori where username='$ses'");
												 	foreach ($kategori->result() as $value){
												 ?>
												<option value="<?php echo $value->id_kategori; ?>"><?php echo $value->nama_kategori; ?></option>
												 <?php } ?>
				                            </select>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2"><b>Nama Produk</b></label>
										<div class="col-lg-10">
											<input id='produk' name='nama_produk' type='text' placeholder='Nama Produk' class="form-control" required/>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2"><b>Upload File Gambar Produk</b></label>
										<div class="col-lg-10">
											<input type="file" class="form-control" name="userfile"/>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2"><b>Img Alt</b></label>
										<div class="col-lg-10">
											<input type="text" name="ket_gambar" class="form-control" placeholder="Teks Alternatif Ketika Gambar Tidak Bisa Dibuka diBrowser (Bisa DiPakai Untuk SEO)">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2"><b>Harga</b></label>
										<div class="col-lg-10">
											<div class='input-group'>
											<span class='input-group-addon'>Rp</span><input class="form-control" id='harga' name='harga' type='number' value='0' min='0' max='9999999999' placeholder='999999' required/>
										</div>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2"><b>Deskripsi</b></label>
										<div class="col-lg-10">
											<textarea class="ckeditor" id="ckedtor" name="deskripsi" id="deskripsi" placeholder="Deskripsi" ></textarea>
										</div>
									</div>

			                        <div class="form-group">
			                        	<label class="control-label col-lg-2"><b>Tag KeyWord</b></label>
			                        	<div class="col-lg-10">
				                            <textarea name="keyword" class="form-control" placeholder="Tag 1, Tag 2, Tag 3,...(Pisahkan Dengan Koma)"></textarea>
			                            </div>
			                        </div>

									<div class="form-group">
										<label class="control-label col-lg-2"><b>No Urut</b></label>
										<div class="col-lg-10">
											<input id='no_urut' name='no_urut' type='number' value='1' min='1' class="form-control" max='99'/>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2"><b>Nama Judul</b> </label>
										<div class="col-lg-10">
											<input id='produk' name='nama_judul' type='text' placeholder='Judul Alternatif untuk Keywors' class="form-control" required/>

										</div>
									</div>

									<div class="form-group">
							      	<label class="col-lg-2 control-label" for="idkeywordawal"><b>Keyword Awalan</b></label>
							          <div class="col-lg-10">
				<?php 
					$ses = $this->session->identity;
				 	$key_awalan = $this->db->query("select * from key_awalan where username ='$ses'");
				 	
				 	foreach ($key_awalan->result() as $row){
				 ?>
		                        <label class="checkbox-inline">
		    					<input class="cek1" type="radio" id="key_awal" name="key_awal" value="<?php echo $row->keyword; ?>"> <?php echo $row->keyword; ?> 
		    					</label>		    	
				<?php } ?>
							    		</div>
							      </div>

							      <div class="form-group">
							      	<label class="col-lg-2 control-label" for="idkeywordawal"><b>Keyword Akhiran</b></label>
							          <div class="col-lg-10">
				<?php 
					$ses = $this->session->identity;
				 	$key_ahiran = $this->db->query("select * from key_ahiran where username ='$ses'");
				 	foreach ($key_ahiran->result() as $row){
				 ?>			
							    		<label class="checkbox-inline">
							    			<input class="cek1" type="radio" id="key_akhir" name="key_akhir" value="<?php echo $row->keyword; ?>"><?php echo $row->keyword; ?>
							    		</label>
				<?php } ?>
							    		</div>
							      </div>

							      <div class="form-group">
							          <label class="col-lg-2 control-label" for="idkeywordkota"><b>Keyword Kota</b></label>
							          <div class="col-lg-10">
				<?php 
				$ses = $this->session->identity;
				 	$key_kota = $this->db->query("select * from key_kota where username ='$ses'");
				 	foreach ($key_kota->result() as $row){
				 ?>
				                       <label class="checkbox-inline">
				    					<input class="cek3" type="checkbox" id="key_kota[]" name="key_kota[]" value="<?php echo $row->keyword; ?>"><?php echo $row->keyword; ?>
				    					</label>
				<?php } ?>
							    	</div>
							      </div>
							      <div class="form-group">
							      	<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
							      <label class="col-lg-2 control-label"></label>
							      	<div class="col-sm-10">
							      	<button type="submit" class="btn btn-primary">Save</button>&nbsp;
	   								 <a href="<?php echo site_url('panelIMS/produk') ?>" class="btn btn-success">Cancel</a>
	   							  </div>
	   							 </div>
								</fieldset>
							</form>
						</div>
					</div>