	<h2><?= $pageTitle; ?></h2>
	<p><?= $this->lang->line("poona_import_desc"); ?></p>
	<p><?= $this->lang->line("poona_import_howto"); ?></p>
	<?php if(isset($error)) :?>
	<div class="error"><?= $error; ?></div>
	<?php endif; ?>
	<?php
		$this->load->helper("form");
		echo form_open_multipart("poona/poona/import");
	?>
		<input type="file" name="userfile" size="20"> <input type="image" value="upload" src="<?= base_url() ?>/resources/famfamfam/database_gear.png">
	</form>
