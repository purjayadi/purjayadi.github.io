<!-- Form horizontal -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Input Data Produk</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">

							<form class="form-horizontal" action="#">
								<fieldset class="content-group">
									
									<div class="form-group">
										<label class="control-label col-lg-2">Kategori</label>
										<div class="col-lg-10">
											<select name="id_kategori" class="form-control">
				                                <option value="opt1">Pilih</option>
				                                <option value="opt2">Option 2</option>
				                                <option value="opt3">Option 3</option>
				                            </select>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">Nama Produk</label>
										<div class="col-lg-10">
											<input id='produk' name='produk' type='text' placeholder='Baris 1' class="form-control" required/>
											<input id='produk1' name='produk1' type='text' placeholder='Baris 2' class="form-control" readonly/>
											<input id='produk2' name='produk2' type='text' placeholder='Baris 3' class="form-control" readonly/>

										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">Upload File Gambar Produk</label>
										<div class="col-lg-10">
											<input type="file" class="form-control">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">Img Alt</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" placeholder="Teks Alternatif Ketika Gambar Tidak Bisa Dibuka diBrowser (Bisa DiPakai Untuk SEO)">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">Harga</label>
										<div class="col-lg-10">
											<div class='input-group'>
											<span class='input-group-addon'>Rp</span><input class="form-control" id='harga' name='harga' type='number' value='0' min='0' max='9999999999' placeholder='999999' required/>
										</div>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">Deskripsi</label>
										<div class="col-lg-10">
											<textarea class="ckeditor" id="ckedtor" name="deskripsi" id="deskripsi" placeholder="Deskripsi" ></textarea>
										</div>
									</div>

			                        <div class="form-group">
			                        	<label class="control-label col-lg-2">Tag KeyWord</label>
			                        	<div class="col-lg-10">
				                            <textarea name="keyword" class="form-control" placeholder="Tag 1, Tag 2, Tag 3,...(Pisahkan Dengan Koma)"></textarea>
			                            </div>
			                        </div>

									<div class="form-group">
										<label class="control-label col-lg-2">No Urut</label>
										<div class="col-lg-10">
											<input id='no_urut' name='no_urut' type='number' value='1' min='1' class="form-control" max='99'/>
										</div>
									</div>
								</fieldset>
							</form>
						</div>
					</div>