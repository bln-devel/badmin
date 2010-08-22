<?php
$toolURL = $this->config->item("tool.url");
$toolName = $this->config->item("tool.name");
$toolVersion = $this->config->item("tool.version");
?>
	<div class="clear">&nbsp;</div>
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