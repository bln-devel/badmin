	<?php
	$full_path = $root;
	if(!empty($path)) $full_path .= "/".$path;
	?>
	
	<?php if(!empty($error)): ?>
	<div class="error"><?= $error; ?></div>
	<?php endif; ?>

	<h3>Upload a file into <?= $full_path; ?></h3>
	<?php
		$this->load->helper("form");
		echo form_open_multipart("documents/upload/".$path);
	?>
		<input type="file" name="userfile" size="20"> <input type="image" value="upload" src="<?= base_url() ?>/resources/famfamfam/page_white_add.png">
	</form>

	<h3>Create a directory into <?= $full_path; ?></h3>
	<form action="<?= site_url("documents/upload/mkdir/".$path); ?>" method="post">
		<label for="f_mkdir">Name</label> <input type="text" class="text" id="f_mkdir" name="f_mkdir">
		<input type="image" value="upload" src="<?= base_url() ?>/resources/famfamfam/folder_add.png">
	</form>