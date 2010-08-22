	<div id="content-wrapper">
	<div id="content">
		<h2><?= $pageTitle?></h2>
		<ul>
		<?php foreach($categories as $category): ?>
		<li><a href="<?= site_url("membership/manage/display/".$season."/".$category); ?>"><?= $category; ?></a></li>
		<?php endforeach; ?>
		</ul>
		<p>Back to <a href="<?= site_url("membership/manage/display"); ?>">seasons list</a>.</p>
		
	</div> <!-- /#content -->
	</div> <!-- /#content-wrapper -->
