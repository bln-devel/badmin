<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Installation process &mdash; step <?= $step; ?>/<?= $stepNumber; ?></title>
    
    <style type="text/css">
    @CHARSET "UTF-8";

body {
	margin: 0;
	padding: 20px;
	font-size: 0.9em;
	font-family: verdana, "DejaVu Sans", geneva, sans-serif;
	background: #b8bcc1 -moz-linear-gradient(100% 100% 90deg, #b8bcc1, #878b8f) no-repeat;
    background: #b8bcc1 -webkit-gradient(linear, 0% 0%, 0% 100%, from(#878b8f), to(#b8bcc1)) no-repeat;
}

div#wrapper {
	width: 500px;
	margin: 0 auto;
	-moz-box-shadow: #8d9094 0 0 20px;
	-webkit-box-shadow: #8d9094 0 0 20px;
	background: #e5e5e5;
	padding-bottom: 15px;
}

a, a:link {
	color: #3d4d6d;
	text-decoration: none;
	border-bottom: 1px dotted #3d4d6d;
}
a:visited {
	border-bottom-color: #3a3a3a;
}
a:active, a:focus, a:hover {
}

a.img,
a img {
	border: 0 none;
}

h1, h2, h3 {
	font-family: helvetica, "Liberation Sans", FreeSans, sans-serif;
}

h1, h2 {
	text-shadow: #aaa 1px 1px 2px;
}

h3 {
	width: 75%;
	padding: 5px .5em;
	font-style: italic;
	border-bottom: 1px solid #aaa;
}


div.error p {
	color: #b40000;
	text-indent: 22px;
	background: url(../famfamfam/error.png) no-repeat 0 0;
}

label {
	display: block;
	font-style: italic;
	font-size: .9em;
	color: #555;
	margin-top: .5em;
}

input.text {
	border: 1px solid #aaa;
	padding: 3px;
}

input.text, textarea, .mooeditable-iframe { background-color: #fff; }


div#header {
	height: 60px;
	padding: 0;
	padding-left: 15px;
	background: #3d4d6d;
}

div#header h1 {
	color: #b8bcc1;
	text-shadow: #72767b 1px 1px 2px;
	margin: 0; padding: 0;
	line-height: 60px;
}

div#header h1 a { color: #b8bcc1; border: 0 none; }

div#content-wrapper {
	padding: 15px;
}
    
    span.step {
    	-moz-border-radius: 5px;
    	-webkit-border-radius: 5px;
    	border-radius: 5px;
    	padding: .25em .5em;
    }
    span.previous, span.next, span.current {
		color: #fff;
    }
    span.current {
    	background-color: #f50;
		text-shadow: #ddd 1px 1px 2px;
    }
    span.previous {
    	background-color: #0a0;
		font-style: italic;
    }
    span.next { background-color: #b40000; }
    </style>
</head>
<body>
<div id="wrapper">

	<div id="header">
	<header role="banner">
	<h1>Installation</h1>
	</header>
	</div> <!-- /#header -->
	
	<div id="content-wrapper">
    <div id="content">
    <div class="step_list">
    step
    <?php
    for($i = 0; ++$i <= $stepNumber; ):
    if($i == $step){
    	$stepId = "<strong>".$i."</strong>";
    	$current = "current";
    }else if($i < $step) {
    	$stepId = $i;
    	$current = "previous";
    }else{
    	$stepId = $i;
    	$current = "next";
    }
    ?>
    	<span class="step <?= $current; ?>"><?= $stepId; ?></span>
    <?php endfor; ?>
    </div> <!-- /.step_list -->
    
    <form action="" method="post">
    </form>
    
    </div> <!-- /#content -->
    </div> <!-- /#content-wrapper -->

</div> <!-- /#wrapper -->
    <div id="footer">
    </div> <!-- /#footer -->
</body>
</html>