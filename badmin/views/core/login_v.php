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
	
	<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>resources/core/css/login.css" />
	<script type="text/javascript" src="<?= base_url() ?>resources/core/js/mootools-1.2.4-core-yc.js"></script>
	
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
	
	<div id="content-wrapper">
    <div id="content">
    	<h2><?= $pageTitle; ?></h2>
    	
    	<?php if(isset($error)): ?>
    	<div class="error"><?= $error; ?></div>
    	<?php endif; ?>
    	
    	<?php if(!(isset($come_from))) $come_from = ""; ?>
    	<?php if(!(isset($f_login))) $f_login = ""; ?>
    	
    	<form action="<?= site_url("core/login"); ?>" method="post">
    		<input type="hidden" name="come_from" value="<?= $come_from; ?>" />
    		<div><label for="f_login">Login</label> <input type="text" class="text" id="f_login" name="f_login" value="<?= $f_login; ?>"></div>
    		<div><label for="f_pwd">Password</label> <input type="password" class="text" id="f_pwd" name="f_pwd">
    		<input type="image" id="f_connect" name="f_connect" src="<?= base_url(); ?>resources/core/images/famfamfam/connect.png">
    		</div>
    	</form>
    	<?php
    	//FIXME add a "remember me" checkbox
    	?>
    	
    </div> <!-- /#content -->
    </div> <!-- /#content-wrapper -->

</div> <!-- /#wrapper -->
    <div id="footer">
    <p><img src="<?= base_url() ?>resources/core/images/icons/shuttlecock-bullet-black-vertical.png" alt="" />
    <?php
    if(!empty($toolURL)): ?>
    <a href="<?= $toolURL; ?>"><?= $toolName; ?></a>
    <?php else: ?>
    <?= $toolName; ?>
    <?php endif; ?>
    v<?= $toolVersion ?></p>
    </div> <!-- /#footer -->
</body>
</html>