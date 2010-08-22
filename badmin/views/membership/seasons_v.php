	<div id="content-wrapper">
	<div id="content">
		<h2><?= $pageTitle?></h2>
		
		<ul>
		<?php foreach($seasons as $season): ?>
		<li><a href="<?= site_url("membership/manage/display/".$season); ?>"><?= $season; ?></a></li>
		<?php endforeach; ?>
		</ul>
		
	</div> <!-- /#content -->
	</div> <!-- /#content-wrapper -->
