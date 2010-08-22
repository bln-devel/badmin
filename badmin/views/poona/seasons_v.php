	<div id="content-wrapper">
	<div id="content">
<?php if(count($seasons) > 0): ?>
	<ul>
<?php foreach($seasons as $entry): ?>
	<li><?= anchor(site_url("poona/poona/show/".$entry->season), $entry->season); ?></li>
<?php endforeach; ?>
	</ul>
<?php endif; ?>
	</div> <!-- /#content -->
	</div> <!-- /#content-wrapper -->