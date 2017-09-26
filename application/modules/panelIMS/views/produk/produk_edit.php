
<?php
        foreach ($record->result() as $key) {
        	$id_kategori 	= $key->kategori_id_kategori;
            $id_produk    	= $key->id_produk;
            $nama_produk  	= $key->nama_produk;
            $ket_gambar   	= $key->ket_gambar;
            $harga     		= $key->harga;
            $deskripsi 		= $key->deskripsi;
            $keyword    	= $key->keyword;
            $no_urut    	= $key->no_urut;
            $key_awal   	= $key->key_awal;
            $key_akhir   	= $key->key_akhir;
            $key_kota   	= explode(",", $key->key_kota);
            $tgl_entry    	= $key->tgl_entry;
            $tampil     	= $key->tampil;
            $nama_judul  	= $key->nama_judul;
            $gambar 		= $key->gambar;
        }
//$url = base_url('assets/imgproduk/').$gambar;
?>


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

		<form class="form-horizontal" action="<?php echo base_url('panelIMS/produk/update')?>" method="post" enctype="multipart/form-data">
<!-- <input type="hidden" name='filelama' value="<?php echo $gambar;?>" type='text' /> -->
<input type="hidden" name='id_produk' value="<?php echo $id_produk;?>" type='text' />
								<fieldset class="content-group">
									
									<div class="form-group">
										<label class="control-label col-lg-2"><b>Kategori</b></label>
										<div class="col-lg-10">
											<select name="id_kategori" class="form-control">
											<option disabled selected>Pilih Kategori Produk</option>}
												 <?php 
												 	$kategori = $this->db->query("SELECT * FROM kategori");
												 	foreach ($kategori->result() as $key){
												 ?>
												<option <?php echo ($id_kategori==$key->id_kategori) ? 'selected=""':""; ?> value="<?php echo $key->id_kategori; ?>"><?php echo $key->nama_kategori; ?></option>
												 <?php } ?>
				                            </select>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2"><b>Nama Produk</b></label>
										<div class="col-lg-10">
											<input id='nama_produk' name='nama_produk' value="<?php echo $nama_produk;?>" type='text' placeholder='Nama Produk' class="form-control" required/>
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-lg-2"></label>
										<div class="col-lg-10">
											<a href="" target="_blank"><img src="<?=base_url();?>assets/imgproduk/<?=$gambar;?>" style="width: 200px; height: 180px; margin-bottom: 10px;" class="img-rounded" alt=""></a>
										</div>
										<label class="control-label col-lg-2"><b>Upload File Gambar Produk</b></label>
										<div class="col-lg-10">
											<input type="file" class="form-control" name="userfile"/>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2"><b>Img Alt</b></label>
										<div class="col-lg-10">
											<input type="text" name="ket_gambar" value="<?php echo $ket_gambar;?>" class="form-control" placeholder="Teks Alternatif Ketika Gambar Tidak Bisa Dibuka diBrowser (Bisa DiPakai Untuk SEO)">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2"><b>Harga</b></label>
										<div class="col-lg-10">
											<div class='input-group'>
											<span class='input-group-addon'>Rp</span><input class="form-control" id='harga' name='harga' type='number' value="<?php echo $harga;?>" min='0' max='9999999999' placeholder='999999' required/>
										</div>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2"><b>Deskripsi</b></label>
										<div class="col-lg-10">
											<textarea class="ckeditor" id="ckedtor" name="deskripsi" id="deskripsi" placeholder="Deskripsi" ><?php echo $deskripsi;?></textarea>
										</div>
									</div>

			                        <div class="form-group">
			                        	<label class="control-label col-lg-2"><b>Tag KeyWord</b></label>
			                        	<div class="col-lg-10">
				                            <textarea name="keyword" class="form-control" placeholder="Tag 1, Tag 2, Tag 3,...(Pisahkan Dengan Koma)"><?php echo $keyword;?></textarea>
			                            </div>
			                        </div>

									<div class="form-group">
										<label class="control-label col-lg-2"><b>No Urut</b></label>
										<div class="col-lg-10">
											<input id='no_urut' name='no_urut' value="<?php echo $no_urut;?>" type='number' value='1' min='1' class="form-control" max='99'/>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2"><b>Nama Judul</b> </label>
										<div class="col-lg-10">
											<input id='produk' name='nama_judul' value="<?php echo $nama_judul;?>" type='text' placeholder='Baris 1' class="form-control" required/>

										</div>
									</div>

									<div class="form-group">
							      	<label class="col-lg-2 control-label" for="idkeywordawal"><b>Keyword Awalan</b></label>
							          <div class="col-lg-10">
							<?php 
								 	$key_awalan = $this->db->query("SELECT * FROM key_awalan");
								 	foreach ($key_awalan->result() as $row) {
							?>
					                        <label class="checkbox-inline">
					    					<input class="cek1" type="radio" id="key_awal" name="key_awal" <?php echo ($key_awal == $row->keyword) ? 'checked=""':""; ?> value="<?php echo $row->keyword; ?>"> <?php echo $row->keyword; ?>
					    					</label>
							<?php } ?>
							    		</div>
							      </div>

							      <div class="form-group">
							      	<label class="col-lg-2 control-label" for="idkeywordawal"><b>Keyword Akhiran</b></label>
							          <div class="col-lg-10">
							<?php 
								 	$key_akhiran = $this->db->query("SELECT * FROM key_ahiran");
								 	foreach ($key_akhiran->result() as $row) {
							?>                        			
							    		<label class="checkbox-inline">
							    			<input class="cek1" type="radio" id="key_akhir" name="key_akhir" <?php echo ($key_akhir == $row->keyword) ? 'checked=""':""; ?> value="<?php echo $row->keyword; ?>"> <?php echo $row->keyword; ?>
							    		</label>
							<?php } ?>
							    		</div>
							      </div>

	      <div class="form-group">  
	          <label class="col-lg-2 control-label" for="idkeywordkota"><b>Keyword Kota</b></label>
	          <div class="col-lg-10">
	  <?php 
		 	$key_city = $this->db->query("SELECT * FROM key_kota");
		 	foreach ($key_city->result() as $row) {
	  ?>
	           <label class="checkbox-inline">
				<input class="cek3" type="checkbox" id="key_kota[]" name="key_kota[]" <?php if (in_array($row->keyword, $key_kota)) {echo "checked";}?> value="<?php echo $row->keyword; ?>"> <?php echo $row->keyword; ?>
				</label>
	  <?php } ?> 
		     </div>
	      </div>

<!-- <?php if(in_array('bekasi barat',$key_kota)){echo "checked"; } ?> -->

		<div class="form-group">
            <label class="col-sm-2 control-label"><b>Tampil</b> </label>
            <div class="col-sm-10">
            <label class="radio-inline">
                <input type="radio" name="tampil" class="styled" <?php if($tampil == 'ya'){ echo 'checked';} ?> value="ya"> Ya
            </label>
            <label class="radio-inline">
                <input type="radio" name="tampil" class="styled" <?php if($tampil == 'tidak'){ echo 'checked';} ?> value="tidak"> Tidak
            </label>
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