<?php
$toolURL = $this->config->item("tool.url");
$toolName = $this->config->item("tool.name");
$toolVersion = $this->config->item("tool.version");
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title><?= $pageTitle; ?> &mdash; <?= $toolName; ?></title>
    <meta name="DC.title" content="<?= $toolName; ?>">
	<link href="<?= base_url() ?>resources/core/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	
	<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>resources/core/css/styles.css" />
	<script type="text/javascript" src="<?= base_url() ?>resources/core/js/mootools-1.2.4-core-yc.js"></script>
	
	<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>resources/core/slimbox-1.71/css/slimbox.css" />
	<script type="text/javascript" src="<?= base_url() ?>resources/core/slimbox-1.71/js/slimbox.js"></script>
	
	<?php if(!empty($modulesCSS)):
		foreach($modulesCSS as $module):
	?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url().$module; ?>" />
	<?php endforeach; endif; ?>
	
	<?php if(!empty($modulesJS)):
		foreach($modulesJS as $module):
	?>
	<script type="text/javascript" src="<?= base_url().$module; ?>"></script>
	<?php endforeach; endif; ?>
	
</head>
<body>
<div id="wrapper">

	<div id="header">
	<header role="banner">
	<?php //FIXME NLS
		/*
		<h1><a href="<?= base_url(); ?>" title="Back to home"><img src="<?= base_url() ?>resources/core/images/logo.png" alt="<?= $toolName; ?>"></a></h1>
		*/
	?>
		<h1><a href="<?= base_url(); ?>" title="Back to home"><?= $toolName; ?></a></h1>
	</header>
	</div> <!-- /#header -->
