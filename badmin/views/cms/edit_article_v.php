<script>
	window.addEvent("domready", function(){
		var toolbar = $("f_article").mooEditable();
	});
</script> <!-- FIXME move into header -->

    <div id="content-wrapper">
    <div id="content">
    	<h2><?= $pageTitle; ?></h2>
    	
    	<textarea rows="30" cols="80" class="mooeditable" id="f_article" name="f_article"></textarea>
    </div> <!-- /#content -->
    </div> <!-- /#content-wrapper -->
