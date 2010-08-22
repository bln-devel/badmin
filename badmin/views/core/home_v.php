    <div id="content-wrapper">
    <div id="content">
    	<h2><?= $pageTitle; ?></h2>
    	<?= $content; ?>
    	
    	<?php if(isset($modules) && !empty($modules)): ?>
    	<div class="modules">
    	<?php foreach($modules as $module) :?>
    	<div class="module">
    		<h3><img src="<?= base_url(); ?>resources/core/images/famfamfam/brick.png" alt=""> <?= $module["name"]; ?> <span class="version">(v<?= $module["version"]; ?>)</span></h3>
    		<p><?= $module["desc"]; ?> <?= anchor(site_url($module["ctrl"]), "Use ".$module["name"]); ?></p>
    	</div> <!-- /.module -->
    	<?php endforeach; ?>
    	</div> <!-- /.modules -->
    	<?php endif; ?>
    </div> <!-- /#content -->
    </div> <!-- /#content-wrapper -->
