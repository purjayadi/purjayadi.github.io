<form enctype='multipart/form-data' method='post' action="">
			<div class='form-group'>
				<label for='file'><b>Import File CSV</b></label>
				<input id='file' name='file' type='file' autofocus class="form-control" required/>
			</div>
			<button type='submit' class="btn btn-primary btn-sm" name="submit">Save</button>
			<a class="btn btn-success btn-sm" href="<?php echo base_url('panelIMS/p_artikel');?>">Cancel</a>
			<input name='form' type='hidden' value='form-import-1000-artikel'/>
		</form>